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
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('danger'))
                                <div class="alert alert-danger">
                                    {{ session('danger') }}
                                </div>
                            @endif
                            <h1>Forgot Password?</h1>
                            <p class="account-subtitle">Enter your email to get a password reset link</p>
                            {!! Toastr::message() !!}
                            <form method="POST" action="{{ route('send.resetpassword.emaillink') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email"
                                        autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                                </div>
                            </form>
                            <div class="text-center dont-have">Remember your password? <a
                                    href="{{ route('login') }}">Login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert-success").fadeOut(1000);
            }, 1000);
            setTimeout(function() {
                $(".alert-danger").fadeOut(1000);
            }, 1000);
        });
    </script>
@endpush
