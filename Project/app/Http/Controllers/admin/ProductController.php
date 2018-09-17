<?php

namespace App\Http\Controllers\admin;

use App\Image;
use App\ImageProduct;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

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

        if ($request->hasFile('images'))
        {
            $product = new Product();
            $product->name = $request->get('name-pro');
            $product->product_created_at = date('Y-m-d H:i:s');
            $product->product_updated_at = date('Y-m-d H:i:s');
            $product->describe = $request->get('des');
            $product->product_type_id = $request->get('name-type');

            $image = $request->file('images');
            $image = array();
            $filename = time().'-'.$image->getClientOriginalName();
            $path = public_path('images/img_product');
            $image = move($path, $filename);
            dd($product);

            $product->avatar = $filename;


            $product->save();

        }
        return back()->with('success',"Thêm thành công!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
