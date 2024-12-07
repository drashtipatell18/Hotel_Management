<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hiroto Template">
    <meta name="keywords" content="Hiroto, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Hotel Management')</title>
    <link rel="icon" href="{{ asset('assets/img/Logo.png') }}" type="image/x-icon"/>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <link rel="stylesheet" href="{{ url('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.min.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/d_style.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


    <!-- font-family  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <style>
        @import url('https://fonts.cdnfonts.com/css/footlight-mt-pro');
    </style>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<style>
    .custom-dropdown {
        background-color: white;
        /* Set background color to black */
    }

    .custom-dropdown .dropdown-item {
        color: black;
        /* Set text color to white for better visibility */
    }

    .custom-dropdown .dropdown-item:hover {
        background-color: darkgray;
        /* Optional: Change hover color for better UX */
        color: white;
        /* Maintain text color on hover */
    }

    button:disabled {
        background-color: #ccc;
        /* Change to a light gray */
        color: #666;
        /* Change to a dark gray */
        cursor: not-allowed;
        /* Change cursor to indicate the button is disabled */
    }

    .header__logo {
        height: 69px;
        width: 69px;
        padding: 0px !important;
    }

    .footer__logo {
        height: 69px;
        width: 69px;
        padding: 0px !important;
    }



    #scrollToTopBtn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;
        /* Hidden by default */
        padding: 10px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 40px;
    }

    .error {
        color: red;
        font-weight: 500;
    }

    .d_ribbon {
        position: absolute;
        top: 39px;
        left: -29px;
        background-color: #53624E;
        color: white;
        padding: 7px 49px;
        transform: rotate(-45deg);
        font-weight: bold;
        font-size: 18px;
        z-index: 1;
        /* margin-left: 1px; */
    }

    .new_y_google_icon img {
        margin: auto;
    }
/*   
    .sticky-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        background-color: #fff; /* Add your desired background color */
        /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); Optional: adds a subtle shadow */
        /* transition: all 0.3s ease-in-out; */
    /* } */


