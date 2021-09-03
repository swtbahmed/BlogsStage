<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.html"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('/')}}">Blog</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('/about')}}">About</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('/contact')}}">Contact</a></li>
                @if (!\Illuminate\Support\Facades\Auth::check())
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('/login')}}">Login</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('/register')}}">Register</a></li>
                @else
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                    <li class="nav-item dropdown">
                        <a href="#" class=" nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="fa fa-globe"></span>Notifications<span class="badge btn-danger"> {{count(auth()->user()->notifications)}}</span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach( auth()->user()->unreadNotifications as $notification)
                            <a href="{{route('blog.showfromnotfi',['blog'=>$blog,'notification'=>$notification->id])}}" class="dropdown-item">{{$notification->data['username']}} a posté un commentaire sur <strong>{{$notification->data['topictitle']}}</strong></a>

                            @endforeach
                        </ul>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>
