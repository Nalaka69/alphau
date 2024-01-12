@extends('app.admin.layout.app_left')
@section('title')
    AlphaU - Genres
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Genre</h5>
    </div>
    <div class="dashboard-body">
        <div>
            <div class="d-flex flex-row-reverse mb-2">
                <div class="p-2">
                    <img class="icn_imgs" data-bs-toggle="modal" data-bs-target="#model_genre" id="new_school_modal"
                        src="{{ asset('imgs/icons/plus-lg.svg') }}" alt="">
                </div>
            </div>
            <!--School Modal Modal -->
            <div class="modal fade" id="model_genre" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mdl_title mb-2">
                                Add New Genre
                            </div>
                            <form>
                                <div class="mb-3">
                                    <label for="genre" class="form-label frm_lbl">Genre</label>
                                    <input type="text" class="form-control" id="genre">
                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <Button class="btn btn-primary" type="button" data-bs-dismiss="modal"
                                            id="btn_cncl">Cancel</Button>
                                    </div>
                                    <div class="p-2">
                                        <Button class="btn btn-primary" type="submit" id="btn_sbmt_genre">OK</Button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2">
            <table id="tbl_genres" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Genre</th>
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function showTable() {
            $(document).ready(function() {
                $('#tbl_genres').DataTable({
                    dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

                    processing: true,
                    serverSide: false,
                    ajax: {
                        url: "{{ route('admin.genre.list') }}",
                        dataSrc: 'genres_list'
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'genre'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return '<i class="bi bi-trash text-danger btn delete-btn" data-id="' +
                                    row.id + '"></i>';
                            }
                        }
                    ]
                });
            });
            // Handling delete button click------
            $('#tbl_genres').on('click', '.delete-btn', function() {
                var del_genre_id = $(this).data('id');
                var delData = new FormData();
                delData.append('id', del_genre_id);
                Swal.fire({
                    position: 'center',
                    icon: 'question',
                    title: "Warning",
                    text: "Are you sure you want to delete ?",
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.genre.delete') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: delData,
                            contentType: false,
                            processData: false,
                            success: function(data, status, xhr) {
                                var statusCode = xhr.status;
                                if (statusCode === 200) {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: "Success",
                                        text: "Deletion Completed.",
                                        showConfirmButton: true,
                                        // timer: 1500
                                    }).then((result) => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: "Error",
                                        text: "Deletion Failed",
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                }
                            },
                        });
                    }
                });
            });
        }
        showTable()
    </script>
    <script>
        $(document).ready(function() {
            $('#btn_sbmt_genre').click(function(e) {
                e.preventDefault();

                $('#loadingSpinner').show();
                $('#btn_sbmt_genre').prop('disabled', true);
                $('#btn_cncl').prop('disabled', true);

                var formData = new FormData();
                formData.append('genre', $('#genre').val());

                function showError(message) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_genre').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: message,
                        showConfirmButton: true
                    });
                }

                if (!$('#genre').val()) {
                    showError('Genre is required.');
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.genre.store') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data, status, xhr) {
                            var statusCode = xhr.status;
                            if (statusCode === 200) {
                                // Do something with success message here
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: "Success",
                                    text: "Genre Submitted.",
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    // Reload the page
                                    location.reload();
                                });
                            } else if (statusCode === 422) {
                                // handle the validation errors
                                // ----------------------------------------------------------------------------------
                                // var errors = data.errors;
                                // loop through the errors and show them
                                // for (var key in errors) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Input Valid Data',
                                    // title: key,
                                    // text: errors[key][0],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                // }
                            } else {
                                // Do something with failure message here
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: "Error",
                                    text: "Program Submission Failed",
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        },
                    });
                }
            });
        });
    </script>
@endsection
