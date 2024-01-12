@extends('app.admin.layout.app_left')
@section('title')
    AlphaU - Programs
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Programs</h5>
    </div>
    <div class="dashboard-body">
        <div>
            <div class="d-flex flex-row-reverse mb-2">
                <div class="p-2">
                    <img class="icn_imgs" data-bs-toggle="modal" data-bs-target="#model_program" id="new_school_modal"
                        src="{{ asset('imgs/icons/plus-lg.svg') }}" alt="">
                </div>
            </div>
            <!--School Modal Modal -->
            <div class="modal fade" id="model_program" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mdl_title mb-2">
                                Add New Program
                            </div>
                            <form>
                                <div class="mb-3">
                                    <label for="program_thumbanail" class="form-label frm_lbl">Program Thumbanail</label>
                                    <input type="file" class="form-control" id="program_thumbanail"
                                        name="program_thumbanail" accept=".png, .jpg, .jpeg" class="mb-2">
                                    <div id="thumbanail_preview"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="program_name" class="form-label frm_lbl">Program Name</label>
                                    <input type="text" class="form-control" id="program_name">
                                </div>
                                <div class="mb-3">
                                    <label for="program_genre" class="form-label frm_lbl">Genre</label>
                                    <select class="form-select" id="program_genre">
                                        @forelse ($genre_list as $item)
                                            <option value="{{ $item->genre }}">{{ $item->genre }}
                                            </option>
                                        @empty
                                            <option value="empty" disabled selected>--no genre found--</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="program_directory" class="form-label frm_lbl">Directory</label>
                                    <input type="text" class="form-control" id="program_directory">
                                </div>
                                <div id="loadingSpinner" class="text-center" style="display: none;">
                                    <div class="spinner-border text-success" role="status">
                                    </div>
                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <Button class="btn btn-primary" type="button" data-bs-dismiss="modal"
                                            id="btn_cncl">Cancel</Button>
                                    </div>
                                    <div class="p-2">
                                        <Button class="btn btn-primary" type="submit" id="btn_sbmt_prgrm">OK</Button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2">
            <table id="tbl_programs" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Program Name</th>
                        <th>Genre</th>
                        <th>Directory</th>
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
                $('#tbl_programs').DataTable({
                    dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

                    processing: true,
                    serverSide: false,
                    ajax: {
                        url: "{{ route('admin.archive.list') }}",
                        dataSrc: 'programs_list'
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'program_name'
                        },
                        {
                            data: 'program_genre'
                        },
                        {
                            data: 'program_directory'
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
            $('#tbl_programs').on('click', '.delete-btn', function() {
                var del_program_id = $(this).data('id');
                var delData = new FormData();
                delData.append('id', del_program_id);
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
                            url: '{{ route('admin.archive.delete') }}',
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
            function previewImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbanail_preview').html('<img src="' + e.target.result +
                            '" class="preview-img" width="200px"/>');
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#program_thumbanail').change(function() {
                previewImage(this);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#btn_sbmt_prgrm').click(function(e) {
                e.preventDefault();

                $('#loadingSpinner').show();
                $('#btn_sbmt_prgrm').prop('disabled', true);
                $('#btn_cncl').prop('disabled', true);

                var program_thumbanail = $('input[name="program_thumbanail"]').prop('files')[0];

                var formData = new FormData();
                formData.append('program_name', $('#program_name').val());
                formData.append('program_genre', $('#program_genre').val());
                formData.append('program_directory', $('#program_directory').val());
                formData.append('program_thumbanail', program_thumbanail);

                var nameRegex = /^[a-zA-Z0-9]+$/;

                function showError(message) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_prgrm').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: message,
                        showConfirmButton: true
                    });
                }

                if (!program_thumbanail) {
                    showError('Program name is required.');
                } else if (!$('#program_name').val()) {
                    showError('Program name is required.');
                } else if (!$('#program_directory').val()) {
                    showError('Program name is required.');
                } else if (!$('#program_name').val().match(nameRegex)) {
                    showError(
                        'Program name can only contain alphabetical characters and numbers without spaces.'
                    );
                } else if (!$('#program_directory').val().match(nameRegex)) {
                    showError(
                        'Directory can only contain alphabetical characters and numbers without spaces.'
                    );
                } else if (!$('#program_name').val()) {
                    showError('Program name is required.');
                } else if (!$('#program_genre').val()) {
                    showError('Please add a genre first.');
                } else if (!$('#program_directory').val()) {
                    showError('Directory is required.');
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.archive.store') }}',
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
                                    text: "Program Submitted.",
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
