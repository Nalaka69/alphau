<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/swiper/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/nice_select/nice-select.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/player/volume.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/scroll/jquery.mCustomScrollbar.css') }}">



    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/swiper/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/nice_select/nice-select.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/player/volume.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/scroll/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">

    <link rel="stylesheet" href="userInterface/fonts/icomoon/style.css" />

    <link rel="stylesheet" href="userInterface/css/owl.carousel.min.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="userInterface/css/bootstrap.min.css" />

    <!-- Style -->
    <link rel="stylesheet" href="userInterface/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.5/sweetalert2.min.css"
        integrity="sha512-InYSgxgTnnt8BG3Yy0GcpSnorz5gxHvT6OEoRWj91Gg+RvNdCiAharnBe+XFIDS754Kd9TekdjXw3V7TAgh6Vw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css"
        integrity="sha512-oAvZuuYVzkcTc2dH5z1ZJup5OmSQ000qlfRvuoTTiyTBjwX1faoyearj8KdMq0LgsBTHMrRuMek7s+CxF8yE+w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- admin --}}
    <link href="{{ asset('imgs/favicon.png') }}"rel=icon sizes=16x16 type=image/gif>
    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Website Menu #5</title>
</head>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar site-navbar-target py-4" role="banner">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-3">
                    <div class="site-logo">
                        <a href="index.html" class="font-weight-bold text-white">Brand</a>
                    </div>
                </div>
                <div class="col-6 text-right">
                    {{-- <button href="" class="btn btn-primary">Login</button>
                    <button href="" class="btn btn-primary">Login</button> --}}
                    @guest
                        @if (Route::has('login'))
                            <a class="ms_btn login_btn" href="{{ route('login') }}"><span>Login</span></a>
                        @endif

                        @if (Route::has('register'))
                            <a class="ms_btn reg_btn" href="{{ route('register') }}"><span>Register</span></a>
                        @endif
                    @else
                        <div class="ms_top_btn">
                            <a href="javascript:;" class="ms_admin_name">Hello {{ Auth::user()->first_name }}</a>
                            <ul class="pro_dropdown_menu">
                                @if (Auth::user()->role == 'admin')
                                    <!-- Admin Role -->
                                    <a href="{{ route('admin.home') }}">Admin Dashboard</a>
                                @elseif(Auth::user()->role == 'user')
                                    <!-- Student Role -->
                                    <a href="{{ route('student.profile') }}">Profile</a>
                                @elseif(Auth::user()->role == 'school')
                                    <!-- School Role -->
                                    <a href="{{ route('school.dashboard') }}">School Admin Dashboard</a>
                                @endif
                                <li>
                                    <a class="" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
                <div class="col-3 text-right">
                    <span class="d-inline-block d-lg-block"><a href="#"
                            class="text-black site-menu-toggle js-menu-toggle py-5"><span
                                class="icon-menu h3 text-white"></span></a></span>

                    <nav class="site-navigation text-right ml-auto d-none d-lg-none" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav ml-auto">
                            <li class="active">
                                <a href="{{ route('index') }}" class="nav-link">Home</a>
                            </li>
                            <li><a href="{{ route('welcome.programs') }}" class="nav-link">Program</a></li>
                            <li><a href="{{ route('welcome.blog.index') }}" class="nav-link">Blog</a></li>
                            <li><a href="{{ route('about-us') }}" class="nav-link">About Us</a></li>
                            {{-- <li><a href="contact.html" class="nav-link">Contact</a></li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="">
        <div class="">
            @yield('welcomebody')

        </div>
    </div>
    <div class="footerUperLine"></div>
    <div class="text-center footerBottumLine">Copyright © 2023 - National Institute of Education Designed and
        Implemented by Yuwan Audio
        Visuals Developed By Real IT PVT LTD</div>

    <script src="userInterface/js/jquery-3.3.1.min.js"></script>
    <script src="userInterface/js/popper.min.js"></script>
    <script src="userInterface/js/bootstrap.min.js"></script>
    <script src="userInterface/js/jquery.sticky.js"></script>
    <script src="userInterface/js/main.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('admin/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('admin/js/plugins/swiper/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/player/jplayer.playlist.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/player/jquery.jplayer.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/player/audio-player.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/player/volume.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/nice_select/jquery.nice-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/scroll/jquery.mCustomScrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.5/sweetalert2.all.min.js"
        integrity="sha512-2JsZvEefv9GpLmJNnSW3w/hYlXEdvCCfDc+Rv7ExMFHV9JNlJ2jaM+uVVlCI1MAQMkUG8K83LhsHYx1Fr2+MuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
