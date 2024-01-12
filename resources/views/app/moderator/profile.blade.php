@extends('app.moderator.layout.app')
@section('title')
    School Admin Profile
@endsection
@section('schoolbody')
    <strong>
        <style>
            .form-text-help {
                display: none;
                /* Hide the help messages by default */
            }
        </style>
    </strong>
    <div class="ms_profile_wrapper">
        <h1>Edit Profile</h1>
        <div class="ms_profile_box">
            {{-- <div class="ms_pro_img">
                <img src="images/pro_img.jpg" alt="" class="img-fluid">
                <div class="pro_img_overlay">
                    <i class="fa_icon edit_icon"></i>
                </div>
            </div> --}}
            <div class="ms_pro_form">
                <div class="form-group">
                    <label>First Name *</label>
                    <input id="first_name" type="text" placeholder="Enter first name" class="form-control"
                        value="{{ Auth::user()->first_name }}">
                    <div id="first_nameHelp" class="form-text-help">First name is required.</div>
                </div>
                <div class="form-group">
                    <label>Last Name *</label>
                    <input id="last_name" type="text" placeholder="Enter last name" class="form-control"
                        value="{{ Auth::user()->last_name }}">
                    <div id="last_nameHelp" class="form-text-help">Last name is required.</div>
                </div>
                <div class="form-group">
                    <label>Email Address *</label>
                    <input id="email" type="email" placeholder="Enter your email address" class="form-control"
                        value="{{ Auth::user()->email }}" readonly>
                    <div id="emailHelp" class="form-text-help">Email is required.</div>
                </div>
                <div class="form-group">
                    <label>School *</label>
                    <input id="school" type="text" placeholder="Enter your school" class="form-control"
                        value="{{ Auth::user()->school }}">
                    <div id="schoolHelp" class="form-text-help">School is required.</div>
                </div>
                <div class="form-group">
                    <label>Current Password *</label>
                    <input id="current_password" placeholder="Enter current password" type="password" class="form-control">
                    <div id="current_passwordHelp" class="form-text-help">Current password is required.</div>
                    <div id="current_password_mismatchedHelp" class="form-text-help text-danger">Current password is
                        Incorrect.</div>
                </div>
                <div class="form-group">
                    <label>New Password *</label>
                    <input id="new_password" type="password" placeholder="Enter new password" class="form-control">
                    <div id="new_passwordHelp" class="form-text-help">New password is required.</div>
                </div>
                <div class="pro-form-btn text-center marger_top15">
                    <button class="ms_btn" id="update_btn">Update</button>
                    <a href="{{ route('index') }}" class="ms_btn" id="cncl_btn">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.form-text-help').hide();
            $('#update_btn').click(function(e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append('first_name', $('#first_name').val());
                formData.append('last_name', $('#last_name').val());
                formData.append('email', $('#email').val());
                formData.append('school', $('#school').val());
                formData.append('current_password', $('#current_password').val());
                formData.append('new_password', $('#new_password').val());
                if (!$('#first_name').val() || !$('#last_name').val() || !$('#email').val() || !$('#school')
                    .val() || !$('#current_password').val() || !$('#new_password').val()) {
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
                    if (!$('#current_password').val()) {
                        $('#current_passwordHelp').show();
                    }
                    if (!$('#new_password').val()) {
                        $('#new_passwordHelp').show();
                    }
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('student.profile.update') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data, status, xhr) {
                            alert('Profile updated');
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            if (xhr.status === 422) {
                                var errors = xhr.responseJSON;
                                // Display error message for incorrect password
                                if (errors.error) {
                                    $('#current_password_mismatchedHelp').show();
                                } else {
                                    console.log(error);
                                }
                            } else {
                                console.log(error);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
