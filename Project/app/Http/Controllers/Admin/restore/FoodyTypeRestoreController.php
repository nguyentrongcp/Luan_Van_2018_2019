<?php

namespace App\Http\Controllers\admin\restore;

use App\FoodyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodyTypeRestoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodyTypes = FoodyType::where('is_deleted',true)->paginate(10);

        return view('admin.restore.foodyType.index',compact('foodyTypes'));
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
        if (!$request->has('foody-type-ids')) {
            return back();
        }

        $ids = $request->get('foody-type-ids');
        foreach($ids as $id) {
            $foody = FoodyType::findOrFail($id);
            $foody->is_deleted = false;
            $foody->update();
        }

        return back()->with('success', 'Phục hồi thành công.');
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
    public function delete(Request $request)
    {
        if (!$request->has('foody-type-ids')) {
            return back();
        }
        $ids = $request->get('foody-type-ids');
        foreach ($ids as $id) {
            $foodyType = FoodyType::find($id);
            $foodyType->delete();
        }
        return redirect()->route('foody_type_restore.index')->with('success', 'Xóa thành công.');
    }
}
