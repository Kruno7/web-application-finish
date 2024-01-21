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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (Auth::user()->hasRole('admin'))
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.user.index') }}">Korisnici</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/city') ? 'active' : '' }}" href="{{ route('admin.city.index') }}">Gradovi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/apartment') ? 'active' : '' }}" href="{{ route('admin.apartment.index') }}">Stanovi</a>
                            </li>
                        @elseif (Auth::user()->hasRole('renter'))
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('renter/apartment') ? 'active' : '' }}" href="{{ route('renter.apartment.index') }}">Stanovi</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('renter/apartment/message') ? 'active' : '' }}" href="{{ route('renter.apartment.message') }}">Poruke 
                                    <span class="badge badge-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
                                </a>
                            </li>
                            

                            <!--<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Neprocitane poruke 
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @forelse (Auth::user()->notifications as $notification)
                                @if ($notification->read_at == null)
                                    <!--<a href="{{-- route('renter.apartment.message.read') --}}" class="dropdown-item">{{-- $notification->data['content'] --}}</a> --
                                    <a href="javascript:void(0)" class="dropdown-item" onclick="read_message(this)"  data-notificationid="{{-- $notification->id --}}">{{-- $notification->data['content'] --}}</a>
                                @endif
                                
                                    @empty
                                    <a class="dropdown-item">No message found</a>
                                @endforelse
                                    
                                </div>
                            </li> -->
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

        <main class="py-4">
            @yield('content')
        </main>

        <div>
            @include('layouts.public.footer')
        </div>
    </div>

    <script>
        function read_message (caller) {
            let notificationid = document.getElementById('messageId').value = $(caller).attr('data-notificationid')
            console.log("Notify ", notificationid)
                $.ajax({
                url: "{{ route('renter.apartment.message.read') }}",
                method: "GET",
                data: {
                    id: notificationid,
                },
                success: function (response) {
                    window.location.reload();
                },
            });
        }
    </script>
</body>
</html>
