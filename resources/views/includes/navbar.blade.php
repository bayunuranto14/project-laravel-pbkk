<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('frontend/images/logo.png')}}" alt="" />
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a class="nav-link active" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="{{route('home')}}/#popular">Konser</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="{{route('home')}}/#partner">Partner</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="{{route('home')}}/#testimonialsHeading">Testimonial</a>
                </li>

                @guest

                <li class="nav-item mx-md-2">

                    <img src="{{asset('backend/assets/images/users/user.png')}}" alt="user" class="rounded-circle" width="40">
                    <a class="nav-link d-lg-inline-block" href="#">Sign Up</a>
                </li>

                @endguest

                @auth

                @if (auth::user()->roles == "ADMIN")
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">Admin</a>
                </li>
                @endif

                <li class="nav-item mx-md-2">
                    <img src="https://ui-avatars.com/api/?name={{auth::user()->name}}" alt="user" class="rounded-circle" width="40">
                    <span class="ml-2 d-none d-lg-inline-block"><span>Hello, </span> <span class="text-dark">{{auth::user()->name}}</span>
                </li>

                @endauth

            </ul>

            @guest
            <!-- Mobile button -->
            <form class="form-inline d-sm-block d-md-none">
                <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='#';">
                    Log In
                </button>
            </form>
            <!-- Desktop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='#';">
                    Log In
                </button>
            </form>

            @endguest

            @auth
            <!-- Mobile button -->
            <form class="form-inline d-sm-block d-md-none" action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn btn-login my-2 my-sm-0" type="submit">
                    Log Out
                </button>
            </form>
            <!-- Desktop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                    Log Out
                </button>
            </form>

            @endauth




        </div>
    </nav>
</div>