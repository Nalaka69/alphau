<!DOCTYPE html>
<html lang=en>

<head>
    <title>
        @yield('title')
    </title>
    <link href="{{ asset('imgs/favicon.png') }}"rel=icon sizes=16x16 type=image/gif>
    <meta content="{{ csrf_token() }}"name=csrf-token>
    <meta charset=UTF-8>
    <meta content=en http-equiv=Content-Language>
    <meta content="width=device-width,initial-scale=1"name=viewport>
    <link rel="stylesheet" href="{{ asset('css/admin/dashbaord.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/colors.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.7/r-2.5.0/sl-1.7.0/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.5/sweetalert2.min.css"
        integrity="sha512-InYSgxgTnnt8BG3Yy0GcpSnorz5gxHvT6OEoRWj91Gg+RvNdCiAharnBe+XFIDS754Kd9TekdjXw3V7TAgh6Vw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css"
        integrity="sha512-oAvZuuYVzkcTc2dH5z1ZJup5OmSQ000qlfRvuoTTiyTBjwX1faoyearj8KdMq0LgsBTHMrRuMek7s+CxF8yE+w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">

    <style>
        .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .upload__btn {
            display: inline-block;
            height: 40px;
            font-weight: 600;
            position: relative;
            left: 4%;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #4045ba;
            border-color: #4045ba;
            /* border-radius: 10px; */
            /* line-height: 26px; */
            font-size: 14px;
        }

        .upload__btn:hover {
            background-color: unset;
            color: #4045ba;
            transition: all 0.3s ease;
        }

        .upload__btn-box {
            margin-bottom: 10px;
            position: relative;
            right: 35px;
        }

        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__pdf-box {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__pdf-box {
            position: relative;
            margin: 5px;

            width: 200px;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px,
                rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        .upload__img-box {
            position: relative;
            margin: 5px;

            width: 200px;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px,
                rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        .upload__img-box2 {
            position: relative;
            margin: 5px;

            width: 100px;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px,
                rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        .upload__img-close:after {
            content: "✖";
            font-size: 14px;
            color: white;
        }

        .upload__pdf-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        .upload__pdf-close:after {
            content: "✖";
            font-size: 14px;
            color: white;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }

        .bulgy-radios {
            width: 20rem;
            background: #fff;
            /* padding: 0rem 0 rem 0rem; */
            border-radius: 1rem;
        }

        .dataTables_wrapper .dataTables_filter input {
            background-color: #fff;
            margin-bottom: 5px;
            color: #000;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: #fff;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
            cursor: default;
            color: #fff !important;
            border: 1px solid transparent;
            background: transparent;
            box-shadow: none;
        }

        .font_white {
            color: white;
        }
    </style>
</head>

<body>
    {{-- side bar starts --}}
    <div id="dashboard" class="mt-0 pt-10 pb-10">
        <div class="container mt-2">
            <div class="dashboard-main">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="dashboard-sidebar">
                            <div class="profile-sec">
                                <div class="author-news mb-3">
                                    <div class="author-news-content text-center p-3">
                                        <div class="author-content pt-4 p-0">
                                            <div>
                                                <img src="{{ asset('imgs/admn/profile.svg') }}" alt="student-profile" />
                                            </div>
                                            <h3 class="mb-1 white author_title">
                                                <a href="#" class="white">Admin AlphaU</a>
                                            </h3>
                                            <p class="detail">
                                                Super Admin
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dot-overlay"></div>
                                </div>
                            </div>
                            <div class="dashboard-nav">
                                <div class="dashboard-nav-inner">
                                    <ul>
                                        <li class="sidebar_link ">
                                            <a href="/admin/automation">
                                                <img src="{{ asset('imgs/icons/moon.svg') }}" />&nbsp; Night Time
                                            </a>
                                        </li>
                                        <li class="sidebar_link ">
                                            <a href="/admin/day-archive">
                                                <img src="{{ asset('imgs/icons/calendar3.svg') }}" />&nbsp; Day Archive
                                            </a>
                                        </li>
                                        <li class="sidebar_link ">
                                            <a href="/admin/genres">
                                                <img src="{{ asset('imgs/icons/music-note-list.svg') }}" />&nbsp;
                                                Genres
                                            </a>
                                        </li>
                                        <li class="sidebar_link ">
                                            <a href="/admin/programs">
                                                <img src="{{ asset('imgs/icons/files.svg') }}" />&nbsp;
                                                Programs
                                            </a>
                                        </li>
                                        <li class="sidebar_link ">
                                            <a href="/admin/programs-archive">
                                                <img src="{{ asset('imgs/icons/list-ul.svg') }}" />&nbsp;
                                                Program Archive
                                            </a>
                                        </li>
                                        <li class="sidebar_link ">
                                            <a href="/admin/library">
                                                <img src="{{ asset('imgs/icons/list-ul.svg') }}" />&nbsp;
                                                Library Archive
                                            </a>
                                        </li>
                                        <li class="sidebar_link ">
                                            <a href="#">
                                                <img src="{{ asset('imgs/icons/bar-chart.svg') }}" />&nbsp;
                                                Statistics
                                            </a>
                                        </li>
                                        <li class="sidebar_link ">
                                            <a href="/admin/edit-home">
                                                <img src="{{ asset('imgs/icons/home.svg') }}" />&nbsp;
                                                Edit Home Page
                                            </a>
                                        </li>
                                        <li class="sidebar_link btn">
                                            <a href="/admin/home" class="p-0">
                                                <img src="{{ asset('imgs/icons/gear-1.svg') }}" width="50"
                                                    height="50" />
                                            </a>
                                        </li>
                                        <li class="sidebar_link">
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                <img src="{{ asset('imgs/icons/box-arrow-right.svg') }}" />&nbsp;
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="dashboard-content">
                            <div class="col-lg-12 col-md-12 col-xs-12 ">
                                <div class="dashboard-list-box with-icons bg_green ">
                                    @yield('adminbody')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- side bar ends --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.7/r-2.5.0/sl-1.7.0/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.5/sweetalert2.all.min.js"
        integrity="sha512-2JsZvEefv9GpLmJNnSW3w/hYlXEdvCCfDc+Rv7ExMFHV9JNlJ2jaM+uVVlCI1MAQMkUG8K83LhsHYx1Fr2+MuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>

</body>


</html>
