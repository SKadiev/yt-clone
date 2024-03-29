<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">


    <!-- Video js -->
    <link href="https://vjs.zencdn.net/7.18.1/video-js.css" rel="stylesheet"/>

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <!-- <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->

    <script defer
            src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Compiled and minified JavaScript -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script defer
            src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item {{Route::is('/') ? 'active' : ''}}">
                            <a class="nav-link"
                               href="/">{{ config('app.name', 'Laravel')}} </a>
                        </li>
                        <li class="nav-item {{Route::is('video.index',auth()->user()->channel->slug ) ? 'active' : ''}}">
                            <a class="nav-link"
                               href="{{route('video.index',auth()->user()->channel->slug )}}"
                            >Videos</a>
                        </li>
                        <li class="nav-item {{ Route::is('channel.edit',auth()->user()->channel->slug ) ? 'active' : ''}}">
                            <a class="nav-link"
                               href="{{route('channel.edit', auth()->user()->channel->slug)}}
                                   ">Channel</a>
                        </li>
                    @endauth
                    <li class="nav-item {{Route::is('video.global') ? 'active' : ''}}">
                        <a class="nav-link"
                           href="{{ route('videos.global')}}">Global videos </a>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse"
                 id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a href="{{route('video.create', auth()->user()->channel)}}"
                               class="mt-2 nav-link">
                                <span class="material-icons">video_call</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown"
                               class="nav-link dropdown-toggle"
                               href="#"
                               role="button"
                               data-bs-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div
                                class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                   href="{{ route('channel.edit', [ \Auth::user()->channel]) }}">
                                    {{Auth::user()->channel->name}}
                                    <img class="avatar-img-mini"
                                         src="{{asset(Auth::user()->channel->image)}}"
                                         alt="{{Auth::user()->channel->name}} ">
                                </a>

                                <a class="dropdown-item"
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form"
                                      action="{{ route('logout') }}"
                                      method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main >
        @yield('content')
    </main>
</div>
@stack('video-stack')
@stack('css')
@livewireScripts

</body>
</html>
