<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //

    public function index()
    {
        return view('admin.category.index');
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();

        $path = 'uploads/category/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move($path, $filename);
            $validatedData['image'] = "uploads/category/$filename";
        }
        $validatedData['status'] = $request->status == true ? '1' : '0';

        Category::create([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/category')->with('message', 'Category Added Successfullt');
    }


// Edit Category
public function edit($id)
{
    $category = Category::find($id);
    return view('admin.category.edit', compact('category'));
}


public function update(CategoryFormRequest $request, $id)
{
    $validatedData = $request->validated();

    $category =  Category::findOrFail($id);
    
    if ($request->hasFile('image')) {
        $uploadPath = 'uploads/cagegory/';
        $extention = $request->file('image')->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $request->file('image')->move($uploadPath, $filename);
        $finalImagePathName = $uploadPath . $filename;
        $validatedData['image'] = $finalImagePathName;
    }
    $validatedData['status'] = $request->status == true ? '1' : '0';

    Category::where('id', $category->id)->update([
        'name' => $validatedData['name'],
        'slug' => Str::slug($validatedData['slug']),
        'description' => $validatedData['description'],
        'image' => $validatedData['image'] ?? $category->image,
        'meta_title' => $validatedData['meta_title'],
        'meta_keyword' => $validatedData['meta_keyword'],
        'meta_keyword' => $validatedData['meta_keyword'],
        'status' => $validatedData['status'],
    ]);


    return redirect('admin/category')->with('message', 'Category Update Successfullt');
}

public function delete($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect('admin/category')->with('message', 'Category Delete Successfullt');
}






}