</style>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Toastr Messages -->
    @if(session()->has('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
    @endif

    @if(session()->has('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
    @endif

    @if(session()->has('info'))
    <script>
        toastr.info("{{ session('info') }}");
    </script>
    @endif

    @if(session()->has('warning'))
    <script>
        toastr.warning("{{ session('warning') }}");
    </script>
    @endif

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <!-- <a href="{{ route('index') }}">
                <img class="w-100 h-100" src="#" alt="">
            </a> -->
        </div>
        <!-- <div id="mobile-menu-wrap"></div> -->
        <ul class="menu__class">
            <li><a href="{{ route('index') }}" class="nav-link" data-page="index">Home</a></li>
            <li><a href="{{ route('aboutus') }}" class="nav-link" data-page="about">About Us</a></li>
            <li><a href="{{ route('rooms-frontend') }}" class="nav-link" data-page="rooms">Rooms</a></li>
            <li><a href="{{ route('spa') }}" class="nav-link" data-page="spabook">Spa</a></li>
            <li><a href="{{ route('gallery') }} " class="nav-link" data-page="gallery">Gallery</a></li>
            <li><a href="{{ route('contact-us')}}" class="nav-link" data-page="contact">Contact Us</a></li>
            <li><a href="" class="nav-link">+1 23 4567890</a></li>
        </ul>
        @if (Auth::check())
        <div class="header__nav__widget">
            <div class="dropdown">
                <a style="padding:10px" class="dropdown-toggle" href="#" role="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }} <i class="fas fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu custom-dropdown" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{ route('myProfile') }}">My Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('mybooking') }}">My Booking</a></li>
                </ul>
            </div>
        </div>&nbsp;&nbsp;
        @endif
        <div class="offcanvas__btn__widget">
            @auth
            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</a>
            @else
            <a href="#" id="openNewModalBtn">Login</a>
            @endauth
        </div>
    </div>
    <!-- Offcanvas Menu End -->
    <div id="newCustomOverlay" class="new-custom-overlay"></div>

    <!-- The Modal -->
    <div id="newAuthModal" class="new-modal">
        <!-- Modal Content -->
        <div class="new_login_model new-modal-content">
            <!-- Header (only for Login and Register) -->
            <div id="newModalHeader" class="new-modal-header">
                <button id="newLoginBtn" class="active">Login</button>
                <button id="newRegisterBtn">Register</button>
            </div>

            <!-- Login Form -->
            <div id="newLoginForm" class="new-form">
                <div class="row m-0 justify-content-center d-flex">
                    <div class="col-sm-9">
                        <h2>Welcome back! Glad to see you, Again11!</h2>
                    </div>
                </div>
                <form id="mobileloginAjaxForm">
                    @csrf
                    <input type="text" name="email" placeholder="Username or Email">
                    <div class="new-password-field">
                        <input type="password" name="password" id="newLoginPassword" placeholder="Password">
                        <i class="fas fa-eye new-toggle-password" id="newToggleLoginPassword"></i>
                    </div>
                    <button type="button" id="newForgotPasswordBtn">Forgot Password?</button>
                    <button>Login</button>
                    <div class="new_m_scon pt-4">
                        <div class="new_m_sline"></div>
                        <h3 class="new_m_stxt">Or Login with</h3>
                        <div class="new_m_sline"></div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center py-3">
                        <div class="y_facebbok_icon d-flex justify-content-center" style="text-align:center">
                            <a href="{{ route('auth.facebook') }}" target="_self">
                                <img src="{{ url('frontend/img/facebook_ic.png') }}" alt>
                            </a>
                        </div>
                        <div class="new_y_google_icon d-flex justify-content-center">
                            <a href="{{ route('auth.google') }}" target="_self">
                                <img src="{{ url('frontend/img/google_ic.png') }}" style="display:block"
                                    alt="Google Icon">
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Register Form -->
            <div id="newRegisterForm" class="new-form hidden">
                <div class="row m-0 justify-content-center d-flex">
                    <div class="col-sm-9">
                        <h2>Hello! Register to get started</h2>
                    </div>
                </div>
                <form id="mobileregisterAjaxForm">
                    @csrf
                    <input type="text" name="name" placeholder="Name">
                    <input type="email" name="email" placeholder="Enter your email">
                    <input type="text" name="phone_number" placeholder="Enter your phone number">
                    <div class="new-password-field">
                        <input type="password" name="password" id="newRegisterPassword" placeholder="Password">
                        <i class="fas fa-eye new-toggle-password" id="newToggleRegisterPassword"></i>
                    </div>
                    <div class="new-password-field">
                        <input type="password" name="password_confirmation" id="newConfirmRegisterPassword"
                            placeholder="Confirm Password">
                        <i class="fas fa-eye new-toggle-password" id="newToggleConfirmRegisterPassword"></i>
                    </div>
                    <button>Register</button>
                    <div class="new_m_scon pt-4">
                        <div class="new_m_sline"></div>
                        <h3 class="new_m_stxt">Or Login with</h3>
                        <div class="new_m_sline"></div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center py-3">
                        <div class="new_y_facebook_icon d-flex justify-content-center" style="text-align:center">
                            <a href="{{ route('auth.facebook') }}" target="_self">
                                <img src="{{ url('frontend/img/facebook_ic.png') }}" alt>
                            </a>
                        </div>
                        <div class="new_y_google_icon d-flex justify-content-center" style="text-align:center">
                            <a href="{{ route('auth.google') }}" target="_self">
                                <img src="{{ url('frontend/img/google_ic.png') }}" alt>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Forgot Password Form -->
            <!-- {{-- <div id="newForgotPasswordForm" class="new-form">
                <h2>Forgot Password</h2>
                <div class="row m-0 justify-content-center d-flex">
                    <div class="col-lg-10">
                        <p class="text-center">Don't worry! It occurs. Please enter the email address linked with your
                            account.</p>
                    </div>
                </div>
                <input type="email" placeholder="Enter your email">
                <button id="newSendCodeBtn">Send Code</button>
            </div> -->

            <!-- OTP Verification Form -->
            <!-- <div id="newOtpVerificationForm" class="new-form hidden">
                <h2>OTP Verification</h2>
                <div class="row m-0 justify-content-center d-flex">
                    <div class="col-lg-10">
                        <p class="text-center">Enter the verification code we just sent on your email address.</p>
                    </div>
                </div>
                <div class="new-otp-inputs">
                    <input type="text" maxlength="1" class="new-otp-box" id="newOtp1" autofocus>
                    <input type="text" maxlength="1" class="new-otp-box" id="newOtp2">
                    <input type="text" maxlength="1" class="new-otp-box" id="newOtp3">
                    <input type="text" maxlength="1" class="new-otp-box" id="newOtp4">
                </div>
                <button id="newVerifyBtn">Verify</button>
                <p class="new_verification_resend">Didn't receive code? <span>Resend</span></p>
            </div> --}} -->


            <div id="newForgotPasswordForm" class="new-form">
                <h2>Forgot Password</h2>
                <div class="row m-0 justify-content-center d-flex">
                    <div class="col-lg-10">
                        <p class="text-center">Don't worry! It happens. Please enter the email address linked with your
                            account.</p>
                    </div>
                </div>
                <form id="forgotPasswordAjaxFormMobile">
                    @csrf
                    <input type="text" name="email" id="forgotEmail" placeholder="Enter your email">
                    <button id="newSendCodeBtn" type="submit">Send Code</button>
                </form>
            </div>

            <!-- OTP Verification Form -->
            <div id="newOtpVerificationForm" class="new-form hidden">
                <h2>OTP Verification</h2>
                <div class="row m-0 justify-content-center d-flex">
                    <div class="col-lg-10">
                        <p class="text-center">Enter the verification code we just sent to your email address.</p>
                    </div>
                </div>
                <div class="new-otp-inputs">
                    <input type="text" maxlength="1" class="new-otp-box" id="newOtp1" autofocus>
                    <input type="text" maxlength="1" class="new-otp-box" id="newOtp2">
                    <input type="text" maxlength="1" class="new-otp-box" id="newOtp3">
                    <input type="text" maxlength="1" class="new-otp-box" id="newOtp4">
                </div>
                <button id="newVerifyBtn" type="submit">Verify</button>
                <p class="new_verification_resend">Didn't receive the code? <span>Resend</span></p>
            </div>

            <!-- Create New Password Form -->
            <div id="newCreateNewPasswordForm" class="new-form hidden">
                <h2>Create New Password</h2>
                <div class="row m-0 justify-content-center d-flex">
                    <div class="col-lg-10">
                        <p class="text-center">Your new password must be unique from those previously used.</p>
                    </div>
                </div>
                <div class="new-password-field">
                    <input type="password" id="newNewPassword" placeholder="New Password">
                    <i class="fas fa-eye new-toggle-password" id="newToggleNewPassword"></i>
                </div>
                <div class="new-password-field">
                    <input type="password" id="newConfirmNewPassword" placeholder="Confirm Password">
                    <i class="fas fa-eye new-toggle-password" id="newToggleConfirmNewPassword"></i>
                </div>
                <button id="newCreatePasswordBtn" type="submit">Create Password</button>
            </div>
        </div>
    </div>

    <!-- Header Section Begin -->
    <header class="header sticky-header">
        <div class="header__nav__option">
            <div class="d_container">
                <div class="row m-0">
                    <div class="col-lg-2 align-self-center">
                        <div class="header__logo">
                            <a href="{{ route('index') }}">
                                <img class="w-100 h-100" src="{{ url('assets/img/Frame.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="header__nav">
                            <nav class="header__menu">
                                <ul class="menu__class">
                                    <li><a href="{{ route('index') }}" class="nav-link" data-page="index">Home</a></li>
                                    <li><a href="{{ route('aboutus') }}" class="nav-link" data-page="about">About Us</a>
                                    </li>
                                    <li><a href="{{ route('rooms-frontend') }}" class="nav-link"
                                            data-page="rooms">Rooms</a></li>
                                    <li><a href="{{ route('spa') }}" class="nav-link" data-page="spabook">Spa</a></li>
                                    <li><a href="{{ route('gallery') }} " class="nav-link"
                                            data-page="gallery">Gallery</a></li>
                                    <li><a href="{{ route('contact-us')}}" class="nav-link" data-page="contact">Contact
                                            Us</a></li>
                                    <li><a href="" class="nav-link">+1 23 4567890</a></li>
                                </ul>
                            </nav>
                            @if (Auth::check())
                            <div class="header__nav__widget">
                                <div class="dropdown">
                                    <a style="padding:10px" class="dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }} <i class="fas fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu custom-dropdown" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ route('myProfile') }}">My Profile</a></li>
                                        <li><a class="dropdown-item" href="{{ route('mybooking') }}">My Booking</a></li>
                                    </ul>
                                </div>
                            </div>&nbsp;&nbsp;
                            @endif

                            <div class="header__nav__widget">
                                @auth
                                <a style="padding-left: 28px;padding-right: 25px;" href="#" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Logout</a>
                                @else
                                <a href="#" id="openModalBtn">Login</a>
                                @endauth
                            </div>
                            <div id="customOverlay" class="custom-overlay"></div>
                            <!-- The Modal -->
                            <div id="authModal" class="modal">
                                <!-- Modal Content -->
                                <div class="login_model modal-content">
                                    <!-- Header (only for Login and Register) -->
                                    <div id="modalHeader" class="modal-header">
                                        <button id="loginBtn" class="active">Login</button>
                                        <button id="registerBtn">Register</button>
                                    </div>


                                    <div id="loginForm" class="form">
                                        <div class="row m-0 justify-content-center d-flex">
                                            <div class="col-lg-9">
                                                <h2>Welcome back! Glad to see you, Again!</h2>
                                            </div>
                                        </div>
                                        <form id="loginAjaxForm">
                                            @csrf
                                            <input type="text" name="email" placeholder="Username or Email">
                                            <div class="password-field">
                                                <input type="password" name="password" id="loginPassword"
                                                    placeholder="Password">
                                                <i class="fas fa-eye toggle-password" id="toggleLoginPassword"></i>
                                            </div>
                                            <button type="button" id="forgotPasswordBtn">Forgot Password?</button>
                                            <button type="submit">Login</button>

                                            <div class="m_scon pt-4">
                                                <div class="m_sline"></div>
                                                <h3 class="m_stxt">Or Login with</h3>
                                                <div class="m_sline"></div>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center py-3">
                                                <div class="y_facebbok_icon d-flex justify-content-center"
                                                    style="text-align:center">
                                                    <a href="{{ route('auth.facebook') }}" target="_self">
                                                        <img src="{{ url('frontend/img/facebook_ic.png') }}" alt>
                                                    </a>
                                                </div>
                                                <div class="new_y_google_icon d-flex justify-content-center">
                                                    <a href="{{ route('auth.google') }}" target="_self">
                                                        <img src="{{ url('frontend/img/google_ic.png') }}"
                                                            style="display:block" alt="Google Icon">
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div id="registerForm" class="form hidden">
                                        <div class="row  m-0 justify-content-center d-flex">
                                            <div class="col-lg-9">
                                                <h2>Hello! Register to get started</h2>
                                            </div>
                                        </div>
                                        <form id="registerAjaxForm">
                                            @csrf
                                            <input type="text" name="name" placeholder="Name">
                                            <input type="email" name="email" placeholder="Enter your email">
                                            <input type="text" name="phone_number"
                                                placeholder="Enter your phone number">
                                            <div class="password-field">
                                                <input type="password" name="password" id="registerPassword"
                                                    placeholder="Password">
                                                <i class="fas fa-eye toggle-password" id="toggleRegisterPassword"></i>
                                            </div>
                                            <div class="password-field">
                                                <input type="password" name="password_confirmation" id="confirmPassword"
                                                    placeholder="Confirm Password">
                                                <i class="fas fa-eye toggle-password" id="toggleConfirmPassword"></i>
                                            </div>
                                            <button type="submit">Register</button>
                                            <div class="m_scon pt-4">
                                                <div class="m_sline"></div>
                                                <h3 class="m_stxt">Or Login with</h3>
                                                <div class="m_sline"></div>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center py-3">
                                                <div class="y_facebbok_icon d-flex justify-content-center"
                                                    style="text-align:center">
                                                    <a href="{{ route('auth.facebook') }}" target="_self">
                                                        <img src="{{ url('frontend/img/facebook_ic.png') }}" alt>
                                                    </a>
                                                </div>
                                                <div class="new_y_google_icon d-flex justify-content-center">
                                                    <a href="{{ route('auth.google') }}" target="_self">
                                                        <img src="{{ url('frontend/img/google_ic.png') }}"
                                                            style="display:block" alt="Google Icon">
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Forgot Password Form -->
                                    <div id="forgotPasswordForm" class="form">
                                        <h2>Forgot Password</h2>
                                        <div class="row m-0 justify-content-center d-flex">
                                            <div class="col-lg-10">
                                                <p class="text-center">Don't worry! It occurs. Please enter the email
                                                    address linked with your account.</p>
                                            </div>
                                        </div>
                                        <form id="forgotPasswordAjaxForm">
                                            <!-- Ensure this ID is unique -->
                                            @csrf
                                            <input type="text" placeholder="Enter your email" name="email" id="email">
                                            <!-- Changed input type to text and added required attribute -->
                                            <button type="submit" id="submit">Send Code</button>
                                        </form>
                                    </div>
                                    <!-- OTP Verification Form -->
                                    <div id="otpVerificationForm" class="form hidden">
                                        <h2>OTP Verification</h2>
                                        <div class="row  m-0 justify-content-center d-flex">
                                            <div class="col-lg-10">
                                                <p class="text-center">Enter
                                                    the verification code we
                                                    just sent on your email
                                                    address.</p>
                                            </div>
                                        </div>
                                        <div class="otp-inputs">
                                            <input type="text" maxlength="1" class="otp-box" id="otp1" autofocus>
                                            <input type="text" maxlength="1" class="otp-box" id="otp2">
                                            <input type="text" maxlength="1" class="otp-box" id="otp3">
                                            <input type="text" maxlength="1" class="otp-box" id="otp4">
                                        </div>
                                        <button id="verifyBtn">Verify</button>
                                        <form id="resendOTPAjaxForm">
                                            <!-- Ensure this ID is unique -->
                                            @csrf
                                            <p class="verification_resend">Didn't
                                                receive code?
                                                <span id="resendOtp" style="cursor: pointer; color: blue;">Resend</span>
                                            </p>
                                        </form>
                                    </div>

                                    <!-- Create New Password Form -->
                                    <div id="createNewPasswordForm" class="form hidden">
                                        <h2>Create New Password</h2>
                                        <div class="row  m-0 justify-content-center d-flex">
                                            <div class="col-lg-10">
                                                <p class="text-center">Your
                                                    new password must be
                                                    unique from those
                                                    previously used.</p>
                                            </div>
                                        </div>
                                        <div class="password-field">
                                            <input type="password" id="newPassword" name="newPassword"
                                                placeholder="New Password">
                                            <i class="fas fa-eye toggle-password" id="toggleNewPassword"></i>
                                        </div>
                                        <div class="password-field">
                                            <input type="password" id="confirmNewPassword" name="confirmNewPassword"
                                                placeholder="Confirm Password">
                                            <i class="fas fa-eye toggle-password" id="toggleConfirmNewPassword"></i>
                                        </div>
                                        <button id="createPasswordBtn">Create
                                            Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open">
                    <span class="fa fa-bars"></span>
                </div>
            </div>
        </div>
    </header>

    <!-- Modal -->
    <div class="modal fade d_modal1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header justify-content-center">
                    <h1 class="modal-title fs-5 " id="exampleModalLabel">Logout</h1>
                </div>
                <form id="logoutButton" action="{{ url('logoutfrontend')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Are you sure you want to Logout?</p>
                    </div>
                    <div class="modal-footer d-block">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn"
                                    style="background-color: #1A2142;color: #fff; width: 100%;">Yes</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>

</body>

</html>

<!-- NavBAR Sticky  -->
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.querySelector('.sticky-header');
        const scrollThreshold = 100; // Adjust this value as needed

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    });
</script> -->

