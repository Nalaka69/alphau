@extends('app.welcome.layout.app')
@section('title')
    AlphaU - NIE Radio Programs
@endsection
@section('welcomebody')
    <style>
        /* filter according to archive */
        .crd_archive {
            height: 40px;
            background-color: #583E81;
            color: #f3f3f3;
            margin: 2px;
            padding: 2;
            text-align: center;
        }
        .crd_archive :hover {
            background-color: #3BC8E7;
            color: #000;
        }

        .albmart {
            height: 50px;
            width: 50px;
            border-radius: 10px;
        }

        .albmart_lg {
            height: 130px;
            width: 150px;
            border-radius: 10px;
        }

        .li_play_btn {
            cursor: pointer;
            color: #f3f3f3;
            font-size: 28px;
        }

        .li_play_btn:hover {
            color: #583E81;
        }

        .single_play_btn i {
            color: #fff;
        }

        .playback_song-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            text-align: center;
        }

        .list-group-item {
            width: 100%;
        }

        .li_bg {
            background-color: #14182A;
        }

        .li_text {
            color: #fff;
        }

        /* calendar */
        /* .program_calender {
                                                                                                                    height: 600px;
                                                                                                                    overflow: hidden;
                                                                                                                } */
        #calendar {
            color: #fff;
            background-color: #583e81;
            padding: 15px;
            border-radius: 20px;
            border: none;
        }

        #calendar table {
            border: 2px solid #583e81;
            border-radius: 20px;
        }

        #calendar a {
            color: #fff;
            text-decoration: none;
        }

        .fc-dayGridMonth-view {
            background-color: #4a3270;

        }

        /* audio element */
        /* Default styles for the audio element */
        audio {
            width: 600px;
            height: 50px;
            border: none;
            border-radius: 50px;
            padding: 10px;
            background-color: #4a3270;
            color: #fff;
        }

        /* Media query for large screens (lg) */
        @media (min-width: 1200px) {
            audio {
                width: 800px;
                /* Adjust width for large screens */
            }
        }

        /* Media query for medium-sized screens (md) */
        @media (max-width: 1199px) and (min-width: 768px) {
            audio {
                width: 500px;
                /* Adjust width for medium screens */
            }
        }

        /* Media query for small screens (sm) */
        @media (max-width: 767px) {
            audio {
                width: 300px;
                /* Adjust width for small screens */
            }
        }


        audio::-webkit-slider-thumb {
            background-color: #000;
            border: 1px solid #fff;
            cursor: pointer;
        }

        audio::-webkit-media-controls-play-button,
        audio::-webkit-media-controls-pause-button {
            /* background-color: #000; */
            border: none;
            cursor: pointer;
            color: #000;
        }

        audio::-webkit-media-controls {
            color: #fff;
        }

        /* audio:hover::-webkit-media-controls {
                                                                                                display: block;
                                                                                            } */
    </style>
    <div class="programs-body">
        <div class="container">
            <div class="row">
                <div class="playback_song-container">
                    <div class="playback_song">
                        <img src={{ asset('imgs/albumart.jpg') }} class="albmart_lg mt-5 mb-2">
                        <div class=" align-items-center">
                            <h3 id="songname" class="li_text"></h3>
                            <audio controls autoplay=false volume="0.5">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12   mt-2">
                <div class="ms_heading">
                    <h1>Sync Tracks with Calendar</h1>
                </div>
            </div>
            <div class="row mt-4 pb-5">
                <div class="col-md-5 col-lg-5 col-sm-12">
                    <div class="program_calender">
                        <div id="calendar"></div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12">
                    <div class=" ms_free_music programs-list">
                    </div>
                </div>
            </div>
            {{-- filter according to program name --}}
            <div class="col-lg-12   mt-2">
                <div class="ms_heading">
                    <h1>Sync Tracks with Programs</h1>
                </div>
            </div>
            <div class="row mt-4 pb-5">
                <div class="col-md-5 col-lg-5 col-sm-12">
                    <div class="program_filter">
                        <div class="list-group" id="archives_list">
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12">
                    <div class=" ms_free_music programs-list-filter">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
    <script>
        $(document).ready(function() {
            var calendarEl = $('#calendar')[0];
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                select: function(info) {
                    var selectedDate = info.startStr;
                    fetchProgramsForDate(selectedDate);
                }
            });
            calendar.render();
            fetchProgramsForDate(getFormattedDate(new Date()));

            function fetchProgramsForDate(selectedDate) {
                $.ajax({
                    url: '{{ route('welcome.programs.list') }}',
                    method: 'GET',
                    data: {
                        selectedDate: selectedDate
                    },
                    success: displayPrograms,
                    error: function(error) {
                        console.error('Error fetching programs:', error);
                    }
                });
            }

            function displayPrograms(response) {
                var programsList = $('.programs-list').empty();
                if (response.programs.length > 0) {
                    response.programs.forEach(function(program) {
                        var colDiv = $('<div>', {
                            class: 'col-lg-12 col-md-12 col-sm-12'
                        });
                        var msWeeklyBox = $('<div>', {
                            class: 'ms_weekly_box'
                        });
                        var weeklyLeft = $('<div>', {
                            class: 'weekly_left'
                        });
                        var wTopSong = $('<div>', {
                            class: 'w_top_song'
                        });
                        var wTpSongImg = $('<div>', {
                            class: 'w_tp_song_img'
                        }).append(
                            $('<img>', {
                                src: program.program_thumbanail,
                                alt: ''
                            }),
                            $('<div>', {
                                class: 'ms_song_overlay'
                            })
                        );
                        var wTpSongName = $('<div>', {
                            class: 'w_tp_song_name'
                        }).append(
                            $('<h3>').append(
                                $('<a>', {
                                    href: '#',
                                    text: program.program_name + '-e' + program.episode
                                })
                            ),
                            $('<p>', {
                                text: program.program_genre
                            })
                        );
                        var weeklyRight = $('<div>', {
                            class: 'weekly_right'
                        }).append(
                            $('<span>', {
                                class: 'w_song_time',
                                text: program.duration + ' mins'
                            }),
                            $('<span>', {
                                class: 'w_song_dwnload'
                            }).append(
                                $('<i>', {
                                    class: 'bi bi-play-circle-fill btn btn-sm single_play_btn li_play_btn',
                                    'data-audio-src': program.program_file
                                })
                            )
                        );
                        var msDivider = $('<div>', {
                            class: 'ms_divider'
                        });
                        // Appending elements to construct the desired structure
                        colDiv.append(
                            msWeeklyBox.append(
                                weeklyLeft.append(
                                    wTopSong.append(
                                        wTpSongImg,
                                        wTpSongName
                                    )
                                ),
                                weeklyRight
                            ),
                            msDivider
                        );
                        programsList.append(colDiv);
                    });
                } else {
                    var noProgramsMessage = $('<div>', {
                        class: 'ms-2 me-auto text-muted',
                        html: '<i class="bi bi-exclamation-circle-fill me-1"></i>No programs available for this date.'
                    });
                    var listItem = $('<li>', {
                        class: 'list-group-item border-2'
                    }).append(
                        $('<div>', {
                            class: 'd-flex align-items-center'
                        }).append(
                            noProgramsMessage
                        )
                    );
                    programsList.append(listItem);
                }
            }

            function getFormattedDate(date) {
                return date.toISOString().split('T')[0];
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '{{ route('welcome.archives.list') }}',
                method: 'GET',
                success: function(data) {
                    displayArchives(data.programArchivesList);
                },
                error: function(error) {
                    console.error('Error fetching programs:', error);
                }
            });

            function displayArchives(archives) {
                var archivesListDiv = $('#archives_list');

                archives.forEach(function(archive) {
                    var archiveElement = $('<button class="list-group-item list-group-item-action crd_archive" onclick="clickedArchive(\'' +
                        archive.program_name + '\')">' + archive.program_name + '</button>');
                    archivesListDiv.append(archiveElement);
                });
            }
        });
        // ---
        function getSelectedArchive(selectedArchive) {
            $.ajax({
                url: '{{ route('welcome.archive.programs.list') }}',
                method: 'GET',
                data: {
                    selectedArchive: selectedArchive
                },
                success: displayArchivePrograms,
                error: function(error) {
                    console.error('Error fetching programs:', error);
                }
            });
        }

        function displayArchivePrograms(response) {
            var archiveProgramsList = $('.programs-list-filter').empty();
            if (response.archive_programs.length > 0) {
                response.archive_programs.forEach(function(program) {
                    var colDiv = $('<div>', {
                            class: 'col-lg-12 col-md-12 col-sm-12'
                        });
                        var msWeeklyBox = $('<div>', {
                            class: 'ms_weekly_box'
                        });
                        var weeklyLeft = $('<div>', {
                            class: 'weekly_left'
                        });
                        var wTopSong = $('<div>', {
                            class: 'w_top_song'
                        });
                        var wTpSongImg = $('<div>', {
                            class: 'w_tp_song_img'
                        }).append(
                            $('<img>', {
                                src: program.program_thumbanail,
                                alt: ''
                            }),
                            $('<div>', {
                                class: 'ms_song_overlay'
                            })
                        );
                        var wTpSongName = $('<div>', {
                            class: 'w_tp_song_name'
                        }).append(
                            $('<h3>').append(
                                $('<a>', {
                                    href: '#',
                                    text: program.program_name + '-e' + program.episode
                                })
                            ),
                            $('<p>', {
                                text: program.program_genre + ' - ' + program.episode_date
                            })
                        );
                        var weeklyRight = $('<div>', {
                            class: 'weekly_right'
                        }).append(
                            $('<span>', {
                                class: 'w_song_time',
                                text: program.duration + ' mins'
                            }),
                            $('<span>', {
                                class: 'w_song_dwnload'
                            }).append(
                                $('<i>', {
                                    class: 'bi bi-play-circle-fill btn btn-sm single_play_btn li_play_btn',
                                    'data-audio-src': program.program_file
                                })
                            )
                        );
                        var msDivider = $('<div>', {
                            class: 'ms_divider'
                        });
                        // Appending elements to construct the desired structure
                        colDiv.append(
                            msWeeklyBox.append(
                                weeklyLeft.append(
                                    wTopSong.append(
                                        wTpSongImg,
                                        wTpSongName
                                    )
                                ),
                                weeklyRight
                            ),
                            msDivider
                        );
                        archiveProgramsList.append(colDiv);
                });
            } else {
                archiveProgramsList.append($('<li>', {
                    class: 'list-group-item',
                    html: '<div class="ms-2 me-auto fw-bold">No programs available for this date.</div>'
                }));
            }
        }

        function clickedArchive(programName) {
            getSelectedArchive(programName);
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.programs-body').on('click', '.single_play_btn', function() {
                var audioSource = $(this).data('audio-src');
                var programName = $(this).closest('.list-group-item').find('.fw-bold').text();
                $('.playback_song img').attr('src', '{{ asset('imgs/albumart.jpg') }}');
                $('#songname').text(programName);
                $('.playback_song audio').attr('src', audioSource);
                $('.playback_song audio')[0].play();
            });
        });
    </script>
@endsection
