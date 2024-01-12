@extends('app.welcome.layout.app')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection
@section('welcomebody')
    <style>
        #closeChat {
            color: red;
            border: none;
            background-color: #fff;
            font-size: 150%
        }

        @media (min-width: 990.98px) {
            body {
                height: 250vh;
            }
        }

        @media (max-width: 980.98px) {
            body {
                height: 200vh;
            }


        }
    </style>
    <div class="hero">
        <div class="top-content">
            <div class="row no-gutters">
                <div class="col">
                    <div id="carousel-example" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example" data-slide-to="1"></li>
                            <li data-target="#carousel-example" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" style="height: 550px">
                            <div class="carousel-item active">
                                <img src="userInterface/assets/img/backgrounds/1.jpg" class="d-block " alt="img1" />
                                <!-- <div class="carousel-caption">
                                                                                                                                                                                                                                                                                                                                                                                             </div> -->
                            </div>
                            <div class="carousel-item">
                                <img src="userInterface/assets/img/backgrounds/2.jpg" class="d-block " alt="img2" />
                            </div>
                            <div class="carousel-item">
                                <img src="userInterface/assets/img/backgrounds/3.jpg" class="d-block " alt="img3" />
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center index" style="position: relative; top: -100px">
            <div class="text-center" style="height: 350px; width: 350px">
                <div class="text-center logo" style="height: 350px; width: 350px">
                    <img src="userInterface/assets/img/u43.png" class="d-block w-100 " alt="img2" />
                </div>
            </div>
        </div>
        <div class="container text-center index" style="position: relative; top: -150px">
            <div class="text-center " id="palybutton" style="height: 200px; width: 200px;">
                <div class="text-center palybutton" style="height: 200px; width: 200px">
                    <img src="userInterface/assets/img/u44.svg" class="d-block w-100 " alt="img2" />
                </div>
            </div>
        </div>
        <div class="container text-center index" style="position: relative; top: -250px">
            <div class="text-center" id="pushbutton" style="height: 150px; width: 150px; ">
                <div class="text-center pushbutton" style="height: 150px; width: 150px">
                    <img src="userInterface/assets/img/u45.svg" class="d-block w-100" alt="img2" />
                </div>
            </div>
        </div>
    </div>
    <div class="Lineup"></div>
    <div class="">
        <div class="Lineup2">
            <div class="container text-center" style="position: relative; top:15px;">
                <p class="heading">Today's Lineup</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="container  custom-position">
                            @foreach ($timeTable as $item)
                                @if ($item->time < '12:00:00')
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-s lineUP-List">{{ $item->time }}</div>
                                        <div class="col-s lineUP-List">{{ basename($item->topic) }}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container">
                            @foreach ($timeTable as $item)
                                @if ($item->time > '12:00:00')
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-s lineUP-List">{{ $item->time }}</div>
                                        <div class="col-s lineUP-List">{{ basename($item->topic) }}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Static Message Icon -->
        <div id="chatIcon" style="position: fixed; bottom: 100px; right: 20px; z-index: 9999;">
            <a href="#" id="openChat"
                style="display: inline-block; padding: 10px; background-color: #3BC8E7; color: #fff; border-radius: 50%; text-decoration: none;">
                <i class="bi bi-chat-dots-fill" style="font-size: 50px;"></i>
            </a>
        </div>

        <!-- Chat Box (Initially hidden) -->
        <div id="chatBox" style="display: none; position: fixed; bottom: 100px; right: 20px; z-index: 9999;">
            <div
                style="background-color: #fff; padding: 20px; border: 1px solid #ccc; position: relative;  border-radius:10px;">
                <button id="closeChat" style="position: absolute; top: 5px; right: 5px;">x</button>
                <!-- Check if the user is logged in -->
                @auth
                    <!-- Include your chat content here -->
                    @include('app.chat.chat_student')
                @else
                    <p>Please <a href="{{ route('login') }}">log in</a> to send messages.</p>
                @endauth
            </div>
        </div>


        <!---Recently Played Music--->
        <div class="container program_slider">
            <div class="ms_rcnt_slider" style="height: 300px">
                <div class="ms_heading">
                    <h1>Featured Programmes</h1>
                    <span class="veiw_all"><a href="{{ route('welcome.programs') }}">view more</a></span>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @forelse ($archiveslist as $item)
                            <div class="swiper-slide">
                                <div class="ms_rcnt_box">
                                    <div class="ms_rcnt_box_img">
                                        <img src="{{ asset($item->program_thumbanail) }}" alt=""
                                            style="height: 200px" />
                                        <div class="ms_main_overlay">
                                            <div class="ms_box_overlay"></div>
                                        </div>
                                    </div>
                                    <div class="ms_rcnt_box_text">
                                        <h3><a href="{{ route('welcome.programs') }}">{{ $item->program_name }}</a></h3>
                                        <p>{{ $item->program_genre }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="swiper-slide">
                                <div class="ms_rcnt_box">
                                    <div class="ms_rcnt_box_img">
                                        <img src="{{ asset('admin/images/music/r_music1.jpg') }}" alt="" />
                                        <div class="ms_main_overlay">
                                            <div class="ms_box_overlay"></div>
                                        </div>
                                    </div>
                                    <div class="ms_rcnt_box_text">
                                        <h3><a href="#">No Program found.</a></h3>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next slider_nav_next"></div>
                <div class="swiper-button-prev slider_nav_prev"></div>
            </div>
        </div>
    </div>
    <div class="footerLine"></div>

    @section('audplayer')
        @include('app.welcome.layout.audioplayer')
    @endsection

    <!----Add Section Start---->
    {{-- <div class="ms_advr_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#"><img src="{{ asset('admin/images/adv.jpg') }}" alt=""
                            class="img-fluid" /></a>
                </div>
            </div>
        </div>
    </div> --}}

    <!----Main div close---->
    <script>
        $(document).ready(function() {
            $('#openChat').on('click', function() {
                $('#chatIcon').hide();
                $('#chatBox').show();
            });

            $('#closeChat').on('click', function() {
                $('#chatBox').hide();
                $('#chatIcon').show();
            });
        });
    </script>
@endsection