<!-- Image Lazy -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const lazyBgElements = document.querySelectorAll('.lazy-bg');
        
        const lazyLoadBackground = (entry) => {
            if (entry.isIntersecting) {
                const section = entry.target;
                const bgUrl = section.getAttribute('data-setbg');
                section.style.backgroundImage = `url(${bgUrl})`;
                observer.unobserve(section);
            }
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => lazyLoadBackground(entry));
        }, { rootMargin: '0px', threshold: 0.1 });

        lazyBgElements.forEach(section => observer.observe(section));
    });
</script>

<script>
    document.querySelectorAll('.toggle-password').forEach(item => {
        item.addEventListener('click', function() {
            const inputField = this.previousElementSibling; // Get the input field

            // Toggle the type of the input field and the icon class
            if (inputField.type === "password") {
                inputField.type = "text"; // Change to text (show password)
                this.classList.add('fa-eye-slash'); // Add eye-slash icon class
                this.classList.remove('fa-eye'); // Remove eye icon class
            } else {
                inputField.type = "password"; // Change back to password (hide password)
                this.classList.remove('fa-eye-slash'); // Remove eye-slash icon class
                this.classList.add('fa-eye'); // Add eye icon class
            }
        });
    });

    document.getElementById('forgotPasswordAjaxForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const submitButton = document.getElementById('submit');
        submitButton.disabled = true;
        submitButton.textContent = 'Sending...';
        setTimeout(() => {
            submitButton.textContent = 'Code Sent';
        }, 2000);
    });

    document.getElementById('resendOtp').addEventListener('click', function() {
        let resendButton = document.getElementById('resendOtp');
        let verifyButton = document.getElementById('verifyButton');

        // Disable the resend button and change the text to 'Sending...'
        resendButton.disabled = true;  // Disable the button to prevent multiple clicks
        resendButton.innerText = 'Sending...';

        // Simulate sending OTP request via AJAX
        const formData = new FormData(document.getElementById('resendOTPAjaxForm'));

        fetch('/resend-otp', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => {
            if (response.ok) {
                // Successfully sent
                resendButton.innerText = 'Code Sent';
                resendButton.style.color = 'green'; // Optional: change color for success
                verifyButton.disabled = false; // Enable verify button
            } else {
                // Handle error
                resendButton.innerText = 'Resend Code';
                resendButton.style.color = 'blue'; // Change back to original color
                resendButton.disabled = false;  // Re-enable the resend button
                verifyButton.disabled = true; // Keep verify button disabled
            }
        })
        .catch(error => {
            // Handle error
            console.error('Error resending OTP:', error);
            resendButton.innerText = 'Resend Code';
            resendButton.style.color = 'blue';
            resendButton.disabled = false;  // Re-enable the resend button
            verifyButton.disabled = true; // Keep verify button disabled
        });
    });


   // Forgot Password Form Submission
