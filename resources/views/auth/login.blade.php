@extends('app.welcome.layout.app')
@section('title')
    AlphaU - Login
@endsection
@section('welcomebody')
    <div class="web_body bg_dm_drk">
        <div class="container mt-5 p-5 ">
                <div class=" login_dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="fa_icon form_close"></i>
                        </button>
                        <div class="modal-body">
                            <div class="ms_register_img">
                                <img src="{{ asset('admin/images/register_img.png') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="ms_register_form">
                                <h2>login / Sign in</h2>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                         <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email address">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password" placeholder="Enter password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="remember_checkbox">
                                        <label>Keep me signed in
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="mb-0 text-center">
                                        <div class="col-md-12">
                                            <button type="submit" class="ms_btn">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-md-12">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link wb_frm_lbl_pw_rst" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                                <p>Don't Have An Account? <a href="{{route('register')}}">register here</a></p>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
