@extends('app.moderator.layout.app')
@section('title')
    School Admin
@endsection
@section('schoolbody')
    <div class="ms_free_download">
        <div class="ms_heading">
            <h1>New Student</h1>
            <span class="veiw_all">
                <a href="{{ route('school.dashboard') }}">Students List</a>
            </span>
        </div>
        <div class="ms_profile_wrapper">
            <div class="ms_profile_box">
                {{-- <div class="ms_pro_img">
                <img src="images/pro_img.jpg" alt="" class="img-fluid">
                <div class="pro_img_overlay">
                    <i class="fa_icon edit_icon"></i>
                </div>
            </div> --}}
                <div class="ms_pro_form">
                    <div class="form-group">
                        <label>User category *</label>
                        <select class="form-control" id="category">
                            <option value="empty" disabled selected>--select--</option>
                            <option value="user">Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
                        <div id="categoryHelp" class="form-text-help">User category is required.</div>
                    </div>
                    <div class="form-group">
                        <label>First Name *</label>
                        <input type="text" class="form-control" id="first_name">
                        <div id="first_nameHelp" class="form-text-help">First name is required.</div>
                    </div>
                    <div class="form-group">
                        <label>Last Name *</label>
                        <input type="text" class="form-control" id="last_name">
                        <div id="last_nameHelp" class="form-text-help">Last name is required.</div>
                    </div>
                    <div class="form-group">
                        <label>Email Address *</label>
                        <input type="email" class="form-control" id="email">
                        <div id="emailHelp" class="form-text-help">Email is required.</div>
                    </div>
                    <div class="form-group">
                        <label>School *</label>
                        <input id="school" type="text" placeholder="Enter your school" class="form-control"
                            value="{{ Auth::user()->school }}" readonly>
                        <div id="schoolHelp" class="form-text-help">School is required.</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Index No *</label>
                        <input type="text" class="form-control" id="student_index">
                        <div id="student_indexHelp" class="form-text-help">Student Index is required.</div>
                    </div>
                    <div class="pro-form-btn text-center marger_top15">
                        <button class="ms_btn" id="btn_submit">Submit</button>
                        <a href="{{ route('school.dashboard') }}" class="ms_btn" id="cncl_btn">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.form-text-help').hide();
                $('#btn_submit').click(function(e) {
                    e.preventDefault();

                    var formData = new FormData();
                    formData.append('category', $('#category').val());
                    formData.append('first_name', $('#first_name').val());
                    formData.append('last_name', $('#last_name').val());
                    formData.append('email', $('#email').val());
                    formData.append('school', $('#school').val());
                    formData.append('student_index', $('#student_index').val());

                    if (!$('#category').val() || !$('#first_name').val() || !$('#last_name').val() || !$(
                            '#email').val() || !$('#school')
                        .val() || !$('#student_index').val()) {
                        if (!$('#category').val()) {
                            $('#categoryHelp').show();
                        }
                        if (!$('#first_name').val()) {
                            $('#first_nameHelp').show();
                        }
                        if (!$('#last_name').val()) {
                            $('#last_nameHelp').show();
                        }
                        if (!$('#email').val()) {
                            $('#emailHelp').show();
                        }
                        if (!$('#school').val()) {
                            $('#schoolHelp').show();
                        }
                        if (!$('#student_index').val()) {
                            $('#student_indexHelp').show();
                        }
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('moderator.admin.user.store') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(data, status, xhr) {
                                alert('New User created');
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        });
                    }
                });
            });
        </script>
    @endsection
