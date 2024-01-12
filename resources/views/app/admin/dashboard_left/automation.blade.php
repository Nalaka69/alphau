@extends('app.admin.layout.app_left')
@section('title')
    AlphaU - Automation & Archive
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Automation and Archive</h5>
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
                                Add New Clip
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
                                    <label for="episode" class="form-label frm_lbl">Episode</label>
                                    <select class="form-select" id="episode">
                                        <option value="0">--no episode found--</option>
                                    </select>
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
            <table id="tbl_automation_files" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Media Name</th>
                        <th>Duration</th>
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('#program_name').change(function() {
            var selectedProgram = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.episode.get') }}',
                data: {
                    program_name: selectedProgram
                },
                success: function(data) {
                    $('#episode').empty();
                    if (data.length === 0) {
                        $('#episode').append('<option value="0">--no episode found--</option>');
                    } else {
                        $.each(data, function(key, value) {
                            $('#episode').append('<option value="' + value.episode + '">' +
                                value.episode + '</option>');
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
    <script>
        function showTable() {
            $(document).ready(function() {
                $('#tbl_automation_files').DataTable({
                    dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

                    processing: true,
                    serverSide: false,
                    ajax: {
                        url: "{{ route('admin.automation.list') }}",
                        dataSrc: 'automation_list'
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'automation_file'
                        },
                        {
                            data: 'duration',
                            render: function(data, type, row) {
                                return Math.round(parseFloat(data)) + ' mins';
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
            $('#tbl_automation_files').on('click', '.delete-btn', function() {
                var del_automation_id = $(this).data('id');
                var delData = new FormData();
                delData.append('id', del_automation_id);
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
                            url: '{{ route('admin.automation.delete') }}',
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

        $(document).ready(function() {
            $('#btn_sbmt_prgrm').click(function(e) {
                e.preventDefault();
                $('#loadingSpinner').show();
                $('#btn_sbmt_prgrm').prop('disabled', true);
                $('#btn_cncl').prop('disabled', true);

                var formData = new FormData();
                formData.append('program_name', $('#program_name').val());
                formData.append('episode', $('#episode').val());

                if (!$('#program_name').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_prgrm').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
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
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Please add a program first.',
                        showConfirmButton: true
                    });
                } else if ($('#episode').val() == '0') {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_prgrm').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Episode is required.',
                        showConfirmButton: true
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.automation.store') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data, status, xhr) {
                            var statusCode = xhr.status;
                            $('#loadingSpinner').hide();
                            $('#btn_sbmt_prgrm').prop('disabled', false);
                            $('#btn_cncl').prop('disabled', false);
                            if (statusCode === 200) {
                                // Do something with success message here
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: "Success",
                                    text: "Files Submitted",
                                    showConfirmButton: true,
                                    // timer: 1500
                                }).then((result) => {
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
                                    text: 'Input Valid Data!',
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
                                    icon: 'success',
                                    title: "Error",
                                    text: "File Submission Failed",
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
