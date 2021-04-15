<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="./js/menu_responsive.js"></script>
    <script src="./js/like_dislike.js"></script>
    <script src='https://kit.fontawesome.com/66f5e943e2.js' crossorigin='anonymous'></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/app_movil.css">
    <link rel="stylesheet" href="./css/util.css">

</head>

<body>
    <div id="app" class="limite">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-relative">
            <div class="container">
                <a class="navbar-brand text-uppercase" href="{{ route('home') }}">Red Social</a>
                <div class="btn_menu" type="button" id="btn_menu_accion">
                    <div class="contenedor_barras">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="menu_app">
                    <ul class="navbar-nav ml-auto menu">
                        <!-- Autenticacion del usuario -->
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home') }}">{{ __('Inicio') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('like.likes') }}">{{ __('Favoritas') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.index') }}">{{ __('Perfiles') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('image.create') }}">{{ __('Subir Imagen') }}</a>
                        </li>

                        <li class="nav-item dropdown search_li">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @include('include.imagen')
                                {{Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('user.profile', ['id' => Auth::user()->id]) }}">
                                    {{ __('My profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('setting')}}">
                                    {{ __('Setting') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                            <form action="{{ route('user.index') }}" method="get" id="buscador">
                                <div class="search">
                                    <div class="form-outline">
                                        <input type="search" class="form-control" id='search' required />
                                    </div>
                                    <button class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>

    </div>
</body>

</html>