<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Иформационная система' }}</title>
    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/61093a97c4.js" crossorigin="anonymous"></script>



    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css?001') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" href="{{ asset('css/allExt.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/summernote-bs4.min.css') }}" rel="stylesheet">
    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
</head>
<body>
    <div id="app">
        <div id="tooltip"></div>
        @if (Route::current()->getName() != 'login')
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('img/top.png')}}" alt="">
                </a>
{{--                <a href="{{ Redirect::back()->getTargetUrl() }}">--}}
{{--                    назад--}}
{{--                </a>--}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ 'Здравствуйте, ' . Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выход') }}
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
        @endif

        <main class="py-4">
            @yield('content')
        </main>

        <div class="preloader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>

    </div>


    @if(Route::current()->getName() == 'registryPol')
        @include('regPolModal')
    @endif
    @if(Route::current()->getName() == 'registryPol')
        @include('regPolModalContent')
    @endif
    @if(Route::current()->getName() == 'registryPol' || Route::current()->getName() == 'registryHospital')
        @include('print')
    @endif
    @if(Route::current()->getName() == 'patient')
        @include('patientEditModal')
    @endif
    @if(Route::current()->getName() == 'cart')
        @include('addPostPatientModal')
    @endif
    @if(Route::current()->getName() == 'cart')
        @include('postContentModal')
    @endif
    @if(Route::current()->getName() == 'registryHospital')
        @include('regHospitalModal')
    @endif


    <!-- Loader -->

        <div id="loader" class="loader">
            <div class="loader-container">
                <h1 class="mb-5">Потеряно соединение с сервером</h1>
                <svg class="spinner-loader mb-5" viewBox="0 0 50 50">
                    <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                </svg>
                <p>Сектор ИТ уже работает над исправление проблемы. Пожалуйста, подождите.</p>
            </div>
        </div>

    <!-- Footer scripts -->

    <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/js/datepicker-ru.js') }}"></script>
    <script src="{{ asset('/js/masks.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
    <script src="{{ asset('/js/print.min.js') }}"></script>
    <script src="{{ asset('/js/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('/js/summernote/lang/summernote-ru-RU.min.js') }}"></script>
    <script src="{{ asset('/js/summernote/summernote-ext-print.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @auth
        <script>const USERID = {{Auth::user()->id}};</script>
        <script src="{{ asset('/js/centrifuge.min.js') }}"></script>
        <script src="{{ asset('/js/application.js') }}"></script>
        @if (Route::current()->getName() == 'registryPol')
            <script src="{{ asset('/js/blanks/registerPolyclinic.js') }}"></script>
        @endif
        @if (Route::current()->getName() == 'patient')
            <script src="{{ asset('/js/blanks/patient.js') }}"></script>
        @endif
        @if (Route::current()->getName() == 'registryHospital')
            <script src="{{ asset('/js/blanks/registerHospital.js') }}"></script>
        @endif
        @if (Route::current()->getName() == 'doctor')
            <script src="{{ asset('/js/blanks/doctor.js') }}"></script>
        @endif
        @if (Route::current()->getName() == 'cart')
            <script src="{{ asset('/js/blanks/cart.js') }}"></script>
        @endif
        <script src="{{ asset('/js/prints.js') }}"></script>
        <script>
            var centrifuge = new Centrifuge('wss://test.zdb-omsk.ru:8081/connection/websocket');
            centrifuge.setToken("{{ Auth::user()->broadcast_token }}");

            var url = window.location.pathname;

            if(url == "/registry/polyclinic"){
                centrifuge.subscribe("registry", function(data) {
                    wsHandler(data.data);
                });
            }


            centrifuge.connect();
            centrifuge.on('connect', function(context) {
                removeLoader();
            });
            centrifuge.on('disconnect', function(context) {
                addLoader();
            });
        </script>
    @endauth


</body>
</html>
