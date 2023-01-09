<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandFormRequest;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\SliderFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class SliderController extends Controller
{
    //

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = "uploads/slider/$filename";
        }
        $validatedData['status'] = $request->status == true ? '1' : '0';


        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/sliders')->with('message', 'Slider Added Successfullt');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, int $slider_id)
    {
        $validatedData = $request->validated();

        $slider =  Slider::findOrFail($slider_id);
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            $extention = $request->file('image')->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $request->file('image')->move($uploadPath, $filename);
            $finalImagePathName = $uploadPath . $filename;
            $validatedData['image'] = $finalImagePathName;
        }

        $validatedData['status'] = $request->status == true ? '1' : '0';

        Slider::where('id', $slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $slider->image,
            'status' => $validatedData['status'],
        ]);




        return redirect('admin/sliders')->with('message', 'Slider Added Successfullt');
    }

    public function delete(int $slider_id)
    {
        $slider = Slider::findOrFail($slider_id);
        $slider->delete();
        return redirect()->back()->with('message', 'Slider Delete Accessfully');
    }



}