document.getElementById('forgotPasswordAjaxFormMobile').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = document.getElementById('forgotEmail').value;
    const submitButton = document.getElementById('newSendCodeBtn');

    submitButton.disabled = true;
    submitButton.textContent = 'Sending...';

    const formData = new FormData();
    formData.append('email', email);
    formData.append('_token', '{{ csrf_token() }}');

    fetch('/forget-password', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            return response.json().then(errorData => {
                throw new Error(errorData.message || 'Error sending code.');
            });
        }
    })
    .then(data => {
        submitButton.textContent = 'Code Sent';
        submitButton.style.color = 'green';
        toastr.success(data.message || 'OTP sent successfully');

        // Show OTP verification form
        document.getElementById('newForgotPasswordForm').classList.add('hidden');
        document.getElementById('newOtpVerificationForm').classList.remove('hidden');
    })
    .catch(error => {
        console.error('Error:', error);
        toastr.error(error.message || 'An error occurred. Please try again.');
    })
    .finally(() => {
        submitButton.disabled = false;
        submitButton.textContent = 'Send Code';
    });
});

// OTP Verification
document.getElementById('newVerifyBtn').addEventListener('click', function(e) {
    e.preventDefault();

    const email = document.getElementById('forgotEmail').value;
    const otp = [
        document.getElementById('newOtp1').value,
        document.getElementById('newOtp2').value,
        document.getElementById('newOtp3').value,
        document.getElementById('newOtp4').value
    ].join('');

    const formData = new FormData();
    formData.append('email', email);
    formData.append('otp', otp);
    formData.append('_token', '{{ csrf_token() }}');

    fetch('/verify-otp', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            toastr.success(data.message || 'OTP verified successfully');

            // Show password reset form
            document.getElementById('newOtpVerificationForm').classList.add('hidden');
            document.getElementById('newCreateNewPasswordForm').classList.remove('hidden');
        } else {
            throw new Error(data.message || 'Invalid or expired OTP');
        }
    })
    .catch(error => {
        toastr.error(error.message || 'An error occurred during OTP verification.');
    });
});

