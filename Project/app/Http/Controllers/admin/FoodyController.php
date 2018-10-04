<?php

namespace App\Http\Controllers\admin;

use App\Cost;
use App\Foody;
use App\FoodyType;
use App\Image;
use App\ImageFoody;
use App\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Validator;
class FoodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $foodies = Foody::paginate(10);
        $foodyTypes = FoodyType::all();
        $costs = Cost::all();
        return view('admin.foodies.index', compact('costs', 'foodies', 'foodyTypes'));
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
            return back()->withErrors($validate)->withInput($request->only('cost-foody', 'name-foody'));
        }
        $cost_input = str_replace(',', '', $request->get('cost-foody'));
        if ($cost_input < 1000) {
            return back()->withErrors(['cost-food' => 'Giá tiền không được nhỏ hơn 1,000đ !'])
                ->withInput($request->only('cost-foody', 'name-foody'));
        }
        if ($cost_input > 100000000) {
            return back()->withErrors(['cost-foody' => 'Giá tiền không được vượt quá 100,000,000đ !'])
                ->withInput($request->only('cost-foody', 'name-foody'));
        }
        if (!$request->hasFile('avatar-image-upload')) {
            return back()->withErrors(['Bạn chưa upload hình ảnh!'])
                ->withInput($request->only('cost-foody', 'name-foody'));
        }

        $foody = new Foody();
        $foody_name = $request->get('name-foody');
        $foody->name = $foody_name;

        $foody->foody_created_at = date('Y-m-d H:i:s');
        $foody->foody_updated_at = date('Y-m-d H:i:s');
        $foody->describe = $request->get('des');
        $foody->foody_type_id = $request->get('name-type');

        $time = time();
        $ext = $request->file('avatar-image-upload')->extension();

        $path = $request->file('avatar-image-upload')
            ->move('admin\assets\images\avatar', "avatar-$foody->id-$time.$ext");
        $foody->avatar = str_replace('\\', '/', $path);
        $foody->save();

        $cost = new Cost();
        $cost->cost = $cost_input;
        $cost->cost_updated_at = date('Y-m-d H:i:s');
        $cost->foody_id = $foody->id;
        $cost->save();

        $vote = new Vote();
        $vote->foody_id = $foody->id;
        $vote->save();

        return back()->with('success', "Thêm $foody_name thành công!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodies = Foody::find($id);
        $nameFoody = $foodies->name;
        $avatarFoody = $foodies->avatar;
        $describe = $foodies->describe;
        $typeFoody = FoodyType::where('id', $foodies->foody_type_id)->get();
        foreach ($typeFoody as $type) {
            $nameTypeFoody = $type->name;
        }

        $costFoody = Cost::where('foody_id', $id)->get();
        foreach ($costFoody as $cosf) {
            $cost = $cosf->cost;
            $costUpdated = $cosf->cost_updated_at;
        }
        return view('admin.foodies.update.index',
            compact('id', 'foodies', 'nameFoody', 'nameTypeFoody', 'cost', 'avatarFoody', 'describe', 'costUpdated'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!$request->has('foody-id')) {
            return back();
        }
        $ids = $request->get('foody-id');


        foreach($ids as $id) {
            $foody = Foody::findOrFail($id);
            if ($foody->canDelete()) {
                $foody->delete();
            } else {
                $foody->is_deleted = true;
                $foody->update();
            }
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
        $cost_input = str_replace(',', '', $request->get('cost-foody'));
        if ($cost_input > 100000000) {
            return back()->withErrors(['cost-foody' => 'Giá tiền không được vượt quá 100,000,000đ !']);
        }
        if ($cost_input < 1000) {
            return back()->withErrors(['cost-foody' => 'Giá tiền không được thấp hơn 1000đ !']);
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

        if (!$request->hasFile('avatar-image-upload')) {
            return back()->with('error', 'Bạn chưa upload hình ảnh!');
        } else {
            $foody = Foody::findOrFail($id);
            $oldPath = $foody->avatar;
            if (!empty($oldPath)) {
                File::delete($oldPath);
            }

            $time = time();
            $ext = $request->file('avatar-image-upload')->extension();
            $path = $request->file('avatar-image-upload')
                ->move('admin\assets\images\avatar', "avatar-$id-$time.$ext");
            $foody->avatar = str_replace('\\', '/', $path);
            $foody->update();

            return back()->with('success', 'Cập nhật thành công.');
        }
    }

    public function addImage(Request $request, $id){

        $time  = time();
        if ($request->hasFile('foody-image-upload')) {
            $foody_images = $request->File('foody-image-upload');
            foreach ($foody_images as $key => $foody_image) {
                $ext = $foody_image->extension();
                $image = new Image();
                $path = $foody_image
                    ->move('admin\assets\images\img_product', "image-$id-$key-$time.$ext");
                $image->link = str_replace('\\', '/', $path);
                $image->save();

                $image_foody = new ImageFoody();
                $image_foody->image_id = $image->id;
                $image_foody->foody_id = $id;
                $image_foody->save();
            }
        }
    }

    public function deleteImage(Request $request, $id)
    {

        if (!$request->hasFile('foody-image-upload')) {
            return back()->with('error', 'Bạn chưa upload hình ảnh!');
        } else {

            foreach (ImageFoody::where('foody_id', $id)->get() as $idImage) {
                foreach (Image::where('id', $idImage->image_id)->get() as $image) {
                    $oldPath = $image->link;

                    if (!empty($oldPath)) {
                        File::delete($oldPath);
                        $image->delete();
                    }

                }
            }
            return back()->with('success', 'Cập nhật thành công.');
        }
    }

    public function validationStore(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name-foody' => array('required', 'max:100', "regex:/^[A-ỹ][0-ỹ \+\(\)\/]*$/"),
                'cost-foody' => array('required', 'regex:/^(([1-9]\d*)|([1-9]\d{0,2}(,\d{3})*))$/')
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!'
            ],
            [
                'name-foody' => 'Tên thực đơn',
                'cost-foody' => 'Giá tiền'
            ]
        );

        return $validate;
    }

    public function validationUpdate(Request $request, $id)
    {
        $validate = Validator::make(
            $request->all(),
            [
                "name-foody-$id" => array('required', 'max:100', "regex:/^[A-ỹ][0-ỹ \+\(\)\/]*$/"),
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!'
            ],
            [
                "name-foody-$id" => 'Tên thực đơn'
            ]
        );

        return $validate;
    }
}