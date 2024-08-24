@extends('layouts.app')

@section('content')
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{ URL::to('assets/img/logo.png') }}" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            {!! Toastr::message() !!}
                            <h1 class="mb-3">Reset Password</h1>
                            <form method="POST" action="{{ route('reset.password.store', ['token' => $token]) }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <input id="password" type="password"
                                        class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                        placeholder="Enter Password" required autocomplete="new-password">
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                        name="confirm_password" placeholder="Confirm Password" required
                                        autocomplete="new-password">
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                                </div>
                            </form>
                            <div class="text-center dont-have">Already have an account? <a
                                    href="{{ route('login') }}">Login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
