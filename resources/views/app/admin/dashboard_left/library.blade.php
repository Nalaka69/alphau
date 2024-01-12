@extends('app.admin.layout.app_left')
@section('title')
    AlphaU - Library
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Library</h5>
    </div>
    <div class="dashboard-body">
        <div>
            <div class="d-flex flex-row-reverse mb-2">
                <div class="p-2">
                    <img class="icn_imgs" data-bs-toggle="modal" data-bs-target="#model_program" id="new_library_item_modal"
                        src="{{ asset('imgs/icons/plus-lg.svg') }}" alt="">
                </div>
            </div>
            <!--School Modal Modal -->
            {{-- <div class="modal fade" id="model_program" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mdl_title mb-2">
                                Upload Files
                            </div>
                            <form>
                                <div class="mb-3">
                                    <label for="program_name" class="form-label frm_lbl">Program</label>
                                    <select class="form-select" id="program_name">
                                        @forelse ($created_archive as $item)
                                            <option value="{{ $item->program_name }}">{{ $item->program_name }}
                                            </option>
                                        @empty
                                            <option value="empty" disabled selected>--no program found--</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="episode" class="form-label frm_lbl">Name</label>
                                    <input type="text" class="form-control" id="episode">
                                </div>

                                <div class="mb-3">
                                    <label for="episode_date" class="form-label frm_lbl">Date</label>
                                    <input type="date" class="form-control" id="episode_date">
                                </div>

                                <div class="mb-3">
                                    <label for="episode_time" class="form-label frm_lbl">Time</label>
                                    <input type="time" class="form-control" id="episode_time">
                                </div>

                                <div class="mb-3">
                                    <label for="program_file" class="form-label frm_lbl">File</label>
                                    <input type="file" class="form-control" id="program_file" name="program_file"
                                        accept=".mp3">
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
                                        <Button class="btn btn-primary" type="submit" id="btn_sbmt_library">OK</Button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}





            <div class="modal fade" id="model_program" data-bs-keyboard="false" tabindex="-1" style="">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <ul class="nav nav-tabs" id="myTabs">
                                    <div class="nav-item col-md-6">
                                        <a class="nav-link active" id="programTab" data-bs-toggle="tab"
                                            href="#programForm">Program</a>
                                    </div>
                                    <div class="nav-item col-md-6">
                                        <a class="nav-link" id="AssetsTab" data-bs-toggle="tab" href="#AssetsForm">Add
                                            category</a>
                                    </div>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <!-- Program Form -->
                                <div class="tab-pane fade show active" id="programForm">
                                    <div class="mdl_title mb-2">
                                        <div class="text-center mdl_title mb-2">
                                            Upload Files
                                        </div>
                                        <form>
                                            <div class="mb-3">
                                                <label for="program_name" class="form-label frm_lbl">Program</label>
                                                <select class="form-select" id="program_name">
                                                    @forelse ($created_archive as $program_name)
                                                        <option value="{{ $program_name }}">{{ $program_name }}</option>
                                                    @empty
                                                        <option value="empty" disabled selected>--no program found--
                                                        </option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="episode" class="form-label frm_lbl">Name</label>
                                                <input type="text" class="form-control" id="episode">
                                            </div>

                                            <div class="mb-3">
                                                <label for="program_name" class="form-label frm_lbl">Program</label>
                                                <select class="form-select" id="category">
                                                    @forelse ($asset_categories as $asset_category)
                                                        <option value="{{ $asset_category }}">{{ $asset_category }}</option>
                                                    @empty
                                                        <option value="empty" disabled selected>--no program found--
                                                        </option>
                                                    @endforelse
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="episode_date" class="form-label frm_lbl">Date</label>
                                                <input type="date" class="form-control" id="episode_date">
                                            </div>

                                            <div class="mb-3">
                                                <label for="episode_time" class="form-label frm_lbl">Time</label>
                                                <input type="time" class="form-control" id="episode_time">
                                            </div>

                                            <div class="mb-3">
                                                <label for="program_file" class="form-label frm_lbl">File</label>
                                                <input type="file" class="form-control" id="program_file"
                                                    name="program_file" accept=".mp3">
                                            </div>
                                            <div id="loadingSpinner" class="text-center" style="display: none;">
                                                <div class="spinner-border text-success" role="status">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row-reverse">
                                                <div class="p-2">
                                                    <Button class="btn btn-primary btn_cncl" type="button"
                                                        data-bs-dismiss="modal" id="btn_cncl">Cancel</Button>
                                                </div>
                                                <div class="p-2">
                                                    <Button class="btn btn-primary" type="submit"
                                                        id="btn_sbmt_library">OK</Button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <form>
                                        <!-- Your program form fields here -->
                                    </form>
                                </div>

                                <!-- Status Form -->
                                <div class="tab-pane fade" id="AssetsForm">
                                    <div class="text-center mdl_title mb-2">
                                        Add New category
                                    </div>
                                    <form>
                                        <div class="mb-3">
                                            <label for="newCategory" class="form-label frm_lbl">Name</label>
                                            <input type="text" class="form-control" id="newCategory">
                                        </div>
                                        <div class="d-flex flex-row-reverse">
                                            <div class="p-2">
                                                <Button class="btn btn-primary btn_cncl" type="button"
                                                    data-bs-dismiss="modal" id="btn_cncl">Cancel</Button>
                                            </div>
                                            <div class="p-2">
                                                <Button class="btn btn-primary" type="submit"
                                                    id="btn_sbmt_category">OK</Button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Loading Spinner -->
                            <div id="loadingSpinner" class="text-center" style="display: none;">
                                <div class="spinner-border text-success" role="status"></div>
                            </div>

                            <!-- Buttons -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2">
            <table id="tbl_library_archive" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Media Name</th>
                        <th>Date</th>
                        <th>Time</th>
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



                $('#tbl_library_archive').DataTable({
                    dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

                    processing: true,
                    serverSide: false,
                    ajax: {
                        url: "{{ route('admin.library.list') }}",
                        dataSrc: 'programs_list'
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'program_file'
                        },
                        {
                            data: 'episode_date'
                        },
                        {
                            data: 'episode_time',
                            render: function(data, type, row) {
                                const time = new Date('2000-01-01 ' + data);
                                return time.toLocaleString('en-US', {
                                    hour: 'numeric',
                                    minute: 'numeric',
                                    hour12: true
                                });
                            }
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
            $('#tbl_library_archive').on('click', '.delete-btn', function() {
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
                            url: '{{ route('admin.library.delete') }}',
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

            $('#model_program').on('shown.bs.modal', function() {
                $(this).css('overflow-y', 'hidden');
            });


            $('#btn_sbmt_library').click(function(e) {
                e.preventDefault();
                $('#loadingSpinner').show();
                $('#btn_sbmt_library').prop('disabled', true);
                $('.btn_cncl').prop('disabled', true);

                var program_file = $('input[name="program_file"]').prop('files')[0];

                var formData = new FormData();
                formData.append('program_name', $('#program_name').val());
                formData.append('episode', $('#episode').val());
                formData.append('episode_date', $('#episode_date').val());
                formData.append('episode_time', $('#episode_time').val());
                formData.append('category', $('#category').val());
                formData.append('program_file', program_file);

                var nameRegex = /^[a-zA-Z0-9]+$/;

                if (!$('#program_name').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_library').prop('disabled', false);
                    $('.btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Please add a program first.',
                        showConfirmButton: true
                    });
                } else if (!$('#program_name').val() == 'empty') {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_library').prop('disabled', false);
                    $('.btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Please add a program first.',
                        showConfirmButton: true
                    });
                } else if (!$('#episode').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_library').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Episode is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#episode').val().match(nameRegex)) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_library').prop('disabled', false);
                    $('.btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Name can only contain alphabetical characters and numbers without spaces.',
                        showConfirmButton: true
                    });
                } else if (!$('#episode_date').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_library').prop('disabled', false);
                    $('.btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Date is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#episode_time').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_library').prop('disabled', false);
                    $('.btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Time is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#program_file').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_library').prop('disabled', false);
                    $('.btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'At least 1 file must be selected.',
                        showConfirmButton: true
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.library.store') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data, status, xhr) {
                            var statusCode = xhr.status;
                            if (statusCode === 200) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: "Success",
                                    text: "Program Submitted.",
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    location.reload();
                                });
                            } else if (statusCode === 422) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Input Valid Data',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            } else {
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

            $('#btn_sbmt_category').click(function(e) {
                e.preventDefault();
                var newCategory = $('#newCategory').val();

                var isValid = true;
                var errorMessage = '';

                // Perform individual validation checks for each input field
                if (newCategory.trim() === '') {
                    errorMessage += 'Category Name is required.<br>';
                    isValid = false;
                }

                if (!isValid) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: errorMessage,
                        showCloseButton: true,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: 'OK',
                    });
                    return;
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.library.Category.store') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            newCategory: newCategory
                        },
                        success: function(data, status, xhr) {
                            var statusCode = xhr.status;
                            if (statusCode === 200) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: "Success",
                                    text: "Program Submitted.",
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    // Reload the page and display the alert after a short delay
                                    location.reload();
                                    setTimeout(function() {
                                        alert("hello");
                                    }, 900); // Adjust the delay as needed
                                });
                            } else if (statusCode === 422) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Input Valid Data',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            } else {
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

                //

            });
        });
    </script>
@endsection
