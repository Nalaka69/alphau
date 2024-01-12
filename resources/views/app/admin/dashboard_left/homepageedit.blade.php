@extends('app.admin.layout.app_left')
@section('title')
    AlphaU - Program Archive
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Edit Home Page</h5>
    </div>
    <div class="dashboard-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-10">
                    <div class="mb-5">
                        <label class=" font-weight-medium font_white">Upload images as
                            jpg/png/jpeg</label>
                        <br> <br>
                        <div class="upload__box">
                            <div class="upload__btn-box">
                                <label class="upload__btn">
                                    <p>Upload Profile image</p>
                                    <input type="file" multiple data-max_length="20" name='SliderPic[]'
                                        class="upload__inputfile" />
                                </label>
                            </div>
                            <div class="upload__img-wrap" id="tutorPropicPreview"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2" style="position:relative; top:50px;">
                    <button type="button" class="btn btn-primary" id="uploadImages">Upload
                    </button>
                </div>
                <div class="col-xl-4">
                    <div class="mb-5">
                        <label class=" font-weight-medium font_white">Date<span
                                style="color: rgb(250, 64, 104); font-size:20px;">*</span></label>
                        <div class="input-group mb-3">

                            <input type="date" class="form-control" name="date" id="date">
                        </div>

                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="mb-5">
                        <label class=" font-weight-medium font_white" style="color: aliceblue">Time<span
                                style="color: rgb(250, 64, 104); font-size:20px;">*</span></label>
                        <div class="input-group mb-3">

                            <input type="time" class="form-control" name="time" id="time">
                        </div>

                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="mb-5">
                        <label class="font-weight-medium font_white">Topic<span
                                style="color: rgb(250, 64, 104); font-size:20px;">*</span></label>
                        <div class="input-group mb-3">

                            <input type="text" class="form-control" name="Topic" id="Topic">
                        </div>

                    </div>
                </div>
                <div class="col-xl-1">

                    <div class="col-md-6" style="margin: 0px 10px 10px 0px; padding:20px; position:relative; top:10px;">
                        <button type="button" class="btn btn-primary" id="adToTable">Add
                        </button>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11" style="margin: 0px 10px 10px 40px; padding:20px;">
                    <table id="selected_subject_level" class="table">
                        <tbody>
                            <!-- Data will be appended here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xl-3">

                <div class="col-md-6" style="margin: 0px 10px 10px 0px; padding:20px; position:relative; top:10px;">
                    <button type="button" class="btn btn-primary" id="submitTimeTable">Submit
                    </button>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $(".upload__inputfile").each(function() {
                $(this).on("change", function(e) {
                    imgWrap = $(this).closest(".upload__box").find(".upload__img-wrap");
                    var maxLength = $(this).attr("data-max_length");

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {
                        if (!f.type.match("image.*")) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false;
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result +
                                        ")' data-number='" +
                                        $(".upload__img-close").length +
                                        "' data-file='" +
                                        f.name +
                                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                };
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $("body").on("click", ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
        $(document).ready(function() {
            var adToTable = [];
            var newRowData = '';
            $("#adToTable").click(function() {

                // Get the selected values from the dropdowns
                var date = $("#date").val();
                var time = $("#time").val(); // Assuming you have this field for gold items
                var Topic = $("#Topic").val();

                if (Topic.trim() !== '' && time.trim() !== '' && date.trim() !== '') {
                    newRowData = {
                        date: date,
                        time: time,
                        Topic: Topic,
                    };

                    adToTable.push(newRowData);

                    // Create a new row in the table with a "Remove" button
                    if ($("#selected_subject_level tbody tr").length === 0) {
                        $("#selected_subject_level tbody").append(
                            "<tr style='background-color: #1F305E; color: white;'><th >Date</th><th>Time</th><th>Topic</th><th>Action</th></tr>"
                        );
                    }
                    var newRow = "<tr><td class='table_font_color'>" + date +
                        "</td><td class='table_font_color'>" +
                        time +
                        "</td><td class='table_font_color'>" + Topic + "</td>";

                    // Append image previews

                    newRow +=
                        "</td><td><button class='btn btn-danger btn-remove-row'><i class='mdi mdi-delete'></i></button></td></tr>";

                    $("#selected_subject_level tbody").append(newRow);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please add the missing data.',
                        showCloseButton: true,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: 'OK',
                    });
                }


                $("#date").val("");
                $("#time").val("");
                $("#Topic").val("");

            });
            $(document).on("click", ".btn-remove-row", function() {
                var rowIndex = $(this).closest("tr").index();
                adToTable.splice(rowIndex - 1,
                    1); // Adjust the index and remove the corresponding data from the array
                $(this).closest("tr").remove();
            });


            $(document).on('click', '#uploadImages', function(e) {
                e.preventDefault();
                var formData = new FormData();
                var SliderPic = $('input[name="SliderPic[]"]').prop('files');

                $.each(SliderPic, function(i, file) {
                    formData.append('SliderPic[]', file);
                });

                // Check if FormData is empty
                if (!formData.has('SliderPic[]')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Form data is empty.',
                        showCloseButton: true,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: 'OK',
                    });
                } else {
                    $.ajax({
                        url: "{{ route('admin.sliderImage.store') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            Swal.fire(
                                'Success!',
                                data.message,
                                'success'
                            );
                            // Uncomment the next line if you want to reload the page
                            // location.reload();
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            if (xhr.status === 422) {
                                var errors = xhr.responseJSON.errors;
                                var errorMessage = '';

                                // Loop through the validation errors and construct an error message
                                for (var field in errors) {
                                    errorMessage += errors[field][0] + '<br>';
                                }

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Validation Error',
                                    html: errorMessage,
                                    showCloseButton: true,
                                    showCancelButton: false,
                                    focusConfirm: false,
                                    confirmButtonText: 'OK',
                                });
                            } else {
                                // Provide a more informative error message
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Submission Error',
                                    text: 'Form submission failed. Please try again.',
                                    showCloseButton: true,
                                    showCancelButton: false,
                                    focusConfirm: false,
                                    confirmButtonText: 'OK',
                                });
                            }
                        }
                    });
                }
            });




            $(document).on('click', '#submitTimeTable', function(e) {
                e.preventDefault();
                var formData = new FormData();
                $.each(adToTable, function(i, newRowData) {
                    formData.append('SubjectData[' + i + '][date]', newRowData.date);
                    formData.append('SubjectData[' + i + '][time]', newRowData.time);
                    formData.append('SubjectData[' + i + '][Topic]', newRowData.Topic);
                });

                // Check if FormData is empty
                if (!formData.has('SubjectData[0][date]')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Form data is empty.',
                        showCloseButton: true,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: 'OK',
                    });
                } else {
                    $.ajax({
                        url: "{{ route('admin.timeTable.store') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            Swal.fire(
                                'Success!',
                                data.message,
                                'success'
                            );
                            // Uncomment the next line if you want to reload the page
                            // location.reload();
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            if (xhr.status === 422) {
                                var errors = xhr.responseJSON.errors;
                                var errorMessage = '';

                                // Loop through the validation errors and construct an error message
                                for (var field in errors) {
                                    errorMessage += errors[field][0] + '<br>';
                                }

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Validation Error',
                                    html: errorMessage,
                                    showCloseButton: true,
                                    showCancelButton: false,
                                    focusConfirm: false,
                                    confirmButtonText: 'OK',
                                });
                            } else {
                                // Provide a more informative error message
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Submission Error',
                                    text: 'Form submission failed. Please try again.',
                                    showCloseButton: true,
                                    showCancelButton: false,
                                    focusConfirm: false,
                                    confirmButtonText: 'OK',
                                });
                            }
                        }
                    });
                }
            });


        });
    </script>
@endsection
