@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Products
                    <a href=" {{url('admin/products')}} " class="btn btn-danger btn-sm float-end text-white float-end">
                       Back
                    </a>
                </h3>
            </div>
            <div class="card-body" >
                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors as $error)
                                <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <form action=" {{ url('admin/products')}} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                        Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                        SEO Tags
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                        Details
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="product-image-tab" data-bs-toggle="tab" data-bs-target="#product-image-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                            Product Image
                        </button>
                    </li>
                  
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label >Category</label>
                                <select name="category_id"  class="form-control" >
                                    @foreach ($categories as $category)
                                        <option value=" {{$category->id}}"> {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label >Procut Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label >Procut Slug</label>
                                <input type="text" name="slug" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label >Select Brand</label>
                                <select name="brand"  class="form-control" >
                                    @foreach ($brands as $brands)
                                        <option value=" {{$brands->id}}"> {{$brands->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label >small Description (500 words) </label>
                                <textarea  name="small_description" class="form-control"  rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label >Description</label>
                                <textarea  name="description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label >Meta Title</label>
                                <input type="text" name="meta_title" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label > Meta Keyword </label>
                                <textarea  name="meta_keyword" class="form-control"  rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label > Meta Description </label>
                                <textarea  name="meta_description" class="form-control"  rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label >Original Price</label>
                                        <input type="text" name="original_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label >Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label >Quantity</label>
                                        <input type="number" name="quantity" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label >Trending</label>
                                        <input type="checkbox" name="trending" style="width: 50px;height:50px; ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label >Trending</label>
                                        <input type="checkbox" name="featured" style="width: 50px;height:50px; ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label >Status</label>
                                        <input type="checkbox" name="status" style="width: 50px;height:50px; ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="product-image-tab-pane" role="tabpanel" aria-labelledby="product-image-tab" tabindex="0">
                            <div class="mb-3">
                                <label >Upload Product Image</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                        </div>
                    </div>
                    <div>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection