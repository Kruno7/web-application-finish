<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>-->

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    Logo
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                   
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Početna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('apartment') ? 'active' : '' }}" href="{{ route('user.apartment.index') }}">Stanovi</a>
                        </li>
                        @if (Auth::check())
                        
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('apartment/messages') ? 'active' : '' }}" href="{{ route('user.apartment.message') }}">Poruke 
                                <span class="badge badge-danger">{{ Auth::user()->unreadNotifications ->count() }}</span>
                            </a>
                        </li>
                     
                        @endif
                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Prijava') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registracija') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->hasRole('admin'))
                                    <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                                        {{ __('Profil') }}
                                    </a>
                                    @elseif (Auth::user()->hasRole('renter'))
                                    <a class="dropdown-item" href="{{ route('renter.profile.index') }}">
                                        {{ __('Profil') }}
                                    </a>
                                    @else
                                    <a class="dropdown-item" href="{{ route('user.profile.index') }}">
                                        {{ __('Profil') }}
                                    </a>
                                    @endif
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Odjava') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
       
        <main class="content">
            @yield('content')
        </main>

        <div>
            @include('layouts.public.footer')
        </div>
    </div>
</body>
</html>
