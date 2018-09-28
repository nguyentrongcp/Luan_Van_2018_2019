<?php

namespace App\Http\Controllers\admin;

use App\Cost;
use App\Image;
use App\ImageProduct;
use App\Product;
use App\ProductType;
use App\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        $productTypes = ProductType::all();

        return view('admin.products.index',compact('products','productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::all();

        return view('admin.products.add.index',compact('productTypes'));
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
            return back()->withErrors($validate)->withInput($request->only('cost-pro', 'name-pro'));
        }
        $cost_input = str_replace(',', '', $request->get('cost-pro'));
        if ($cost_input < 1000) {
            return back()->withErrors(['cost-pro' => 'Giá tiền không được nhỏ hơn 1,000đ !'])
                ->withInput($request->only('cost-pro', 'name-pro'));
        }
        if ($cost_input > 100000000) {
            return back()->withErrors(['cost-pro' => 'Giá tiền không được vượt quá 100,000,000đ !'])
                ->withInput($request->only('cost-pro', 'name-pro'));
        }
        if (!$request->hasFile('avatar-image-upload'))
        {
            return back()->withErrors(['Bạn chưa upload hình ảnh!'])
                ->withInput($request->only('cost-pro', 'name-pro'));
        }

        $product = new Product();
        $product_name = $request->get('name-pro');
        $product->name = $product_name;

        $product->product_created_at = date('Y-m-d H:i:s');
        $product->product_updated_at = date('Y-m-d H:i:s');
        $product->describe = $request->get('des');
        $product->product_type_id = $request->get('name-type');

        $time = time();
        $ext = $request->file('avatar-image-upload')->extension();

        $path = $request->file('avatar-image-upload')
            ->move('admin\assets\images\avatar', "avatar-$product->id-$time.$ext");
        $product->avatar = str_replace('\\', '/', $path);
        $product->save();

        $cost = new Cost();
        $cost->cost = $cost_input;
        $cost->cost_updated_at = date('Y-m-d H:i:s');
        $cost->product_id = $product->id;
        $cost->save();

        $vote = new Vote();
        $vote->product_id = $product->id;
        $vote->save();

        if ($request->hasFile('product-image-upload')) {
            $product_images = $request->File('product-image-upload');
            foreach ($product_images as $key => $product_image) {
                $ext = $product_image->extension();
                $image = new Image();
                $path = $product_image
                    ->move('admin\assets\images\img_product', "image-$product->id-$key-$time.$ext");
                $image->link = str_replace('\\', '/', $path);
                $image->save();

                $image_product = new ImageProduct();
                $image_product->image_id = $image->id;
                $image_product->product_id = $product->id;
                $image_product->save();
            }
        }


        return back()->with('success',"Thêm $product_name thành công!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $image_product = ImageProduct::all();

        return view('admin.products.index',compact('image_product'));
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
    public function destroy(Request $request)
    {
        if (!$request->has('product-id')) {
            return back();
        }
        $ids = $request->get('product-id');
        foreach($ids as $id) {
            $product = Product::findOrFail($id);
            if ($product->canDelete()) {
                $product->delete();
            }
            else {
                $product->is_deleted = true;
                $product->update();
            }
        }

        return back()->with('success', 'Xóa thành công.');
    }


    public function validationStore(Request $request) {
        $validate = Validator::make(
            $request->all(),
            [
                'name-pro' => array('required', 'max:100', "regex:/^[A-ỹ][0-ỹ \+\(\)\/]*$/"),
                'cost-pro' => array('required', 'regex:/^(([1-9]\d*)|([1-9]\d{0,2}(,\d{3})*))$/')
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!'
            ],
            [
                'name-pro' => 'Tên thực đơn',
                'cost-pro' => 'Giá tiền'
            ]
        );

        return $validate;
    }

    public function validationUpdate(Request $request, $id) {
        $validate = Validator::make(
            $request->all(),
            [
                "name-pro-$id" => array('required', 'max:100', "regex:/^[A-ỹ][0-ỹ \+\(\)\/]*$/"),
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!'
            ],
            [
                "name-pro-$id" => 'Tên thực đơn'
            ]
        );

        return $validate;
    }
}
