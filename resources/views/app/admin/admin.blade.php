<!DOCTYPE html>
<html>

<head>
    <title>Administrator - AlphaU Radio</title>
    <link href="{{ asset('imgs/favicon.png') }}"rel=icon sizes=16x16 type=image/gif>
    <meta content="{{ csrf_token() }}"name=csrf-token>
    <meta charset=UTF-8>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.5/sweetalert2.min.css"
        integrity="sha512-InYSgxgTnnt8BG3Yy0GcpSnorz5gxHvT6OEoRWj91Gg+RvNdCiAharnBe+XFIDS754Kd9TekdjXw3V7TAgh6Vw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Set background color to grey */
        body {
            background-color: rgb(48, 48, 48);
        }

        /* Set page height and width to device screen height and width */
        body,
        html {
            height: 100%;
            width: 100%;
        }

        /* Center the image vertically and horizontally */
        .centered-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }


        .centered-image img {
            width: 210px;
            height: 200px;
        }

        .centered-image img:hover {
            transition: transform 0.3s ease-in-out;
        }


        .bottom-images {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
        }

        /* Adjust the size and spacing of the small images */
        .bottom-images img {
            height: 70px;
            width: 70px;
            margin: 0 10px;
            padding: 10px
                /* Add some spacing between the images */
        }

        .rdo {
            /* width: 140% */
        }

        .rdo_lbl {
            color: #fff;
            font-size: 18px;
            font-weight: 700;
        }

        .crrnt_stts {
            color: #fff;
            font-size: 24px;
        }

        .crrnt_stts p {
            font-weight: 400;
        }

        .crrnt_stts span {
            font-weight: 600;
            background-color: #fff;
            color: #303030;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="container text-center">
        <div class="crrnt_stts align-items-center">
            <p>
                <span id="on_status" class="align-middle"></span>
            </p>
        </div>
    </div>
    <div class="centered-image">
        <img class="btn" src="{{ asset('imgs/admn/switch.png') }}" alt="alphauradio" width="120" height="100"
            id="change_play_status">
    </div>
    <div class="container">
        <div class="bottom-images d-flex justify-content-between">
            <div class="bottom-left btn">
                <img src="{{ asset('imgs/admn/u6.png') }}" alt="alphauradio" id="btn_left">
            </div>
            <div class="bottom-center btn">
                <img src="{{ asset('imgs/admn/u8.png') }}" alt="alphauradio" id="btn_middle">
            </div>
            <div class="bottom-right btn">
                <img src="{{ asset('imgs/admn/u7.png') }}" alt="alphauradio" id="btn_right">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.5/sweetalert2.all.min.js"
        integrity="sha512-2JsZvEefv9GpLmJNnSW3w/hYlXEdvCCfDc+Rv7ExMFHV9JNlJ2jaM+uVVlCI1MAQMkUG8K83LhsHYx1Fr2+MuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btn_left').click(function() {
                window.location.href = '/admin/automation';
            });
            $('#btn_middle').click(function() {
                window.location.href = '/';
            });
            $('#btn_right').click(function() {
                window.location.href = '/admin/dashboard';
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            function set_status() {
                $.ajax({
                    url: '{{ route('admin.automation.status') }}',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.current_status.current_status == 'AUTOMATION') {
                            document.getElementById('on_status').innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#d60000"
                        class="bi bi-broadcast" viewBox="0 0 16 16">
                        <path d="M3.05 3.05a7 7 0 0 0 0 9.9.5.5 0 0 1-.707.707 8 8 0 0 1 0-11.314.5.5 0 0 1 .707.707m2.122 2.122a4 4 0 0 0 0 5.656.5.5 0 1 1-.708.708 5 5 0 0 1 0-7.072.5.5 0 0 1 .708.708m5.656-.708a.5.5 0 0 1 .708 0 5 5 0 0 1 0 7.072.5.5 0 1 1-.708-.708 4 4 0 0 0 0-5.656.5.5 0 0 1 0-.708m2.122-2.12a.5.5 0 0 1 .707 0 8 8 0 0 1 0 11.313.5.5 0 0 1-.707-.707 7 7 0 0 0 0-9.9.5.5 0 0 1 0-.707zM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0" />
                    </svg> AUTOMATION`;
                        } else if (response.current_status.current_status == 'LIVE') {
                            document.getElementById('on_status').innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#00d600"
                        class="bi bi-broadcast" viewBox="0 0 16 16">
                        <path d="M3.05 3.05a7 7 0 0 0 0 9.9.5.5 0 0 1-.707.707 8 8 0 0 1 0-11.314.5.5 0 0 1 .707.707m2.122 2.122a4 4 0 0 0 0 5.656.5.5 0 1 1-.708.708 5 5 0 0 1 0-7.072.5.5 0 0 1 .708.708m5.656-.708a.5.5 0 0 1 .708 0 5 5 0 0 1 0 7.072.5.5 0 1 1-.708-.708 4 4 0 0 0 0-5.656.5.5 0 0 1 0-.708m2.122-2.12a.5.5 0 0 1 .707 0 8 8 0 0 1 0 11.313.5.5 0 0 1-.707-.707 7 7 0 0 0 0-9.9.5.5 0 0 1 0-.707zM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0" />
                    </svg> LIVE`;
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
            set_status();
            // $('#change_play_status').click(function(e) {
            //     e.preventDefault();
            //     var __status = $('#on_status').html();
            //     var tempElement = $('<div>').html(__status);
            //     var _on_status = tempElement.text().trim();
            //     var status;
            //     if (_on_status == 'LIVE') {
            //         status = 'AUTOMATION';
            //     } else if (_on_status == 'AUTOMATION') {
            //         status = 'LIVE';
            //     }
            //     var formData = new FormData();
            //     console.log(status);
            //     formData.append('status', status);
            //     $.ajax({
            //         type: 'POST',
            //         url: '{{ route('admin.automation.start') }}',
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         data: formData,
            //         contentType: false,
            //         processData: false,
            //         success: function(data, status, xhr) {
            //              set_status();
            //             var statusCode = xhr.status;
            //             if (statusCode === 200) {
            //                 Swal.fire({
            //                     position: 'center',
            //                     icon: 'success',
            //                     // title: "Success",
            //                     text: "Streaming mode changed.",
            //                     showConfirmButton: false,
            //                     timer: 3500
            //                 });
            //             } else if (statusCode === 422) {
            //                 Swal.fire({
            //                     position: 'center',
            //                     icon: 'error',
            //                     title: 'Error',
            //                     text: 'Streaming mode switching failed.',
            //                     showConfirmButton: false,
            //                     timer: 1500
            //                 });
            //             } else {
            //                 Swal.fire({
            //                     position: 'center',
            //                     icon: 'error',
            //                     title: "Error",
            //                     text: "Streaming mode switching failed.",
            //                     showConfirmButton: false,
            //                     timer: 1500
            //                 })
            //             }
            //         },
            //     });
            // });
        });
    </script>
</body>

</html>
