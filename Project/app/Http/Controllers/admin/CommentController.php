<?php

namespace App\Http\Controllers\admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $comments = DB::table('comments')
//            ->select('foody_id')
//            ->groupBy('foody_id')->paginate(10);
        $comments = Comment::orderBy('is_approved', 'ASC')->paginate(10);

        return view('admin.comment.index',compact('comments'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::where('foody_id',$id)->orderBy('is_approved', 'ASC')->get();

        return view('admin.comment.show',compact('comments','id'));
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
        $comments = Comment::findOrFail($id);
        $comments->is_approved = true;
        $comments->update();

        return back()->with('success','Đã duyệt!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!$request->get('comment-id')){
            return back()->with('error','Dữ liệu không đúng vui lòng kiểm tra lại!');
        }
        $ids = $request->get('comment-id');
        foreach ($ids as $id){
            $comments = Comment::findOrFail($id);
            $comments->delete();
        }
        return back()->with('success','Xóa thành công!');
    }

    public function filter($id){
        $showFilters = Comment::where('is_approved',$id)->paginate(10);

        return view('admin.comment.filter.index',compact('showFilters'));
    }
}
