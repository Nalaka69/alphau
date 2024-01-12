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
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/swiper/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/nice_select/nice-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/player/volume.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/scroll/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">
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
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.7/r-2.5.0/sl-1.7.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!----Main Wrapper Start---->
    <div class="ms_main_wrapper">
        <!---Side Menu Start--->
        <div class="ms_sidemenu_wrapper">
            <div class="ms_nav_close">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </div>
            <div class="ms_sidemenu_inner">
                <div class="ms_logo_inner">
                    <div class="ms_logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('admin/images/favicon.png') }}"
                                alt="" class="img-fluid" /></a>
                    </div>
                    <div class="ms_logo_open">
                        <a href="{{ route('index') }}"><img src="{{ asset('admin/images/open_logo.png') }}"
                                alt="" class="img-fluid" /></a>
                    </div>
                </div>
                <div class="ms_nav_wrapper">
                    <ul>
                        <li><a href="{{ route('welcome.programs') }}" title="Albums">
                                <span class="nav_icon">
                                    <span class="icon icon_music"></span>
                                </span>
                                <span class="nav_text">
                                    Programs
                                </span>
                            </a>
                        </li>
                        <li><a href="#" title="Artists">
                                <span class="nav_icon">
                                    <span class="icon icon_albums"></span>
                                </span>
                                <span class="nav_text">
                                    3D Radio
                                </span>
                            </a>
                        </li>
                        <li><a href="{{route('welcome.blog.index')}}" title="Genres">
                                <span class="nav_icon">
                                    <span class="icon icon_genres"></span>
                                </span>
                                <span class="nav_text">
                                    Blog
                                </span>
                            </a>
                        </li>
                        <li><a href="{{ route('about-us') }}">
                                <span class="nav_icon">
                                    <span class="icon icon_tracks"></span>
                                </span>
                                <span class="nav_text">
                                    About
                                </span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav_downloads">
                        <li>
                            <a href="{{ route('school.dashboard') }}">
                                <span class="nav_icon">
                                    <span class="icon icon_favourite"></span>
                                </span>
                                <span class="nav_text"> Students </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!---Main Content Start--->
        <div class="ms_content_wrapper padder_top80">
            <!---Header--->
            <div class="ms_header">
                <div class="ms_top_left">
                    {{-- <div class="ms_top_search">
                        <input type="text" class="form-control" placeholder="Search Music Here..">
                        <span class="search_icon">
                            <img src="{{ asset('admin/images/svg/search.svg') }}" alt="">
                        </span>
                    </div> --}}
                    <div class="ms_top_trend">
                        <span><a href="{{ route('index') }}" class="ms_color">AlphaU Radio</a></span></span>
                    </div>
                </div>
                <div class="ms_top_right">
                    {{-- <div class="ms_top_lang">
                        <span data-toggle="modal" data-target="#lang_modal">languages <img
                                src="{{ asset('admin/images/svg/lang.svg') }}" alt=""></span>
                    </div> --}}
                    <div class="ms_top_btn">
                        @guest
                            @if (Route::has('login'))
                                <a class="ms_btn login_btn" href="{{ route('login') }}"><span>Login</span></a>
                            @endif

                            @if (Route::has('register'))
                                <a class="ms_btn reg_btn" href="{{ route('register') }}"><span>Register</span></a>
                            @endif
                        @else
                            <div class="ms_top_btn">
                                <a href="javascript:;" class="ms_admin_name">{{ Auth::user()->first_name }}'s Dashboard</a>
                                <ul class="pro_dropdown_menu">
                                    <li>
                                        <a href="{{ route('moderator.profile') }}">Profile</a>
                                    </li>
                                    <li>
                                        <a class="" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
            {{-- nav bar ends --}}
            @yield('schoolbody')
            {{-- footer starts --}}
        </div>
        <!----Footer Start---->
        <div class="ms_footer_wrapper">
            <div class="ms_footer_logo">
                <a href="{{ route('index') }}"><img src="{{ asset('admin/images/open_logo.png') }}"
                        alt=""></a>
            </div>
            <div class="ms_footer_inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer_box">
                            <h1 class="footer_title">AlphaU Radio</h1>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure
                                dolor.</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        &nbsp;
                        {{-- <div class="footer_box footer_app">
                            <h1 class="footer_title">Download our App</h1>
                            <p>Go Mobile with our app.<br> Listen to your favourite songs at just one click. Download
                                Now !</p>
                            <a href="#" class="foo_app_btn"><img
                                    src="{{ asset('admin/images/google_play.jpg') }}" alt=""
                                    class="img-fluid"></a>
                            <a href="#" class="foo_app_btn"><img
                                    src="{{ asset('admin/images/app_store.jpg') }}" alt=""
                                    class="img-fluid"></a>
                            <a href="#" class="foo_app_btn"><img src="{{ asset('admin/images/windows.jpg') }}"
                                    alt="" class="img-fluid"></a>
                        </div> --}}
                    </div>
                    <div class="col-lg-3 col-md-6">
                        &nbsp;
                        {{-- <div class="footer_box footer_subscribe">
                            <h1 class="footer_title">subscribe</h1>
                            <p>Subscribe to our newsletter and get latest updates and offers.</p>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                    <a href="#" class="ms_btn">sign me up</a>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer_box footer_contacts">
                            <h1 class="footer_title">contact us</h1>
                            <ul class="foo_con_info">
                                <li>
                                    <div class="foo_con_icon">
                                        <img src="{{ asset('admin/images/svg/phone.svg') }}" alt="">
                                    </div>
                                    <div class="foo_con_data">
                                        <span class="con-title">Call us :</span>
                                        <span>(+94) 11 760 1680</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="foo_con_icon">
                                        <img src="{{ asset('admin/images/svg/message.svg') }}" alt="">
                                    </div>
                                    <div class="foo_con_data">
                                        <span class="con-title">email us :</span>
                                        <span><a href="#">alphau@nie.ac.lk</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="foo_con_icon">
                                        <img src="{{ asset('admin/images/svg/add.svg') }}" alt="">
                                    </div>
                                    <div class="foo_con_data">
                                        <span class="con-title">walk in :</span>
                                        <span>PO.Box 21, High Level Rd., Maharagama</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="foo_sharing">
                                <div class="share_title">follow us :</div>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!----Copyright---->
            <div class="col-lg-12">
                <div class="ms_copyright">
                    <div class="footer_border"></div>
                    <p>
                        Copyright © 2023 - National Institute of Education -
                        <a class="text-reset fw-bold" href="#">
                            Designed and Implemented by Yuwan Audio Visuals
                        </a>
                        <a class="text-reset fw-bold" href="https://realit.lk">
                            - Developed By Real IT PVT LTD
                        </a>
                    </p>
                </div>
            </div>
        </div>
        {{-- audio player starts --}}
        @yield('audplayer')
        {{-- audio player ends --}}
    </div>

    {{-- admin --}}
    <script type="text/javascript" src="{{ asset('admin/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
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
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.7/r-2.5.0/sl-1.7.0/datatables.min.js"></script>
    {{-- admin --}}
</body>


</html>
