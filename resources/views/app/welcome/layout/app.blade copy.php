<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content=en http-equiv=Content-Language>
    <title>
        @yield('title')
    </title>

    {{-- admin  --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/swiper/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/nice_select/nice-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/player/volume.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/scroll/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    {{-- admin --}}
    <link href="{{ asset('imgs/favicon.png') }}"rel=icon sizes=16x16 type=image/gif>
</head>

<body>
    {{-- nav bar starts --}}
    <nav class="navbar navbar-expand-lg fixed-top bg-pink navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img id="MDB-logo" src="{{ asset('imgs/logo.png') }}" alt="alphau-logo" draggable="false"
                    height="30" />
            </a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    {{-- <li class="nav-item">
                        <a class="nav-link mx-2" href="/messenger">
                            Messenger
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/programs">
                            Programs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/3d-radio">
                            3D Radio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/blog">
                            Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/about-us">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        |
                    </li>
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }}
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
    {{-- nav bar ends --}}
    @yield('welcomebody')
    {{-- footer starts --}}
    <footer class="text-center bg-pi-li text-lg-start text-muted footer_style">

        <section class="">
            <div class="container text-center text-md-start p-2">
                <div class="row">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">National Institute of Education
                        </h6>
                        {{-- <p>
                            Here you can use rows and columns to organize your footer
                            content. Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                        </p> --}}
                    </div>
                    {{-- <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Products</h6>
                        <p>
                            <a href="#!" class="text-reset">
                                Angular
                            </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                React
                            </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                Vue
                            </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                Laravel
                            </a>
                        </p>
                    </div> --}}
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
                        {{-- <p>
                            <a href="#!" class="text-reset">
                                Messenger
                            </a>
                        </p> --}}
                        <p>
                            <a href="#!" class="text-reset">
                                Programs
                            </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                3D Radio
                            </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                Blog
                            </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                Contact Us
                            </a>
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p>
                            <i class="fas fa-home me-3"></i> P.O. Box 21, High Level Rd, Maharagama, Sri Lanka
                        </p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            alphau@nie.ac.lk
                        </p>
                        <p>
                            <i class="fas fa-phone me-3"></i> +94 117 601 601
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center p-4">
            Copyright © 2023 - National Institute of Education -
            <a class="text-reset fw-bold" href="#">
                Designed and Implemented by Yuwan Audio Visuals
            </a>
            <a class="text-reset fw-bold" href="https://realit.lk">
                - Developed By Real IT PVT LTD
            </a>
        </div>
    </footer>
    {{-- footer ends --}}
    {{-- admin --}}
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/swiper/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/player/jplayer.playlist.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/player/jquery.jplayer.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/player/audio-player.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/player/volume.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/nice_select/jquery.nice-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/scroll/jquery.mCustomScrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    {{-- admin --}}
</body>


</html>
