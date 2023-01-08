@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Brand
                        <a href=" {{ url('admin/brand')}} " class="btn btn-primary btn-sm float-end text-white float-end">
                            Back
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/brand/'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                       
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
                            
                            <div class="col-md-6 md-3" >
                                <label for="" >
                                    Name
                                </label>
                                <input type="text" name="name" class="form-control"
                                value="{{ $brand-> name }}" 
                                
                                />
                                @error('name')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Slug
                                </label>
                                <input type="text" name="slug" class="form-control" value="{{ $brand-> slug }}"
                                />
                                @error('slug')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                           
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Status
                                </label>
                                <br/>
                                <input type="checkbox" name="status" 
                                {{ $brand-> status == '1' ? 'checked': '' }}
                                
                                >
                            </div>
    
                            <div class="col-md-12 md-3">
                                <button type="submit" class="btn btn-primary float-end">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection