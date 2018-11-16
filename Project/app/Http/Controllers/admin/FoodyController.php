<?php

namespace App\Http\Controllers\admin;

use App\Cost;
use App\Foody;
use App\FoodyStatus;
use App\FoodyType;
use App\Image;
use App\ImageFoody;
use App\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Validator;
class FoodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $foodies = Foody::where('is_deleted',false)->paginate(10);
        $key_search = '';
        $key_filter = '';

        if (!empty($request->get('key-search'))) {

            $key_search = $request->get('key-search');
            $foodies = Foody::where('is_deleted', false)
                ->where('name', 'like', "%$key_search%")->paginate(10);
        }
        return view('admin.foodies.index', compact( 'foodies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foodyTypes = FoodyType::all();

        return view('admin.foodies.create.index', compact('foodyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validationStore($request);
        if ($validate->fails()) {
            return back()->withErrors($validate)
                ->withInput($request->only('foody-cost', 'foody-name'));
        }
        $cost_input = str_replace(',', '', $request->get('foody-cost'));
        if ($cost_input < 1000) {
            return back()->withErrors(['foody-cost' => 'Giá tiền không được nhỏ hơn 1,000đ !'])
                ->withInput($request->only('foody-cost', 'foody-name'));
        }
        if ($cost_input > 100000000) {
            return back()->withErrors(['foody-cost' => 'Giá tiền không được vượt quá 100,000,000đ !'])
                ->withInput($request->only('foody-cost', 'foody-name'));
        }
        if (!$request->hasFile('anh-dai-dien')) {
            return back()->withErrors(['anh-dai-dien'=>'Bạn chưa upload hình ảnh!'])
                ->withInput($request->only('foody-cost', 'foody-name'));
        }

        $foody = new Foody();
        $foody_name = $request->get('foody-name');
        $foody->name = $foody_name;
        $foody->slug = str_slug($foody_name);
        if ($foody->matchedName($foody_name)) {
            return back()->with('error', 'Tên thực đơn đã tồn tại!')
                ->withInput($request->only('foody-cost', 'foody-name'));
        }
        $foody->foody_created_at = date('Y-m-d H:i:s');
        $foody->foody_updated_at = date('Y-m-d H:i:s');
        $foody->is_extra = false;
        $foody->describe = $request->get('describe');
        $foody->foody_type_id = $request->get('foody-type-name');

        $time = time();
        $ext = $request->file('anh-dai-dien')->extension();

        $path = $request->file('anh-dai-dien')
            ->move('admin\assets\images\avatar', "avatar-$foody->id-$time.$ext");
        $foody->avatar = str_replace('\\', '/', $path);
        $foody->save();

        $foodyStatus = new FoodyStatus();
        $foodyStatus->foody_id = $foody->id;
        $foodyStatus->status = $request->get('status');
        $foodyStatus->save();

        $cost = new Cost();
        $cost->cost = $cost_input;
        $cost->cost_updated_at = date('Y-m-d H:i:s');
        $cost->foody_id = $foody->id;
        $cost->save();

        $vote = new Vote();
        $vote->foody_id = $foody->id;
        $vote->save();

        return redirect()->route('foodies.show', [$foody->id])->with('success', "Thêm $foody_name thành công!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodyTypes = FoodyType::all();
        $foodies = Foody::findOrFail($id);
        $typeFoody = FoodyType::find($foodies->foody_type_id)->name;
        $costFoodys = Cost::where('foody_id',$id)
            ->orderBy('cost_updated_at','DESC')->get();
        return view('admin.foodies.show.index',
            compact('id', 'foodies','typeFoody','costFoodys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodyTypes = FoodyType::all();
        $foodies = Foody::find($id);
        $nameFoody = $foodies->name;
        $avatarFoody = $foodies->avatar;
        $describe = $foodies->describe;
        $typeFoody = FoodyType::where('id', $foodies->foody_type_id)->get();

        $costFoody = Cost::where('foody_id', $id)->get();
        foreach ($costFoody as $cosf) {
            $cost = $cosf->cost;
            $costUpdated = $cosf->cost_updated_at;
        }
        return view('admin.foodies.update.index',
            compact('id', 'foodies', 'nameFoody','foodyTypes', 'cost', 'avatarFoody', 'describe', 'costUpdated'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foodyName = $request->get('foody-name');
        $cost_input = str_replace(',', '', $request->get('foody-cost'));
        if ($cost_input > 100000000) {
            return back()->withErrors(['foody-cost' => 'Giá tiền không được vượt quá 100,000,000đ !']);
        }
        if ($cost_input < 1000) {
            return back()->withErrors(['foody-cost' => 'Giá tiền không được thấp hơn 1000đ !']);
        }
        $foodys = Foody::findOrFail($id);
        $foodys->name = $foodyName;
        $foodys->slug = str_slug($foodyName);
        $foodys->foody_type_id = $request->get('foody-type-name');
        $foodys->describe = $request->get('describe');
        $foodys->update();

        $foodyStatus = FoodyStatus::findOrFail($id);
        $foodyStatus->status = $request->get('status');
        $foodyStatus->update();

        $cost = new Cost();
        $cost->cost = $cost_input;
        $cost->foody_id = $id;
        $cost->cost_updated_at = date('Y-m-d H:i:s');
        $cost->save();

        if (!$request->hasFile('anh-dai-dien')) {
            return back()->with('error', 'Bạn chưa upload hình ảnh!');
        } else {
            $foody = Foody::findOrFail($id);
            $oldPath = $foody->avatar;
            if (!empty($oldPath)) {
                File::delete($oldPath);
            }

            $time = time();
            $ext = $request->file('anh-dai-dien')->extension();
            $path = $request->file('anh-dai-dien')
                ->move('admin\assets\images\avatar', "avatar-$id-$time.$ext");
            $foody->avatar = str_replace('\\', '/', $path);
            $foody->update();
        }
        return back()->with('success','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('foody-id');

        if (empty($ids)) {
            return back();
        }
        if (is_array($ids)){
            foreach($ids as $id) {
                $foody = Foody::findOrFail($id);
                $foody->is_deleted = true;
                $foody->update();
            }
        }
       else{
           $foody = Foody::findOrFail($ids);
           $foody->is_deleted = true;
           $foody->update();
       }

        return back()->with('success', 'Xóa thành công.');
    }
    public function changeCost(Request $request, $id)
    {

//        $validate = Validator::make($request->all(),
//            [
//                'cost-pro' => array('required', 'regex:/^(([1-9]\d*)|([1-9]\d{0,2}(,\d{3})*))$/')
//            ],
//            [
//                'required' => ':attribute không được bỏ trống!',
//                'regex' => ':attribute không hợp lệ!'
//            ],
//            [
//                'cost-pro' => 'Giá tiền'
//            ]
//        );
//        if($validate->fails()) {
//            return back()->withErrors($validate)->withInput($request->only('cost-pro'));
//        }
        $cost_input = str_replace(',', '', $request->get('foody-cost'));
        if ($cost_input > 100000000) {
            return back()->withErrors(['foody-cost' => 'Giá tiền không được vượt quá 100,000,000đ !']);
        }
        if ($cost_input < 1000) {
            return back()->withErrors(['foody-cost' => 'Giá tiền không được thấp hơn 1000đ !']);
        }

        $cost = new Cost();
        $cost->cost = $cost_input;
        $cost->foody_id = $id;
        $cost->cost_updated_at = date('Y-m-d H:i:s');
        $cost->save();

        return back()->with('success', 'Thay đổi thành công.');
    }

    public function changeAvatar(Request $request, $id)
    {

        if (!$request->hasFile('anh-dai-dien')) {
            return back()->with('error', 'Bạn chưa upload hình ảnh!');
        } else {
            $foody = Foody::findOrFail($id);
            $oldPath = $foody->avatar;
            if (!empty($oldPath)) {
                File::delete($oldPath);
            }

            $time = time();
            $ext = $request->file('anh-dai-dien')->extension();
            $path = $request->file('anh-dai-dien')
                ->move('admin\assets\images\avatar', "avatar-$id-$time.$ext");
            $foody->avatar = str_replace('\\', '/', $path);
            $foody->update();

            return back()->with('success', 'Cập nhật thành công.');
        }
    }

    public function showSlugType($slug){
        $foodyType_filter = FoodyType::where('slug',$slug)
                        ->where('is_deleted',false)->get();
        foreach ($foodyType_filter as $foodyType){
            $nameType_filter = $foodyType->name;
            $foody_filter = Foody::where('foody_type_id',$foodyType->id)
                    ->where('is_deleted',false)->paginate(10);
        }
        return view('admin.foodyTypes.filter.index',compact('foodyType_filter','nameType_filter','foody_filter'));
    }

    public function filter(Request $request){
        dd($request);
//        $key_filter = '';
//        $key_search = '';
//        $idType = $request->get('type-id');
//        $nameType = FoodyType::find($idType)->name;
//        $idStatus = $request->get('status-id');
//        if (!empty($idType)){
//            if (!empty($idStatus)){
//                $foody_filter = DB::table('foodies')
//                    ->join('foody_statuses','foodies.id','=','foody_statuses.foody_id')
//                    ->where('foodies.type_id',$idType)
//                    ->where('foody_status.status',$idStatus)
//                    ->where('foodies.is_delete',false)
//                    ->paginate(10);
//                return view('admin.foodies.filter.index',compact('foody_filter'));
//            }
//            $foody_filter = DB::table('foodies')
//                ->join('foody_statuses','foodies.id','=','foody_statuses.foody_id')
//                ->where('foodies.type_id',$idType)
//                ->where('foodies.is_delete',false)
//                ->paginate(10);
//            return view('admin.foodies.filter.index',compact('foody_filter'));
//        }
        return view('admin.foodies.filter.index',compact('foody_filter'));
    }

    public function search(Request $request) {
        $key_search = $request->key;
        $foodies = Foody::where('name','like', "%$key_search%")->get();
        $data = '';
        foreach($foodies as $key => $foody) {

            $data .= "<div class=\"divider\"></div>
        <div class=\"result-content\">
            <div class=\"col twelve medium row\">
                <div class=\"col five medium\">
                    <img class=\"img-tb\"src=\"$foody->avatar\" alt=\"$foody->name\">
                </div>
                <div class=\"col seven medium header\">
                    <a href =\"foodies/$foody->id\">$foody->name</a>
                </div>
            </div>
        </div>";
        }
        return Response($data);
    }


    public function validationStore(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'foody-name' => array('required', 'max:100', "regex:/^[A-ỹ][0-ỹ \+\(\)\/]*$/"),
                'foody-cost' => array('required', 'regex:/^(([1-9]\d*)|([1-9]\d{0,2}(,\d{3})*))$/')
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!'
            ],
            [
                'foody-name' => 'Tên thực đơn',
                'foody-cost' => 'Giá tiền'
            ]
        );

        return $validate;
    }

    public function validationUpdate(Request $request, $id)
    {
        $validate = Validator::make(
            $request->all(),
            [
                "foody-name-$id" => array('required', 'max:100', "regex:/^[A-ỹ][0-ỹ \+\(\)\/]*$/"),
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!'
            ],
            [
                "foody-name-$id" => 'Tên thực đơn'
            ]
        );

        return $validate;
    }

}
