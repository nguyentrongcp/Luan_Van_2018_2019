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

        $foodyType = new FoodyType();
        $foodyType->name = $name_type;
        $foodyType->slug = $slug;
        $foodyType->foody_type_id = $type_id;
        $foodyType->save();

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
        $foodyType = FoodyType::findOrFail($id);

        $foodyType->name = $request->get('name-type');
        $foodyType->slug = str_slug($foodyType->name);


        $foodyType->update();


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
        $ids = $request->get('foody-type-id');

        if (empty($ids))
            return back();

        $errors = $this->canDelete($ids);

        if (!empty($errors))
            return back()->with('errors', $errors);

        if (is_array($ids))
        {
            foreach ($ids as $id) {
                $foodyType = FoodyType::find($id);
                $foodyType->is_deleted = 1;

                $foodyType->update();
            }
        }
        else
        {
            $foodyType = FoodyType::find($ids);
            $foodyType->is_deleted = 1;

            $foodyType->update();
        }


        return back()->with('success', 'Xóa thành công');
    }
    public function changeStatus($ids){

        $foodyType = FoodyType::find($ids);
        $foodyType->is_deleted = 0;

        $foodyType->update();

        return back()->with('success','Khôi phục thành công!');
    }
    private function canDelete($ids){
        $errors = [];

        if (is_array($ids) || is_object($ids))
        {
            foreach ($ids as $id) {
                $foodyType = FoodyType::findOrFail($id);

                if ($foodyType->noProduct())
                    continue;

                $errors[] = "Loại sản phẩm "
                    . $this->createLinkToProduct($foodyType)
                    . " còn sản phẩm liên kết";
            }
        }


        return $errors;
    }
    private function createLinkToProduct($foodyType) {
        return "<a href='"
            . route('foodies.index') . "?pt="
            . $foodyType->id
            . "'>{$foodyType->name}</a>";
    }
}
