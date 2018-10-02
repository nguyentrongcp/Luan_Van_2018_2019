<?php

namespace App\Http\Controllers\admin;

use App\FoodyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodyTypes = FoodyType::where('foody_type_id',null)
                                ->where('is_deleted',false)->paginate(10);

        return view('admin.foodyTypes.index',compact('foodyTypes'));
    }

    public function addType(Request $request, $id)
    {
        $foody_type_id = $id;
        $name_type = $request->get('name-type');
        $lug = str_slug($name_type);

        $foodyType = new FoodyType();
        $foodyType->name = $name_type;
        $foodyType->slug = $lug;
        $foodyType->foody_type_id = $foody_type_id;

        $foodyType->save();

        return view('admin.foodyTypes.create.index',compact('tile_name_type','foodyType'))
            ->with('success',"Thêm $name_type thành công!");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $foodyType = new FoodyType();
        $foodyType->name = $name_type;
        $foodyType->slug = $slug;
        $foodyType->save();
        return back()->with('success',"Thêm $name_type thành công!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        $foodType = FoodyType::findOrFail($id);

        $foodType->name = $request->get('name-type');
        $foodType->slug = str_slug($foodType->name);
        $foodType->update();

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
            $foodyType->is_deleted = true;

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

    public function movePageCreateType($id){
        $type_id = FoodyType::find($id);
        $title_name = $type_id->name;

        $foodyTypes = FoodyType::where('foody_type_id',$id)
                                ->where('is_deleted',false)->paginate(10);

        return view('admin.foodyTypes.create.index',
            compact('foodyTypes','title_name','id'));
    }

    private function createLinkToProduct($foodyType) {
        return "<a href='"
            . route('foodies.index') . "?pt="
            . $foodyType->id
            . "'>{$foodyType->name}</a>";
    }
}
