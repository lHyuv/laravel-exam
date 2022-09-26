<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
      <!--
    <script src="{{ asset('js/app.js') }}" defer></script>
        -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <!--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    -->
    <!--Plugins--> 
    <script src = "{{ asset('adminlte/plugins/jquery/jquery.js') }}"></script>
    <script src = "{{ asset('adminlte/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src = "{{ asset('adminlte/plugins/popper/popper.js') }}"></script>
    <!--Plugins:end-->
    <!--Admin LTE-->
    <link href="{{ asset('adminlte/dist/css/adminlte.css') }}" rel="stylesheet">
    <script src = "{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
    <!--Admin LTE:end--> 

</head>
<body class = "hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @if(Auth::user())
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @else 
         <nav class="navbar navbar-expand navbar-white navbar-light">
    @endif
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

        @if(Auth::user())
            @include('layouts.sidebar')
        @endif
            @yield('content')
        @if(Auth::user())
            @include('layouts.footer')
        @endif
        
    </div>
</body>
</html>
