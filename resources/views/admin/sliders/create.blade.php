@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>   Add Slider
                        <a href=" {{url('admin/sliders')}} " class="btn btn-danger btn-sm float-end text-white float-end">
                           BACK
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            
                            <div class="mb-3" >
                                <label for="" >
                                    Title
                                </label>
                                <input type="text" name="title" class="form-control">
                                @error('name')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">
                                    Description
                                </label>
                                <textarea rows="3" name="description" class="form-control"></textarea>
                                @error('description')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>

                            <div class="mb-3" >
                                <label for="" >
                                    Image
                                </label>
                                <input type="file" name="image" class="form-control">
                            </div>
                           
                            <div class="mb-3">
                                <label for="">
                                    Status
                                </label>
                                <br/>
                                <input type="checkbox" name="status" >
                                Checked = Hidden, Unchecked = Visible
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