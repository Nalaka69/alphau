@extends('app.welcome.layout.app')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection
@section('welcomebody')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Outfit&display=swap");

        /* body------------------------ */
        .bg {
            background-color: #8563B9;
            padding-top: 80px;
            padding-bottom: 50px;
        }

        .welcome {
            font-family: "Luckiest Guy", sans-serif;
            color: #fff;
            font-size: 3.5vw;
        }

        .to {
            font-family: "Luckiest Guy", sans-serif;
            color: #ffd699;
            font-size: 2.5vw;
        }

        .nie-radio {
            font-family: "Luckiest Guy", sans-serif;
            color: #bc0b34;
            font-size: 3.5vw;
            text-transform: capitalize;
        }

        .by {
            font-family: "Luckiest Guy", sans-serif;
            color: #e81748;
            font-size: 2.5vw;
            text-transform: capitalize;
        }

        .btn-readmore {
            color: #835886;
            font-weight: 700;
            font-size: 1vw;
            background-color: #c9b0ea;
            border-radius: 1.5vw;
            border: 1px solid #c9b0ea;
            padding: 0.5vw 2vw;
        }

        .btn-readmore:hover {
            color: #f8faf9;
            background-color: #835886;
            border-radius: 1.5vw;
            border: 1px solid #835886;
            padding: 0.5vw 2vw;
        }

        /* Adjustments for smaller screens */
        @media (max-width: 768px) {

            .welcome,
            .nie-radio,
            .by {
                font-size: 10vw;
            }

            .to {
                font-size: 5vw;
            }

            .btn-readmore {
                font-size: 3vw;
                padding: 1vw 4vw;
            }

            .bg {
                padding-top: 50px;
                padding-bottom: 30px;
            }
        }

        /* radio img player component--------- */
        .rdo_img {
            width: 200px;
        }

        .card {
            position: relative;
        }

        .card-img-overlay {
            position: absolute;
            bottom: 0;
            transform: translateX(-50%);
            transform: translateY(52%);
            width: 100%;
            text-align: center;
            padding: 10px;
        }

        .buttons {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 10px;
        }

        .active {
            color: black;
        }

        .playpause-track {
            padding: 2px;
            opacity: 0.8;
            color: #664728;
            transition: opacity 0.2s;
        }

        .playpause-track:hover {
            opacity: 1;
        }

        .player_container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: max-content;
        }

        .volume_slider {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            height: 10px;
            border-radius: 10px;
            background: #a887d2;
            -webkit-transition: 0.2s;
            transition: opacity 0.2s;
        }

        .volume_slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 15px;
            height: 15px;
            background: white;
            border: 3px solid #634098;
            cursor: grab;
            border-radius: 100%;
        }

        .volume_slider:hover {
            opacity: 1;
        }


        .volume_slider {
            width: 100px;
        }

        .current-time,
        .total-duration {
            padding: 10px;
        }

        i.fa-volume-down,
        i.fa-volume-up {
            padding: 2px;
        }

        i,
        i.fa-play-circle,
        i.fa-pause-circle,
        i.fa-step-forward,
        i.fa-step-backward,
        p {
            cursor: pointer;
        }

        .randomActive {
            color: black;
        }

        .rotate {
            animation: rotation 8s infinite linear;
        }

        @keyframes rotation {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(359deg);
            }
        }

        .loader {
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader .stroke {
            background: #f1f1f1;
            height: 150%;
            width: 4px;
            border-radius: 50px;
            margin: 0 5px;
            animation: animate 1.4s linear infinite;
        }

        @keyframes animate {
            50% {
                height: 20%;
                background: #5c355e;
            }

            100% {
                background: #835886;
                height: 100%;
            }
        }

        .stroke:nth-child(1) {
            animation-delay: 0s;
        }

        .stroke:nth-child(2) {
            animation-delay: 0.3s;
        }

        .stroke:nth-child(3) {
            animation-delay: 0.6s;
        }

        .stroke:nth-child(4) {
            animation-delay: 0.9s;
        }

        .stroke:nth-child(5) {
            animation-delay: 0.6s;
        }

        .stroke:nth-child(6) {
            animation-delay: 0.3s;
        }

        .stroke:nth-child(7) {
            animation-delay: 0s;
        }
    </style>

    <div class="container-fluid bg">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="p-4 text-center">
                    <h1 class="welcome">WELCOME</h1>
                    <h1 class="nie-radio"><span class="to">TO &nbsp;</span> AlphaU </h1>
                    <h1><span class="by">by NIE</span></h1>
                    <a href="/about" class="btn btn-primary btn-readmore mt-3">Read More</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="d-flex justify-content-center">
                    <div class="card"
                        style="--bs-card-bg: none !important; --bs-card-border-color: none !important; --bs-card-border-width: 0 !important; position: relative;">
                        <img src="{{ asset('imgs/radio_long.png') }}" class="rdo_img card-img img-fluid" alt="">
                        <div class="card-img-overlay">
                            <div class="">
                                <div class="details">
                                    <div class="track-art"></div>
                                </div>
                                <div class="sldr_cntnr">
                                    <div class="slider_container">
                                        <input type="range" min="1" max="100" value="0"
                                            class="seek_slider" onchange="seekTo()" hidden>
                                    </div>

                                    <div class="slider_container">
                                        <i class="fa fa-volume-down"></i>
                                        <input type="range" min="1" max="100" value="99"
                                            class="volume_slider" onchange="setVolume()">
                                        <i class="fa fa-volume-up"></i>
                                    </div>
                                    <div class="playpause-track" onclick="playpauseTrack()">
                                        <i class="fa fa-play-circle fa-3x"></i>
                                    </div>
                                </div>
                                <div id="wave" class="">
                                    <span class="stroke"></span>
                                    <span class="stroke"></span>
                                    <span class="stroke"></span>
                                    <span class="stroke"></span>
                                    <span class="stroke"></span>
                                    <span class="stroke"></span>
                                    <span class="stroke"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    // Function to check if the stream URL is available
                    function checkStreamAvailability(url) {
                        fetch(url)
                            .then(response => {
                                if (!response.ok) {
                                    // If the response is not OK (404 or other error), handle it here
                                    handleStreamNotAvailable();
                                }
                            })
                            .catch(error => {
                                // If an error occurs during the fetch, handle it here
                                handleStreamNotAvailable();
                            });
                    }

                    // Function to handle the stream not available scenario
                    function handleStreamNotAvailable() {
                        wave.removeClass('loader'); // Remove 'loader' class from 'wave' id
                        playpause_btn.html('<i class="fa fa-play-circle fa-3x"></i>'); // Change play button icon
                    }

                    // Call the function to check stream availability
                    checkStreamAvailability('http://143.244.134.209:8000/stream');


                    let now_playing = $('.now-playing');
                    let track_art = $('.track-art');
                    let track_name = $('.track-name');
                    let track_artist = $('.track-artist');

                    let playpause_btn = $('.playpause-track');
                    let next_btn = $('.next-track');
                    let prev_btn = $('.prev-track');

                    let seek_slider = $('.seek_slider');
                    let volume_slider = $('.volume_slider');
                    let wave = $('#wave');
                    let randomIcon = $('.fa-random');
                    let curr_track = $('<audio></audio>').get(0);

                    let track_index = 0;
                    let isPlaying = false;
                    let isRandom = false;
                    let updateTimer;

                    const music_list = [{
                        img: 'images/stay.png',
                        name: 'Stay',
                        artist: 'The Kid LAROI, Justin Bieber',
                        music: 'http://143.244.134.209:8000/stream'
                    }];

                    loadTrack(track_index);

                    function loadTrack(track_index) {
                        clearInterval(updateTimer);
                        reset();

                        curr_track.src = music_list[track_index].music;
                        curr_track.load();

                        track_art.css('background-image', 'url(' + music_list[track_index].img + ')');
                        track_name.text(music_list[track_index].name);
                        track_artist.text(music_list[track_index].artist);
                        now_playing.text('Playing music ' + (track_index + 1) + ' of ' + music_list.length);

                        updateTimer = setInterval(setUpdate, 1000);

                        $(curr_track).on('ended', nextTrack);
                        random_bg_color();
                    }

                    function random_bg_color() {
                        let hex = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e'];
                        let a = '';

                        function populate(a) {
                            for (let i = 0; i < 6; i++) {
                                let x = Math.round(Math.random() * 14);
                                let y = hex[x];
                                a += y;
                            }
                            return a;
                        }
                        let Color1 = populate('#');
                        let Color2 = populate('#');
                        var angle = 'to right';

                        let gradient = 'linear-gradient(' + angle + ',' + Color1 + ', ' + Color2 + ')';
                        $('body').css('background', gradient);
                    }

                    function reset() {
                        seek_slider.val(0);
                    }

                    function playpauseTrack() {
                        isPlaying ? pauseTrack() : playTrack();
                    }

                    function playTrack() {
                        curr_track.play();
                        isPlaying = true;
                        track_art.addClass('rotate');
                        wave.addClass('loader');
                        playpause_btn.html('<i class="fa fa-pause-circle fa-3x"></i>');
                        checkStreamAvailability('http://143.244.134.209:8000/stream');
                    }

                    function pauseTrack() {
                        curr_track.pause();
                        isPlaying = false;
                        track_art.removeClass('rotate');
                        wave.removeClass('loader');
                        playpause_btn.html('<i class="fa fa-play-circle fa-3x"></i>');
                    }

                    function seekTo() {
                        let seekto = curr_track.duration * (seek_slider.val() / 100);
                        curr_track.currentTime = seekto;
                    }

                    function setVolume() {
                        curr_track.volume = volume_slider.val() / 100;
                    }

                    function setUpdate() {
                        let seekPosition = 0;
                        if (!isNaN(curr_track.duration)) {
                            seekPosition = curr_track.currentTime * (100 / curr_track.duration);
                            seek_slider.val(seekPosition);

                            let currentMinutes = Math.floor(curr_track.currentTime / 60);
                            let currentSeconds = Math.floor(curr_track.currentTime - currentMinutes * 60);
                            let durationMinutes = Math.floor(curr_track.duration / 60);
                            let durationSeconds = Math.floor(curr_track.duration - durationMinutes * 60);

                            if (currentSeconds < 10) {
                                currentSeconds = '0' + currentSeconds;
                            }
                            if (durationSeconds < 10) {
                                durationSeconds = '0' + durationSeconds;
                            }
                            if (currentMinutes < 10) {
                                currentMinutes = '0' + currentMinutes;
                            }
                            if (durationMinutes < 10) {
                                durationMinutes = '0' + durationMinutes;
                            }
                        }
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
