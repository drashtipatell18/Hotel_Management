<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hiroto Template">
    <meta name="keywords" content="Hiroto, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Hotel Management')</title>

    <!-- Css Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.min.css') }} " type="text/css">
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ url('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/d_style.css') }}" type="text/css">
    
 
  

    <!-- font-family  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <style>
        @import url('https://fonts.cdnfonts.com/css/footlight-mt-pro');
    </style>
</head>

<body>
      <!-- Page Preloder -->
      <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <a href="{{ route('index') }}">
                <!-- <img src="img/logo.png" alt=""> -->
                <h2 class="text-light">Logo</h2>
            </a>
        </div>
        <!-- <div id="mobile-menu-wrap"></div> -->
        <ul class="menu__class">
            <li><a href="{{ route('index') }}" class="nav-link" data-page="index">Home</a></li>
            <li><a href="{{ route('aboutus') }}" class="nav-link" data-page="about">About Us</a></li>
            <li><a href="{{ route('rooms-frontend') }}" class="nav-link" data-page="rooms">Rooms</a></li>
            <li><a href="{{ route('spa') }}" class="nav-link" data-page="spa">Spa</a></li>
            <li><a href="{{ route('gallery') }}" class="nav-link" data-page="gallery">Gallery</a></li>
            <li><a href="{{ route('contact-us') }}" class="nav-link" data-page="contact">Contact Us</a></li>
        </ul>
        <div class="offcanvas__btn__widget">
            <a href="#" id="openNewModalBtn">Login</a>
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
                        <h2>Welcome back! Glad to see you, Again!</h2>
                    </div>
                </div>
                <input type="text" placeholder="Username or Email">
                <div class="new-password-field">
                    <input type="password" id="newLoginPassword" placeholder="Password">
                    <i class="fas fa-eye new-toggle-password" id="newToggleLoginPassword"></i>
                </div>
                <button id="newForgotPasswordBtn">Forgot Password?</button>
                <button>Login</button>
                <div class="new_m_scon pt-4">
                    <div class="new_m_sline"></div>
                    <h3 class="new_m_stxt">Or Login with</h3>
                    <div class="new_m_sline"></div>
                </div>
                <div class="d-flex justify-content-center align-items-center py-3">
                    <div class="new_y_facebook_icon d-flex justify-content-center">
                        <img src="img/facebook_ic.png" alt>
                    </div>
                    <div class="new_y_google_icon d-flex justify-content-center">
                        <img src="img/google_ic.png" alt>
                    </div>
                </div>
            </div>

            <!-- Register Form -->
            <div id="newRegisterForm" class="new-form hidden">
                <div class="row m-0 justify-content-center d-flex">
                    <div class="col-sm-9">
                        <h2>Hello! Register to get started</h2>
                    </div>
                </div>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Enter your email">
                <div class="new-password-field">
                    <input type="password" id="newRegisterPassword" placeholder="Password">
                    <i class="fas fa-eye new-toggle-password" id="newToggleRegisterPassword"></i>
                </div>
                <div class="new-password-field">
                    <input type="password" id="newConfirmRegisterPassword" placeholder="Confirm Password">
                    <i class="fas fa-eye new-toggle-password" id="newToggleConfirmRegisterPassword"></i>
                </div>
                <button>Register</button>
                <div class="new_m_scon pt-4">
                    <div class="new_m_sline"></div>
                    <h3 class="new_m_stxt">Or Login with</h3>
                    <div class="new_m_sline"></div>
                </div>
                <div class="d-flex justify-content-center align-items-center py-3">
                    <div class="new_y_facebook_icon d-flex justify-content-center">
                        <img src="img/facebook_ic.png" alt>
                    </div>
                    <div class="new_y_google_icon d-flex justify-content-center">
                        <img src="img/google_ic.png" alt>
                    </div>
                </div>
            </div>

            <!-- Forgot Password Form -->
            <div id="newForgotPasswordForm" class="new-form hidden">
                <h2>Forgot Password</h2>
                <div class="row m-0 justify-content-center d-flex">
                    <div class="col-lg-10">
                        <p class="text-center">Don't worry! It occurs. Please enter the email address linked with your
                            account.</p>
                    </div>
                </div>
                <input type="email" placeholder="Enter your email">
                <button id="newSendCodeBtn">Send Code</button>
            </div>

            <!-- OTP Verification Form -->
            <div id="newOtpVerificationForm" class="new-form hidden">
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
                <p class="new_verification_resend">Didn’t receive code? <span>Resend</span></p>
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
                <button id="newCreatePasswordBtn">Create Password</button>
            </div>
        </div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__nav__option">
            <div class="d_container">
                <div class="row m-0">
                    <div class="col-lg-2">
                        <div class="header__logo">
                            <a href="{{ route('index') }}">
                                <!-- <img src="img/logo.png" alt=""> -->
                                <h2 class="text-light">Logo</h2>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="header__nav">
                            <nav class="header__menu">
                                <ul class="menu__class">
                                    <li><a href="{{ route('index') }}" class="nav-link" data-page="index">Home</a></li>
                                    <li><a href="{{ route('aboutus') }}" class="nav-link" data-page="about">About Us</a></li>
                                    <li><a href="{{ route('rooms-frontend') }}" class="nav-link" data-page="rooms">Rooms</a></li>
                                    <li><a href="{{ route('spa') }}" class="nav-link" data-page="spa">Spa</a></li>
                                    <li><a href="{{ route('gallery') }}" class="nav-link" data-page="gallery">Gallery</a></li>
                                    <li><a href="{{ route('contact-us') }}" class="nav-link" data-page="contact">Contact Us</a></li>
                                </ul>
                            </nav>
                            <div class="header__nav__widget">
                                <a href="#" id="openModalBtn">Login</a>
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

                                    <!-- Login Form -->
                                    <div id="loginForm" class="form">
                                        <div class="row m-0 justify-content-center d-flex">
                                            <div class="col-lg-9">
                                                <h2>Welcome back! Glad
                                                    to see you, Again!</h2>
                                            </div>
                                        </div>

                                        <input type="text" placeholder="Username or Email">
                                        <div class="password-field">
                                            <input type="password" id="loginPassword" placeholder="Password">
                                            <i class="fas fa-eye toggle-password" id="toggleLoginPassword"></i>
                                        </div>
                                        <button id="forgotPasswordBtn">Forgot
                                            Password?</button>
                                        <button>Login</button>

                                        <div class="m_scon pt-4">
                                            <div class="m_sline"></div>
                                            <h3 class="m_stxt">Or Login
                                                with</h3>
                                            <div class="m_sline"></div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center py-3">
                                            <div class="y_facebbok_icon d-flex justify-content-center">
                                                <img src="img/facebook_ic.png" alt>
                                            </div>
                                            <div class="y_ggole_icon d-flex justify-content-center">
                                                <img src="img/google_ic.png" alt>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Register Form -->
                                    <div id="registerForm" class="form hidden">
                                        <div class="row  m-0 justify-content-center d-flex">
                                            <div class="col-lg-9">
                                                <h2>Hello! Register to get
                                                    started</h2>
                                            </div>
                                        </div>
                                        <input type="text" placeholder="Name">
                                        <input type="email" placeholder="Enter your email">
                                        <div class="password-field">
                                            <input type="password" id="registerPassword" placeholder="Password">
                                            <i class="fas fa-eye toggle-password" id="toggleRegisterPassword"></i>
                                        </div>
                                        <div class="password-field">
                                            <input type="password" id="registerPassword" placeholder="Confirm Password">
                                            <i class="fas fa-eye toggle-password" id="toggleRegisterPassword"></i>
                                        </div>
                                        <button>Register</button>
                                        <div class="m_scon pt-4">
                                            <div class="m_sline"></div>
                                            <h3 class="m_stxt">Or Login
                                                with</h3>
                                            <div class="m_sline"></div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center py-3">
                                            <div class="y_facebbok_icon d-flex justify-content-center">
                                                <img src="img/facebook_ic.png" alt>
                                            </div>
                                            <div class="y_ggole_icon d-flex justify-content-center">
                                                <img src="img/google_ic.png" alt>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Forgot Password Form -->
                                    <div id="forgotPasswordForm" class="form hidden">
                                        <h2>Forgot Password</h2>
                                        <div class="row  m-0 justify-content-center d-flex">
                                            <div class="col-lg-10">
                                                <p class="text-center">Don't
                                                    worry! It occurs. Please
                                                    enter the email address
                                                    linked with your
                                                    account.</p>
                                            </div>
                                        </div>
                                        <input type="email" placeholder="Enter your email">
                                        <button id="sendCodeBtn">Send
                                            Code</button>
                                    </div>

                                    <!-- OTP Verification Form -->
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
                                        <p class="verification_resend">Didn’t
                                            receive code?
                                            <span>Resend</span>
                                        </p>
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
                                            <input type="password" id="newPassword" placeholder="New Password">
                                            <i class="fas fa-eye toggle-password" id="toggleNewPassword"></i>
                                        </div>
                                        <div class="password-field">
                                            <input type="password" id="confirmNewPassword"
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