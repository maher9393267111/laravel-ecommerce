<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\BrandFormRequest;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    //

    public function index()
    {
        return view('admin.brand.index');
    }



    public function create()
    {
        $categories = Category::where('status', '0')->get();
        return view('admin.brand.create', compact('categories'));
    }

    public function store(BrandFormRequest $request)
    {
        $validatedData = $request->validated();

        $brand = new Brand;
        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);
        $brand->status = $request->status == true ? '1' : '0';
      //  $brand->category_id = $validatedData['category_id'];
        $brand->save();
        return redirect('admin/brand')->with('message', 'Brand Added Successfullt');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $categories = Category::where('status', '0')->get();
        return view('admin.brand.edit', compact('brand', 'categories'));
    }




    public function update(BrandFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $brand =  Brand::findOrFail($id);
        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);
        $brand->status = $request->status == true ? '1' : '0';
       // $brand->category_id = $validatedData['category_id'];
        $brand->update();
        return redirect('admin/brand')->with('message', 'Brand Update Successfullt');
    }



    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect('admin/brand')->with('message', 'Category Delete Successfullt');
    }


}
