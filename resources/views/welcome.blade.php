<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SuperCar Concessionaria</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body, html {
            height: 100%;
        }
        .bg {
            background-image: url("images/home_page.jpg");

            height: 100%;

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        h1, .h1 {
            font-size: 4.1em;
            text-align: center;
            font-family: Impact;
        }

        h1 small, h2 small, h3 small, h1 .small, h2 .small, h3 .small {
            font-size: 60%;
        }

        .title-uppercase {
            margin-top: 6%;
            text-transform: uppercase;
        }


    </style>
</head>
<body>
    <div class="bg">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    SuperCar
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      @if(isset(Auth::user()->tipo_usuario))
                        @if (Auth::user()->tipo_usuario != "comum")
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('cars.create') }}">Cadastrar carro <span class="sr-only">(current)</span></a>
                                </li>
                        @else
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('schedulings.index') }}">Consultar agendamentos <span class="sr-only">(current)</span></a>
                        </li>
                        @endif
                      @endif
                                <li class="nav-item active">
                                <a class="nav-link" href="{{ route('cars.index') }}">Ver carros disponíveis</a>
                                </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastre-se') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
        <h1 class="title-uppercase">SuperCar<br> Concessionária</h1>
        </div>
</body>
</html>