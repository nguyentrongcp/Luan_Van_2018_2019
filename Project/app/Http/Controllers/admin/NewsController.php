<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Image;
use App\ImageNews;
use App\News;
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
        $titleNews = $request->get('name-news');
        $content = $request->get('des');

        $new = new News();
        $new->title = $titleNews;
        $new->content = $content;
        $new->date = date('Y-m-d H:i:s');
        $new->admin_id = Auth::guard('admin')->id();
        $new->save();

        $time = time();
        if ($request->hasFile('news-image-upload')) {
            $news_image = $request->File('news-image-upload');
            $ext = $news_image->extension();

            $image = new Image();
            $path = $news_image
                ->move('admin\assets\images\news', "news-$new->id-$time.$ext");
            $image->link = str_replace('\\', '/', $path);
            $image->save();

            $image_news = new ImageNews();
            $image_news->image_id = $image->id;
            $image_news->news_id = $new->id;
            $image_news->save();

        }

        return back()->with('success', 'Thêm thành công!');
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

        $news->title = $request->get('name-news');
        $news->content = $request->get('des');
        $news->date = date('Y-m-d H:i:s');
        $news->admin_id = Auth::guard('admin')->id();
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
            return back();
        }
        $ids = $request->get('news-id');
        foreach ($ids as $id) {

            $news = News::findOrFail($id);
            $news->delete();
        }

        return back()->with('success', 'Xóa thành công.');
    }

    public function changeImage(Request $request, $id){

        if (!$request->hasFile('news-image-upload')) {
            return back()->with('error', 'Bạn chưa upload hình ảnh!');
        } else {

            foreach (ImageNews::where('news_id', $id)->get() as $idImage) {
                foreach (Image::where('id', $idImage->image_id)->get() as $image) {
                    $oldPath = $image->link;
                    if (!empty($oldPath)) {
                        File::delete($oldPath);
                    }
                    $time = time();
                    $news_image = $request->File('news-image-upload');
                    $ext = $news_image->extension();
                    $path = $news_image
                        ->move('admin\assets\images\news', "news-$id-$time.$ext");
                    $image->link = str_replace('\\', '/', $path);
                    $image->update();
                }
            }

        }
        return back()->with('success','Thay đổi thành công!');
    }
}
