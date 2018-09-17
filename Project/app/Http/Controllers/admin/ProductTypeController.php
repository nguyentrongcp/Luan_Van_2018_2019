<?php

namespace App\Http\Controllers\admin;

use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function Sodium\compare;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = ProductType::where('product_type_id',null)->paginate(10);

        return view('admin.productTypes.index',compact('productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addType(Request $request, $id)
    {
        $product_type_id = $id;
        $name_type = $request->get('name-type');
        $lug = str_slug($name_type);

        $productType = new ProductType();
        $productType->name = $name_type;
        $productType->slug = $lug;
        $productType->product_type_id = $product_type_id;

        $productType->save();

        return view('admin.productTypes.create_type.index',compact('tile_name_type','productType'))
            ->with('success',"Thêm $name_type thành công!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name_type = $request->get('name-type');
        $slug = str_slug($name_type);

        $productType = new ProductType();
        $productType->name = $name_type;
        $productType->slug = $slug;
        $productType->save();




        return back()->with('success',"Thêm $name_type thành công!");
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
        $productType = ProductType::findOrFail($id);

        $productType->name = $request->get('name-type');
        $productType->slug = str_slug($productType->name);


        $productType->update();


        return back()->with('success','Cập nhât thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('products-type-id');

        if (empty($ids))
            return back();

        $errors = $this->canDelete($ids);

        if (!empty($errors))
            return back()->with('errors', $errors);

        if (is_array($ids))
        {
            foreach ($ids as $id) {
                $productType = ProductType::find($id);
                $productType->is_deleted = 1;

                $productType->update();
            }
        }
        else
        {
            $productType = ProductType::find($ids);
            $productType->is_deleted = 1;

            $productType->update();
        }


        return back()->with('success', 'Xóa thành công');
    }
    public function changeStatus($ids){

        $productType = ProductType::find($ids);
        $productType->is_deleted = 0;

        $productType->update();

        return back()->with('success','Khôi phục thành công!');
    }
    private function canDelete($ids){
        $errors = [];

        if (is_array($ids) || is_object($ids))
        {
            foreach ($ids as $id) {
                $productType = ProductType::findOrFail($id);

                if ($productType->noProduct())
                    continue;

                $errors[] = "Loại sản phẩm "
                    . $this->createLinkToProduct($productType)
                    . " còn sản phẩm liên kết";
            }
        }


        return $errors;
    }

    public function movePageCreateType($id){
        $type_id = ProductType::find($id);
        $title_name = $type_id->name;

        $productTypes = ProductType::where('product_type_id',$id)->paginate(10);

        return view('admin.productTypes.create_type.index',
            compact('productTypes','title_name','id'));
    }

    private function createLinkToProduct($productType) {
        return "<a href='"
            . route('products.index') . "?pt="
            . $productType->id
            . "'>{$productType->name}</a>";
    }
}
