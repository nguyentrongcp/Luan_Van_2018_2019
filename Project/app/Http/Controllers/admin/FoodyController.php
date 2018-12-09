<?php

namespace App\Http\Controllers\admin;

use App\Cost;
use App\Foody;
use App\FoodyStatus;
use App\FoodyType;
use App\Image;
use App\ImageFoody;
use App\Material;
use App\MaterialFoody;
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
            return Response(['status' => 'error', 'errors' => $validate->getMessageBag()->toArray()]);
        }
        $cost_input = str_replace(',', '', $request->get('cost'));
        if ($cost_input < 1000) {
            return Response(['status' => 'error-cost', 'error' => 'Giá ẩm thực phải >= 1000<sup>đ</sup>']);
        }
        if ($cost_input > 10000000) {
            return Response(['status' => 'error-cost', 'error' => 'Giá ẩm thực phải <= 10,000,000<sup>đ</sup>']);
        }

        $foody = new Foody();
        $foody_name = $request->get('name');
        $foody->name = $foody_name;
        $foody->slug = str_slug($foody_name);
        if ($foody->matchedName($foody_name)) {
            return Response(['status' => 'error-name', 'error' => 'Tên ẩm thực đã tồn tại!']);
        }
        $foody->foody_created_at = date('Y-m-d H:i:s');
        $foody->foody_updated_at = date('Y-m-d H:i:s');
        $foody->describe = $request->get('description');
        $foody->foody_type_id = $request->get('type');

        $img = explode(";base64,", $request->get('avatar'));
        $img_type_aux = explode("image/", $img[0]);
        $img_type = $img_type_aux[1];
        $img_base64 = base64_decode($img[1]);
        $time = time();
        file_put_contents("admin/assets/images/avatar/avatar-".$foody->id.'-'.$time.'.'.$img_type, $img_base64);

        $foody->avatar = "/admin/assets/images/avatar/avatar-".$foody->id.'-'.$time.'.'.$img_type;
        $foody->save();

        $cost = new Cost();
        $cost->cost = $cost_input;
        $cost->cost_updated_at = date('Y-m-d H:i:s');
        $cost->foody_id = $foody->id;
        $cost->save();

        $vote = new Vote();
        $vote->foody_id = $foody->id;
        $vote->save();

        return Response(['status' => 'success', 'href' => route('foody_success', $foody->id)]);
    }

    public function success($id) {
        $foody_name = Foody::find($id)->name;
        return redirect()->route('foodies.show', [$id])->with('success', "Thêm $foody_name thành công!");
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

        $materialFoodys = MaterialFoody::where('foody_id', $id)->get();
//        dd($materialFoodys[0]->material);
        return view('admin.foodies.show.index',
            compact('id', 'foodies','typeFoody','costFoodys','materialFoodys'));
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
        $materialFoodys = MaterialFoody::where('foody_id', $id)->get();

        return view('admin.foodies.update.index',
            compact('id', 'foodies', 'nameFoody','foodyTypes', 'cost', 'avatarFoody', 'describe', 'costUpdated','materialFoodys'));
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
        $validate = $this->validationUpdate($request,$id);
        if ($validate->fails()) {
            return back()->withErrors($validate)
                ->withInput($request->only('foody-cost', 'foody-name'));
        }
        $foodyName = $request->get('foody-name');
        $cost_input = str_replace(',', '', $request->get('foody-cost'));
        if ($cost_input > 10000000) {
            return back()->withErrors(['foody-cost' => 'Giá tiền không được vượt quá 10,000,000đ !']);
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

        $cost = new Cost();
        $cost->cost = $cost_input;
        $cost->foody_id = $id;
        $cost->cost_updated_at = date('Y-m-d H:i:s');
        $cost->save();

        if ($request->hasFile('foody-avatar')) {
//
            $foody = Foody::findOrFail($id);
            $oldPath = $foody->avatar;
            if (!empty($oldPath)) {
                File::delete($oldPath);
            }

            $time = time();
            $ext = $request->file('foody-avatar')->extension();
            $path = $request->file('foody-avatar')
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


    public function search(Request $request) {
        $key_search = $request->key;
        $foodies = Foody::where('is_deleted',false)->where('name','like', "%$key_search%")->get();
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
                'name' => array('required', 'max:100', "regex:/^[A-ỹ][0-ỹ \+\(\)\/&]*$/"),
                'cost' => array('required', 'regex:/^(([1-9]\d*)|([1-9]\d{0,2}(,\d{3})*))$/')
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!'
            ],
            [
                'name' => 'Tên ẩm thực',
                'cost' => 'Giá tiền'
            ]
        );

        return $validate;
    }

    public function validationUpdate(Request $request, $id)
    {
        $validate = Validator::make(
            $request->all(),
            [

                'foody-cost' => array('required', 'regex:/^(([1-9]\d*)|([1-9]\d{0,2}(,\d{3})*))$/')
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!'
            ],
            [

                'foody-cost' => 'Giá tiền'
            ]
        );

        return $validate;
    }

    public function addMaterialFoody(Request $request){

        if ($request->get('value') == ''){
            return back()->with('error','Bạn chưa chọn đơn vị tính');
        }
        $materialFoody = new MaterialFoody();
        $materialFoody->foody_id = $request->get('material-foody-id');
        $materialFoody->material_id = $request->get('material');
        $materialFoody->value = $request->get('value');
        $materialFoody->save();

        return back()->with('success','Cập nhật nguyên liệu thành công!');
    }

    public function deleteMaterialFoody($id){
        $materialFoodys = MaterialFoody::where('material_id',$id)->get();
        foreach ($materialFoodys as $materialFoody){
            $materialFoody->delete();
        }
            return back()->with('success','Xóa thành công');
    }

}
