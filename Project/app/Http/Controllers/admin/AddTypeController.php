<?php

namespace App\Http\Controllers\admin;

use App\FoodyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $type_id = $request->get('id-type');

        $productType = new FoodyType();
        $productType->name = $name_type;
        $productType->slug = $slug;
        $productType->product_type_id = $type_id;
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
        $productType = FoodyType::findOrFail($id);

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
    public function destroy(Request $request, $ids)
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
                $productType = FoodyType::find($id);
                $productType->is_deleted = 1;

                $productType->update();
            }
        }
        else
        {
            $productType = FoodyType::find($ids);
            $productType->is_deleted = 1;

            $productType->update();
        }


        return back()->with('success', 'Xóa thành công');
    }
    public function changeStatus($ids){

        $productType = FoodyType::find($ids);
        $productType->is_deleted = 0;

        $productType->update();

        return back()->with('success','Khôi phục thành công!');
    }
    private function canDelete($ids){
        $errors = [];

        if (is_array($ids) || is_object($ids))
        {
            foreach ($ids as $id) {
                $productType = FoodyType::findOrFail($id);

                if ($productType->noProduct())
                    continue;

                $errors[] = "Loại sản phẩm "
                    . $this->createLinkToProduct($productType)
                    . " còn sản phẩm liên kết";
            }
        }


        return $errors;
    }
    private function createLinkToProduct($productType) {
        return "<a href='"
            . route('products.index') . "?pt="
            . $productType->id
            . "'>{$productType->name}</a>";
    }
}
