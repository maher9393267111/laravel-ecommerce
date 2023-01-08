@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>   Add brand
                        <a href=" {{url('admin/brand')}} " class="btn btn-danger btn-sm float-end text-white float-end">
                           BACK
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/brand') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">

                            <div class="mb-3" >
                                <label for="" >
                                    Select Category
                                </label>
                                <select name="category_id"  required class="form-control" >
                                    <option value=""> 
                                        --select-category--
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value=" {{$category->id}}"> {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3" >
                                <label for="" >
                                    Name
                                </label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">
                                    Slug
                                </label>
                                <input type="text" name="slug" class="form-control">
                                @error('slug')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                           
                            <div class="mb-3">
                                <label for="">
                                    Status
                                </label>
                                <br/>
                                <input type="checkbox" name="status" >
                            </div>
    
                            <div class="col-md-12 md-3">
                                <button type="submit" class="btn btn-primary float-end">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection