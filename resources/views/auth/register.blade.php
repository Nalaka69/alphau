@extends('app.welcome.layout.app')
@section('title')
    AlphaU - Register
@endsection
@section('welcomebody')
    <div class="web_body bg_dm_drk">
        <div class="container mt-5 p-5 ">

            <div class=" register_dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="ms_register_img">
                            <img src="{{ asset('admin/images/register_img.png') }}" alt="" class="img-fluid" />
                        </div>
                        <div class="ms_register_form">
                            <h2>Register / Sign Up</h2>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="first_name" type="first_name"
                                            class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                            value="{{ old('first_name') }}" required autocomplete="first_name" autofocus
                                            placeholder="Enter your first name">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="last_name" type="last_name"
                                            class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                            value="{{ old('last_name') }}" required autocomplete="last_name" autofocus
                                            placeholder="Enter your last name">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Enter your email address">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="school" type="school"
                                            class="form-control @error('school') is-invalid @enderror" name="school"
                                            value="{{ old('school') }}" required autocomplete="school" autofocus
                                            placeholder="Enter your school">
                                        @error('school')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="student_index" type="student_index"
                                            class="form-control @error('student_index') is-invalid @enderror"
                                            name="student_index" value="{{ old('student_index') }}" required
                                            autocomplete="student_index" autofocus placeholder="Enter student index number">
                                        @error('student_index')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Enter pssword">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirm password">
                                    </div>
                                </div>

                                <div class="mb-0 text-center">
                                    <div class="col-md-12">
                                        <button type="submit" class="ms_btn">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <p>Already Have An Account? <a href="{{ route('login') }}">login here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
