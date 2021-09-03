@extends('backend.layout.master')

@section('title')
    Blog - Blogs
@endsection


@section('styles')

@endsection


@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Blogs</h1>


    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
            <h6 class="m-0 font-weight-bold text-primary">Tags</h6>
            <a href="{{route('blogs.create')}}" class="float-right btn btn-success" >Add Blog </a>
        </div>
        <div class=" card-body">
            <table class="table table-striped table-bordered w-100" id="tags">
                <thead>
                <tr>

                    <th scope="col">Name</th>
                    <th scope="col"> Bloger Name</th>
                    <th scope="col"> Category</th>
                    <th scope="col"> Tag</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Image</th>
                    <th scope="col">Etat</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <th scope="col">{{ $blog->title }}</th>
                        <th scope="col"> <span class="badge badge-success badge-pill">{{ $blog->user->name }}</span></th>
                        <th scope="col"> <span class="badge badge-dark badge-pill">{{ $blog->category->name }}</span></th>
                        @foreach($blog->tags as $tag)
                            <th scope="col">{{$tag->name }}</th>
                        @endforeach
                        <th scope="col">{{ $blog->created_at }}</th>
                        <th scope="col">{{ $blog->updated_at }}</th>
                        <th scope="col"><img  class="img-profile rounded" src="{{asset('images/blogimages/' . $blog->image)}}" width="100" height="100" alt="image"></th>
                        <th scope="col"> @if($blog->active == '1')

                                 <span class="badge badge-success badge-pill">Approved</span><i class="fas fa-check" style="color: limegreen"></i>

                            @else

                                 <span class="badge badge-danger badge-pill"> waiting Approval</span>



                            @endif
                        </th>
                       <th  scope="col"><a href="{{ route('blog.edit',$blog->id) }}"> <i  class='fas fa-edit' style='color:blue'></i></a></th>
                        <th scope="col"> <a href="{{ route('blog.destroy',$blog->id) }}"><i  class='fas fa-trash-alt' style='color:red'></i></a> </th>

                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection


@section('scriptes')

@endsection
