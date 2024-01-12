@extends('app.admin.layout.app_right')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Users</h5>
    </div>
    <div class="dashboard-body">
        <div>
            <div class="d-flex flex-row-reverse mb-2">
                <div class="p-2">
                    <img class="icn_imgs" data-bs-toggle="modal" data-bs-target="#model_user" id="new_user_modal"
                        src="{{ asset('imgs/icons/person-plus-fill.svg') }}" alt="">
                </div>
            </div>
            <div class="mb-2">
                <select class="form-select form-select-sm" id="list_view_category">
                    <option value="dv_tbl_stdnts">Students</option>
                    <option value="dv_tbl_schl_admns">School Admins</option>
                    <option value="dv_tbl_gsts">Guests</option>
                    <option value="dv_tbl_tchrs">Teachers</option>
                </select>
            </div>
            <!--User Modal Modal -->
            <div class="modal fade" id="model_user" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mdl_title mb-2">
                                Add New User
                            </div>
                            <form>
                                <div class="mb-3">
                                    <label for="category" class="form-label frm_lbl">Category</label>
                                    <select class="form-select" id="category">
                                        <option value="school">School Admins</option>
                                        <option value="user">Student</option>
                                        <option value="guest">Guest</option>
                                        <option value="teacher">Teacher</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="first_name" class="form-label frm_lbl">First Name</label>
                                    <input type="text" class="form-control" id="first_name">
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label frm_lbl">Last Name</label>
                                    <input type="text" class="form-control" id="last_name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label frm_lbl">Email Address</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="school" class="form-label frm_lbl">School</label>
                                    <select class="form-select" id="school">
                                        @forelse ($schools_list as $item)
                                            <option value="{{ $item->school_name }}">{{ $item->school_name }}
                                            </option>
                                        @empty
                                            <option value="empty" disabled selected>--no program found--</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="student_index" class="form-label frm_lbl">Index No</label>
                                    <input type="text" class="form-control" id="student_index">
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
                                        <Button class="btn btn-primary" type="submit" id="btn_sbmt_user">OK</Button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2" id="dv_tbl_stdnts">
            <table id="tbl_students" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School</th>
                        <th>Index No.</th>
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="mb-2" id="dv_tbl_gsts">
            <table id="tbl_guest_users" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School</th>
                        <th>Index No.</th>
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="mb-2" id="dv_tbl_schl_admns">
            <table id="tbl_school_admins" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School</th>
                        <th>Index No.</th>
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="mb-2" id="dv_tbl_tchrs">
            <table id="tbl_teachers" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School</th>
                        <th>Index No.</th>
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <script>
        function showStudentTable() {
            $(document).ready(function() {
                $('#tbl_students').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('admin.user.list.students') }}",
                        dataSrc: 'students_list'
                    },
                    columns: [{
                            data: 'first_name'
                        },
                        {
                            data: 'school'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return '<i class="bi bi-trash text-danger btn delete-student-btn" data-id="' +
                                    row.id + '"></i>';
                            }
                        }
                    ]
                });
            });
            // Handling delete button click------
            $('#tbl_students').on('click', '.delete-student-btn', function() {
                var del_student_id = $(this).data('id');
                var delStudentData = new FormData();
                delStudentData.append('id', del_student_id);
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
                            url: '{{ route('admin.user.delete.students') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: delStudentData,
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
        showStudentTable()
    </script>
    <script>
        function showGuestTable() {
            $(document).ready(function() {
                $('#tbl_guest_users').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('admin.user.list.guests') }}",
                        dataSrc: 'guests_list'
                    },
                    columns: [{
                            data: 'first_name'
                        },
                        {
                            data: 'school'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return '<i class="bi bi-trash text-danger btn delete-guest-btn" data-id="' +
                                    row.id + '"></i>';
                            }
                        }
                    ]
                });
            });
            // Handling delete button click------
            $('#tbl_guest_users').on('click', '.delete-guest-btn', function() {
                var del_guest_id = $(this).data('id');
                var delGuestData = new FormData();
                delGuestData.append('id', del_guest_id);
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
                            url: '{{ route('admin.user.delete.guests') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: delGuestData,
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
        showGuestTable()
    </script>
    <script>
        function showSchoolAdminTable() {
            $(document).ready(function() {
                $('#tbl_school_admins').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('admin.user.list.schooladmins') }}",
                        dataSrc: 'school_admins_list'
                    },
                    columns: [{
                            data: 'first_name'
                        },
                        {
                            data: 'school'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return '<i class="bi bi-trash text-danger btn delete-school-admin-btn" data-id="' +
                                    row.id + '"></i>';
                            }
                        }
                    ]
                });
            });
            // Handling delete button click------
            $('#tbl_school_admins').on('click', '.delete-school-admin-btn', function() {
                var del_school_admin_id = $(this).data('id');
                var delSchoolAdminData = new FormData();
                delSchoolAdminData.append('id', del_school_admin_id);
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
                            url: '{{ route('admin.user.delete.schooladmins') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: delSchoolAdminData,
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
        showSchoolAdminTable()
    </script>
    <script>
        function showTeacherTable() {
            $(document).ready(function() {
                $('#tbl_teachers').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('admin.user.list.teachers') }}",
                        dataSrc: 'teachers_list'
                    },
                    columns: [{
                            data: 'first_name'
                        },
                        {
                            data: 'school'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return '<i class="bi bi-trash text-danger btn delete-teacher-btn" data-id="' +
                                    row.id + '"></i>';
                            }
                        }
                    ]
                });
            });
            // Handling delete button click------
            $('#tbl_teachers').on('click', '.delete-teacher-btn', function() {
                var del_teacher_id = $(this).data('id');
                var delTeacherData = new FormData();
                delTeacherData.append('id', del_teacher_id);
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
                            url: '{{ route('admin.user.delete.teachers') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: delTeacherData,
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
        showTeacherTable()
    </script>
    <script>
        $('#dv_tbl_gsts').hide();
        $('#dv_tbl_schl_admns').hide();
        $('#dv_tbl_tchrs').hide();
        $('#list_view_category').on('change', function() {
            var selectedOption = $(this).val();
            if (selectedOption === 'dv_tbl_stdnts') {
                $('#dv_tbl_stdnts').show();
                $('#dv_tbl_gsts').hide();
                $('#dv_tbl_schl_admns').hide();
                $('#dv_tbl_tchrs').hide();
            } else if (selectedOption === 'dv_tbl_gsts') {
                $('#dv_tbl_stdnts').hide();
                $('#dv_tbl_gsts').show();
                $('#dv_tbl_schl_admns').hide();
                $('#dv_tbl_tchrs').hide();
            } else if (selectedOption === 'dv_tbl_schl_admns') {
                $('#dv_tbl_stdnts').hide();
                $('#dv_tbl_gsts').hide();
                $('#dv_tbl_schl_admns').show();
                $('#dv_tbl_tchrs').hide();
            } else if (selectedOption === 'dv_tbl_tchrs') {
                $('#dv_tbl_stdnts').hide();
                $('#dv_tbl_gsts').hide();
                $('#dv_tbl_schl_admns').hide();
                $('#dv_tbl_tchrs').show();
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#btn_sbmt_user').click(function(e) {
                e.preventDefault();
                $('#loadingSpinner').show();
                $('#btn_sbmt_user').prop('disabled', true);
                $('#btn_cncl').prop('disabled', true);

                var formData = new FormData();
                formData.append('category', $('#category').val());
                formData.append('first_name', $('#first_name').val());
                formData.append('last_name', $('#last_name').val());
                formData.append('email', $('#email').val());
                formData.append('school', $('#school').val());
                formData.append('student_index', $('#student_index').val());

                if (!$('#category').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_user').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Category is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#first_name').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_user').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'First name is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#last_name').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_user').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Last name is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#email').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_user').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Email is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#school').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_user').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'School is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#student_index').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_user').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Index is required.',
                        showConfirmButton: true
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.user.store') }}',
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
                                    text: "User Submitted",
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
                                    text: "User Submission Failed",
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
