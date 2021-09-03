@extends('backend.layout.master')

@section('title')
    Blog - Editing {{$blog->title}}
@endsection


@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


@endsection


@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Blog <a href="{{url('/blogs')}}" class="btn btn-dark btn-sm float-right"> Return To Blogs</a></h1>


    <div class="row">
        <div class="col-x1-12 col-lg-12">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <form action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-x1-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="title" class="ml-1">Blog title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{$blog->title}}" placeholder="Blog title" >
                                @if($errors->has('title'))
                                    <small class="text-danger ml-1" >{{$errors->first('title')}}</small>
                                @endif
                            </div>
                            <div class=" form-group col-x1-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="url" class="ml-1">Url</label>
                                <input type="text" name="url" id="url" class="form-control" value="{{$blog->url}}" placeholder="my first blog" >
                                @if($errors->has('url'))
                                    <small class="text-danger ml-1" >{{$errors->first('url')}}</small>
                                @endif                            </div>
                        </div>

                        <div class="form-row">
                            <div class=" form-group col-x1-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="category" class="ml-1">Select Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option  {{old('category') == $category->id ? 'selected' : ''}}value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category'))
                                    <small class="text-danger ml-1" >{{$errors->first('category')}}</small>
                                @endif
                            </div>
                            <div class="form-group col-x1-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="tags" class="ml-1">Select Tags</label>
                                <select class="form-control tags" id="tag[]" name="tags[]"  multiple="">
                                    <option value="">select  Blog</option>
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('tag'))
                                    <small class="text-danger ml-1" >{{$errors->first('tag')}}</small>
                                @endif
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-x1-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="image" class="ml-1">Upload Image</label>
                                <input type="file" name="image" id="image"  class="form-control-file" value="{{$blog->image}}">
                                @if($errors->has('image'))
                                    <small class="text-danger ml-1" >{{$errors->first('image')}}</small>
                                @endif                            </div>
                            <div class="form-group col-x1-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="image_alt" class="ml-1">Image Text</label>
                                <input type="text" name="image_alt" id="image_alt" placeholder="my blog image" value="{{$blog->image_alt}}"  class="form-control">

                                @if($errors->has('image_alt'))
                                    <small class="text-danger ml-1" >{{$errors->first('image_alt')}}</small>
                                @endif                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-x1-12 col-lg-12 col-md-12 col-sm-12">
                                <label for="text" class="ml-1"> Text</label>
                                <input type="text" name="text" id="text" placeholder="For Ex : How to use Blog" value="{{$blog->text}}" class="form-control">

                                @if($errors->has('text'))
                                    <small class="text-danger ml-1" >{{$errors->first('text')}}</small>
                                @endif                            </div>
                            <div class="form-group col-x1-12 col-lg-12 col-md-12 col-sm-12">
                                <label for="shortdescription" class="ml-1"> Short Description</label>
                                <textarea class="form-control" name="short_description" id="shortdescription" rows="5" >{{$blog->short_description}}</textarea>
                                @if($errors->has('short_description'))
                                    <small class="text-danger ml-1" >{{$errors->first('short_description')}}</small>
                                @endif
                            </div>

                            <div class="form-group col-x1-12 col-lg-12 col-md-12 col-sm-12">
                                <label for="description" class="ml-1"> Description</label>
                                <textarea class="form-control" name="description" id="description"  >{{old('description')}}</textarea>
                                @if($errors->has('description'))
                                    <small class="text-danger ml-1" >{{$errors->first('description')}}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-check mb-2">
                            <input type="checkbox" name="active" id="active" class="form-check-input" checked="">
                            <label for="active" class="form-check-label">publish Blog</label>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Save Changes</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection


@section('scriptes')

@endsection
