@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>   Update Slider
                        <a href=" {{url('admin/sliders')}} " class="btn btn-danger btn-sm float-end text-white float-end">
                           BACK
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            
                            <div class="mb-3" >
                                <label for="" >
                                    Title
                                </label>
                                <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
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
                                <textarea rows="3" name="description" class="form-control">
                                    {{ $slider->description }}
                                </textarea>
                                @error('description')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>

                            <div class="mb-3" >
                                <label  >
                                    Image
                                </label>
                                <input type="file" name="image" class="form-control"  >
                                <img src="{{asset("$slider->image")}}" style="width:50px; height:50px"  alt="sliders" />
                                {{-- @error('image')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror --}}
                            </div>
                           
                            <div class="mb-3">
                                <label for="">
                                    Status
                                </label>
                                <br/>
                                <input type="checkbox" name="status" value="{{ $slider->status == '1' ? 'checked' : ''}}" >
                                Checked = Hidden, Unchecked = Visible
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