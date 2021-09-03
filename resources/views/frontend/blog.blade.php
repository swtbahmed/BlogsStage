@extends('frontend.layout.master')

@section('title')
    Blogging
@endsection



@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endsection


@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('frontend/assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach($blogs as $blog)
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="{{url('/blog/'. $blog->url)}}">
                        <h2 class="post-title">{{$blog->title}}</h2>
                        <h3 class="post-subtitle">{{$blog->short_description}}</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">{{$blog->user->name}}</a>
                        on {{\Carbon\Carbon::parse($blog->created_at)->format('F d, Y')}}
                    </p>
                </div>
                <hr>

                    <button  class="btn btn-success ">  Like <span class="glyphicon glyphicon-thumbs-up"></span> </button> <button  class="btn btn-danger">Dislike</button>
                    <hr>
                @endforeach
                <div class="col-12 ">
                    <nav aria-label="pagination">
                        <ul class="pagination justify-content-center">
                            {{$blogs->links()}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scriptes')
    <script src="{{asset('backend/vendor/jquery/jquery.js')}}"></script>

@endsection
