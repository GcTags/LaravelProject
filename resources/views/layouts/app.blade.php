<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ElectrOrder') }}</title>
    {{-- <link rel="shortcut icon" href="{{ asset('icon.ico') }}"> --}}
    <link rel="icon" type="image/png" src="{{ asset('/storage/img/icon.png') }}">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    .navbar-expand-lg {
        background-color: #fdea42;
        color: black;
    }

    /* body{
    background-color: #c7fdff;
} */
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg py-1 navbar-light sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/storage/img/icon.png') }}" width="80" height="50" alt="">
                {{ config('app.name', 'ElectrOrder') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" >
                            <input class="form-control mr-sm-2" type="search" name="term" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                        </form>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            
                        @else
                            @if (Auth::user()->email_verified_at === NULL)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        ({{ Auth::user()->name }})
                                    </a>
                                    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a style="text-align:center;color:red;cursor:context-menu;" class="dropdown-item">
                                            Verfiy Email <br> Check email to login properly!
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @elseif (Auth::user()->role === 1)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            {{ __('Dashboard') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('products.index') }}">
                                            {{ __('Products') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('users.index') }}">
                                            {{ __('User Table') }}
                                        </a>
                                        <a class="dropdown-item" href="#" id="profile_btn">
                                            {{ __('Profile') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>


                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('products.index') }}">
                                            {{ __('My Products') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('sales.index') }}">
                                            {{ __('My Sales') }}
                                        </a>
                                        <a class="dropdown-item" href="#" id="profile_btn">
                                            {{ __('My Profile') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('carts.index') }}">
                                            {{ __('My Cart') }}

                                        </a>
                                        <a class="dropdown-item" href="{{ route('orders.index') }}">
                                            {{ __('My Orders') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endif

                                {{-- START PROFILE MODAL--}}
                                    <div class="modal primary" id="profile_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="example@Modal.com">User Profile</h5>
                                                    <button id="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</spam>
                                                    </button>
                                                </div>
                                            <form action="/users" method="POST">

                                                
                                                <div class="modal-body">

                                                        <div class="form-group">
                                                            <label>Name: {{Auth::user()->name}}</label>
                                                            <!-- <input type="text" name="name" class="form-control" placeholder="Name: {{Auth::user()->name}}"> -->
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Email: {{Auth::user()->email}}</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Address: {{Auth::user()->address}}</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Contact: {{Auth::user()->contact}}</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Birthdate: {{Auth::user()->birthdate}}</label>
                                                        </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <li><a type="button" class="btn button btn-info"
                                                            href="{{ route('users.show', Auth::user()->id) }}" style="width:100%;">Edit</a>
                                                    </li>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                {{-- END PROFILE MODAL--}}

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        {{-- <ul class="nav justify-content-center mt-4">
                <li class="nav-item">
                    <div class="form-group">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </li>
            </ul> --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<script>
$(document).ready(function(){
var modal = document.getElementById("profile_modal");
var btn = document.getElementById("profile_btn");
var cls = document.getElementById("close");

btn.onclick = function() {
  modal.style.display = "block";
}
cls.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
});
</script>

</html>
