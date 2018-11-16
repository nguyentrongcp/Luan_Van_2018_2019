<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Image;
use App\ImageNews;
use App\News;
use foo\bar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->get('content');
        $title = $request->get('title');
        $count = 0;
        if (News::existedTitle($title)){
            return back()->withErrors(['title'=>'Tiêu đề đã tồn tại! Vui lòng nhập tiêu đề khác.']);
        }
        if (!$request->hasFile('avatar-news')){
            return back()->withErrors(['avatar-news'=>'Bạn chưa chọn ảnh đại diện!']);
        }

        while(strpos($content, 'src="data:image') != false &&
              strpos($content, '" style="') != false) {
            $start = strpos($content, 'src="data:image');
            $end = strpos($content, '" style="');
            $base64 = substr($content, $start + 4, $end - $start - 3);
            $base64 = trim($base64, '"');

            $time = time();
            $img = explode(";base64,", $base64);
            $img_type_aux = explode("image/", $img[0]);
            $img_type = $img_type_aux[1];
            $img_base64 = base64_decode($img[1]);
            $name = "$time-".$count++.".$img_type";
            file_put_contents("admin/image_news/$name", $img_base64);

            $link = asset('/admin/image_news/'.$name);
            $content = str_replace('"'.$base64.'"', "'".trim($link, '"')."'", $content);
        }
        $content = str_replace(' class="fr-fic fr-dib"', '', $content);

        $news = new News();
        $news->title = $title;
        $news->content = $content;
        $news->admin_id = Admin::adminId();
        $news->date = date('Y-m-d H:i:s');

        $time = time();

        $ext = $request->file('avatar-news')->extension();
        $path = $request->file('avatar-news')->move('admin\image_news',"avatar-new-$time.$ext");
        $news->avatar = str_replace('\\', '/', $path);
        $news->save();

        return redirect(route('news.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.show', compact('news'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $title = $request->get('title');
//        if (News::existedTitle($title)){
//            return back()->withErrors(['title'=>'Tiêu đề đã tồn tại! Vui lòng nhập tiêu đề khác.']);
//        }
        $news->title = $title;
        $news->content = $request->get('content');
        $news->date = date('Y-m-d H:i:s');
        $news->admin_id = Admin::adminId();

        if (!$request->hasFile('avatar-news')){
            return back()->withErrors(['avatar-news'=>'Bạn chưa chọn ảnh đại diện!']);
        }else{
            $oldPath = $news->avatar;
            if (file_exists($oldPath)){
                unlink($oldPath);
            }
        }

        $time = time();
        $ext = $request->file('avatar-news')->extension();
        $path = $request->file('avatar-news')->move('admin\image_news',"avatar-new-$time.$ext");
        $news->avatar = str_replace('\\', '/', $path);
        $news->update();

        return back()->with('success', 'Cập nhật thành công.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!$request->has('news-id')) {
            return back()->with('error','Bạn chưa chọn dữ liệu cần xóa!');
        }
        $ids = $request->get('news-id');
        if (is_array($ids)){
            foreach ($ids as $id) {
                $news = News::findOrFail($id);
                $oldPath = $news->avatar;
                if (file_exists($oldPath)){
                    unlink($oldPath);
                    $news->delete();
                }
            }
        }
        return back()->with('success', 'Xóa thành công.');
    }

    public function testImage(Request $request) {

        return Response($request->file('item'));
    }
}
