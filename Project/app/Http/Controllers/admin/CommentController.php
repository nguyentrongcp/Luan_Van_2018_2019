<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Comment;
use App\MiniComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $comment = new MiniComment();
        $comment->comment_id = $request->get('comment-id');
        $comment->admin_id = Admin::adminId();
        $comment->date = date('Y-m-d H:i:s');
        $comment->content = $request->get('content');
        $comment->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $comment = Comment::findOrFail($id);
        $comment->is_approved = (int)$request->get('approve') % 2;
        $comment->update();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $comments = Comment::findOrFail($id);
            $comments->delete();

        return back()->with('success','Xóa thành công!');
    }

    public function filter($id){
        $showFilters = Comment::where('is_approved',$id)->paginate(10);

        return view('admin.comment.filter.index',compact('showFilters'));
    }
}
