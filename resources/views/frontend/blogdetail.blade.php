@extends('frontend.layout.master')


@section('meta')
{{$blog->text }}
@endsection
@section('title')
Bloggin - Post {{$blog->title}}
@endsection



@section('styles')
@endsection

@section('content')
<header class="masthead" style="background-image: url('frontend/assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{$blog->title}}</h1>
                                <span class="meta">
                                Category :
                                <a href="#!" class="badge badge-info text-info">{{$blog->category->name}}</a>
                                </span>
                        <span class="meta">
                                Tags :
                            @foreach($blog->tags as $tag)
                                <a href="#!"  class="text-info  badge badge-info">{{$tag->name}}</a>
                            @endforeach
                                </span>
                        <span class="meta">
                                Posted by
                                <a href="#!">{{$blog->user->name}}</a>
                                on {{\Carbon\Carbon::parse($blog->created_at)->format('F d, Y')}}
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <blockquote class="blockquote">{{$blog->short_description}}</blockquote>
                    <div class="text-center">
                        <img src="{{asset('/images/blogimages/'.$blog->image)}}"  alt="'{{$blog->image_alt}}'" class="img-fluid rounded">
                    </div>
                    <p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p>
                    <p>{{$blog->description}} <br></p>


                    <form class="mb-3" action="{{route('comment.store',$blog)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="content">votre commentaire</label>
                            <textarea  class="form-control" name="content" id="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">commenter</button>
                    </form>
                    <hr>
                    <h5>Commentaires</h5>
                    @foreach($blog->comments as $comment)

                    <div class="card">
                        <div class="card-body">

                            {{$comment->content}}
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>By {{$comment->user->name}}</strong>
                                <small>Posté le {{$comment->created_at}}</small>
                            </div>
                        </div>
                    </div>
                    @auth()
                        <button class="btn btn-info mb-5"   onclick="toggleRepleyComment({{$comment->id}}">Repondre</button>
                        <form action="{{route('comment.storereply',$comment)}}" method="POST" class="ml-3 mb-3" id="replyComment-{{$comment->id}}">
                            @csrf
                            <div class="form-group">
                                <label for="replyComment">Ma réponse</label>
                                <textarea name="replyComment" id="repleyComment" class="form-control"></textarea>
                            </div>
                           <small><button  type="submit" class="btn btn-primary">réponse</button></small>
                        </form>
                        @endauth
                        @endforeach
                </div>
            </div>
        </div>

    </article>
@endsection

@section('scriptes')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('jquery.js')}}"></script>

    <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script>
        function toggleRepleyComment(id){
            let element = document.getElementById('replyComment-' + id);
            element.classList.toggle(d-none);

        }
    </script>
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>


<script>
    function toggleRepleyComment(id){
        let element = document.getElementById('replyComment-' + id);
        element.classList.toggle(d-none);

    }
</script>
@endsection
