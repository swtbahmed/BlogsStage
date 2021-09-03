@extends('backend.layout.master')

@section('title')
    Blog - Awaiting Blogs
@endsection


@section('styles')

@endsection


@section('content')
    <!-- Page Heading -->



    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
            <h6 class="m-0 font-weight-bold text-primary">Awaiting Blogs</h6>
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
                    <th scope="col">Approve</th>


                <!--  -->
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
                        <th scope="col"><img  class="img-profile rounded-circle" src="{{asset('images/blogimages/' . $blog->image)}}" width="100" height="100" alt="image"></th>
                        <th scope="col"> @if($blog->active == '1')

                                <span class="badge badge-success badge-pill">Approved</span>

                            @else

                                <span class="badge badge-danger badge-pill"> awaiting Approval</span>



                            @endif
                        </th>
                        <th  scope="col"><a href="{{ route('blog.edit',$blog->id) }}"> <i  class='fas fa-edit' style='color:blue'></i></a></th>
                        <th scope="col"> <a href="{{ route('blog.destroy',$blog->id) }}"><i  class='fas fa-trash-alt' style='color:red'></i></a> </th>
                        <th scope="col"><a href="{{route('blog.approve',$blog)}}"><i class="fas fa-check" style="color: limegreen"></i></th>

                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection


@section('scriptes')
    <!--<script type="text/javascript" src="{{asset('/backend/partials/blogs.js')}}"></script> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

@endsection