// New Password Creation
document.getElementById('newCreatePasswordBtn').addEventListener('click', function(e) {
    e.preventDefault();

    const newNewPassword = document.getElementById('newNewPassword').value;
    const newConfirmNewPassword = document.getElementById('newConfirmNewPassword').value;

    if (newNewPassword !== newConfirmNewPassword) {
        toastr.error("Passwords do not match.");
        return;
    }

    const formData = new FormData();
    formData.append('email', document.getElementById('forgotEmail').value);
    formData.append('newNewPassword', newNewPassword);
    formData.append('_token', '{{ csrf_token() }}');

    fetch('password/resetMobile', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            toastr.success(data.message || 'Password created successfully');
            window.location.href = '/';
        } else {
            throw new Error(data.message || 'Password creation failed');
        }
    })
    .catch(error => {
        toastr.error(error.message || 'An error occurred while creating the new password.');
    });
});
</script>

<script>
    document.addEventListener('click', function (event) {
        const dropdownToggle = document.getElementById('dropdownMenuButton1');

        // Check if the dropdownToggle element and Bootstrap instance exist
        if (dropdownToggle) {
            const dropdownMenu = dropdownToggle.nextElementSibling; // The dropdown menu

            // Check if the click is outside the dropdown toggle and dropdown menu
            if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                const bsDropdown = bootstrap.Dropdown.getInstance(dropdownToggle); // Get the Bootstrap instance
                if (bsDropdown && bsDropdown._isShown()) { // Ensure dropdown is open
                    bsDropdown.hide(); // Hide the dropdown if it's open
                }
            }
        }
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.header');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});
</script>
