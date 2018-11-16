<?php

namespace App\Http\Controllers\admin;

use App\Slider;
use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.slider.index', compact('sliders'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->hasFile('slider-image')) {
            return back()->with('error', 'Bạn chưa upload ảnh!');
        }
        $images = $request->file('slider-image');

        if (is_array($images)){
            foreach ($images as $key => $image) {
                $slides = new Slider();
                $time = time();
                $ext = $image->extension();
                $path = $image
                    ->move('admin\assets\images\sliders', "sliders-$key.'-'.$time.$ext");
                $slides->image = str_replace('\\', '/', $path);
                $slides->save();
            }
        }else{
            $slides = new Slider();
            $time = time();
            $ext = $images->extension();
            $path = $images
                ->move('admin\assets\images\sliders', "sliders-0.'-'.$time.$ext");
            $slides->image = str_replace('\\', '/', $path);
            $slides->save();
        }


        return back()->with('success','Thêm ảnh thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('slider-id');
        foreach ($ids as $id){
            $sliders = Slider::findOrFail($id);
            $oldPath = $sliders->image;
            if (file_exists($oldPath)){
                unlink($oldPath);
                $sliders->delete();
            }
        }
        return back()->with('success','Xóa thánh công!');
    }
}
