<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="/css/d_style.css" type="text/css">

    
    <style>
        .d_gallery .nav-tabs {
            overflow: auto;
        }
        ::-webkit-scrollbar {
        display: none;
    }
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
            <a href="./index.html">
                <!-- <img src="img/logo.png" alt=""> -->
                <h2 class="text-light">Logo</h2>
            </a>
        </div>
        <!-- <div id="mobile-menu-wrap"></div> -->
        <ul class="menu__class">
            <li><a href="index.html" class="nav-link" data-page="index">Home</a></li>
            <li><a href="about.html" class="nav-link" data-page="about">About Us</a></li>
            <li><a href="rooms.html" class="nav-link" data-page="rooms">Rooms</a></li>
            <li><a href="spa.html" class="nav-link" data-page="spa">Spa</a></li>
            <li><a href="gallery.html" class="nav-link" data-page="gallery">Gallery</a></li>
            <li><a href="contact.html" class="nav-link" data-page="contact">Contact Us</a></li>
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
                            <a href="./index.html">
                                <!-- <img src="img/logo.png" alt=""> -->
                                <h2 class="text-light">Logo</h2>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="header__nav">
                            <nav class="header__menu">
                                <ul class="menu__class">
                                    <li><a href="index.html" class="nav-link" data-page="index">Home</a></li>
                                    <li><a href="about.html" class="nav-link" data-page="about">About Us</a></li>
                                    <li><a href="rooms.html" class="nav-link" data-page="rooms">Rooms</a></li>
                                    <li><a href="spa.html" class="nav-link" data-page="spa">Spa</a></li>
                                    <li><a href="gallery.html" class="nav-link" data-page="gallery">Gallery</a></li>
                                    <li><a href="contact.html" class="nav-link" data-page="contact">Contact Us</a></li>
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


    <section class="d_p-25 d_gallery mt-3 mb-4">
        <div class="d_container">
            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna
                laboris nisi ut aliquip ex</p>
            <div class="nav-tabs d-flex justify-content-between mt-5 overflow-auto">
                <button class="tab d_tabfill active" data-category="all">All</button>
                <button class="tab d_tabfill" data-category="seasonaloffer">Seasonal Offer</button>
                <button class="tab d_tabfill" data-category="massage">Massage</button>
                <button class="tab d_tabfill" data-category="coupleritual">Couples Rituals</button>
                <button class="tab d_tabfill" data-category="facial">Facial</button>
                <button class="tab d_tabfill" data-category="signature">Signature Experience</button>
            </div>
            <div class="image-gallery" id="imageGallery">
                <div class="row g-3 px-sm-2 p-0 ">
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="massage">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img h-100" src="img/d_img/spa1.png" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="coupleritual">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="img/d_img/spa3.png" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="facial">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img" src="img/d_img/spa6.png" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="facial">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="img/d_img/spa5.png" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="seasonaloffer">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="img/d_img/spa6.png" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="massage">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="img/d_img/spa1.png" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="seasonaloffer">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="img/d_img/spa3.png" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="signature">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="img/d_img/spa6.png" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="signature">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="img/d_img/spa5.png" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <div id="footer"></div>
    <script>
        fetch('header.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('navbar').innerHTML = data;
            });
        fetch('footer.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('footer').innerHTML = data;
            });
    </script>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/d_home.js"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const filterButtons = document.querySelectorAll('.tab');
            const galleryItems = document.querySelectorAll('.d_spabook');

            function filterGallery(category) {
                galleryItems.forEach(item => {
                    if (category === 'all' || item.getAttribute('data-category') === category) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    const category = this.getAttribute('data-category');
                    filterGallery(category);
                });
            });

            // Initialize with 'all' category
            filterGallery('all');
        });

    </script>

    <script>
        const newModal = document.getElementById('newAuthModal');
        const openNewModalBtn = document.getElementById('openNewModalBtn');
        const newLoginBtn = document.getElementById('newLoginBtn');
        const newRegisterBtn = document.getElementById('newRegisterBtn');
        const newForgotPasswordBtn = document.getElementById('newForgotPasswordBtn');
        const newSendCodeBtn = document.getElementById('newSendCodeBtn');
        const newVerifyBtn = document.getElementById('newVerifyBtn');
        const newCreatePasswordBtn = document.getElementById('newCreatePasswordBtn');

        const newModalHeader = document.getElementById('newModalHeader');
        const newLoginForm = document.getElementById('newLoginForm');
        const newRegisterForm = document.getElementById('newRegisterForm');
        const newForgotPasswordForm = document.getElementById('newForgotPasswordForm');
        const newOtpVerificationForm = document.getElementById('newOtpVerificationForm');
        const newCreateNewPasswordForm = document.getElementById('newCreateNewPasswordForm');

        const newToggleLoginPassword = document.getElementById('newToggleLoginPassword');
        const newToggleRegisterPassword = document.getElementById('newToggleRegisterPassword');
        const newToggleNewPassword = document.getElementById('newToggleNewPassword');
        const newToggleConfirmNewPassword = document.getElementById('newToggleConfirmNewPassword');

        const newCustomOverlay = document.getElementById('newCustomOverlay');

        // Function to reset the modal to the login form
        function resetNewModal() {
            newLoginForm.style.display = "block";
            newRegisterForm.style.display = "none";
            newForgotPasswordForm.style.display = "none";
            newOtpVerificationForm.style.display = "none";
            newCreateNewPasswordForm.style.display = "none";
            newModalHeader.style.display = "flex";
            newLoginBtn.classList.add('active');
            newRegisterBtn.classList.remove('active');
        }

        // Open modal and reset to login form
        openNewModalBtn.onclick = function () {
            newModal.style.display = "block";
            newCustomOverlay.style.display = "block"; // Show the overlay
            resetNewModal();  // Reset modal every time it's opened
        }

        // Switch to login form
        newLoginBtn.onclick = function () {
            resetNewModal();  // Reset to login form
        }

        // Switch to register form
        newRegisterBtn.onclick = function () {
            newRegisterForm.style.display = "block";
            newLoginForm.style.display = "none";
            newForgotPasswordForm.style.display = "none";
            newOtpVerificationForm.style.display = "none";
            newCreateNewPasswordForm.style.display = "none";
            newModalHeader.style.display = "flex";
            newRegisterBtn.classList.add('active');
            newLoginBtn.classList.remove('active');
            adjustNewModalMargin(); // Adjust margin when register form is active
        }

        // Toggle password visibility
        function togglePasswordVisibility(inputId, toggleIconId) {

            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(toggleIconId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.add("fa-eye-slash");
                toggleIcon.classList.remove("fa-eye");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.add("fa-eye");
                toggleIcon.classList.remove("fa-eye-slash");
            }
        }

        newToggleLoginPassword.onclick = function () {
            togglePasswordVisibility('newLoginPassword', 'newToggleLoginPassword');
        }

        newToggleRegisterPassword.onclick = function () {
            togglePasswordVisibility('newRegisterPassword', 'newToggleRegisterPassword');
        }

        newToggleNewPassword.onclick = function () {
            togglePasswordVisibility('newNewPassword', 'newToggleNewPassword');
        }

        newToggleConfirmNewPassword.onclick = function () {
            togglePasswordVisibility('newConfirmNewPassword', 'newToggleConfirmNewPassword');
        }

        // Show forgot password form
        newForgotPasswordBtn.onclick = function () {
            newLoginForm.style.display = "none";
            newRegisterForm.style.display = "none";
            newForgotPasswordForm.style.display = "block";
            newOtpVerificationForm.style.display = "none";
            newCreateNewPasswordForm.style.display = "none";
            newModalHeader.style.display = "none";
        }

        // Send code for forgot password
        newSendCodeBtn.onclick = function () {
            newForgotPasswordForm.style.display = "none";
            newOtpVerificationForm.style.display = "block";
        }

        // Verify OTP
        newVerifyBtn.onclick = function () {
            newOtpVerificationForm.style.display = "none";
            newCreateNewPasswordForm.style.display = "block";
        }

        // Create new password
        newCreatePasswordBtn.onclick = function () {
            newCreateNewPasswordForm.style.display = "none";
            newLoginForm.style.display = "block";
            newCustomOverlay.style.display = "none"; // Hide the overlay
            newModal.style.display = "none"; // Hide the modal
        }

        // Adjust modal margin when register form is open
        function adjustNewModalMargin() {
            if (newRegisterForm.style.display === "block") {
                newModal.style.margin = "5%";
            } else {
                newModal.style.margin = "auto";
            }
        }

        // Close modal on overlay click
        newCustomOverlay.onclick = function () {
            newModal.style.display = "none";
            newCustomOverlay.style.display = "none"; // Hide the overlay
        }

        // Close modal if Escape key is pressed
        document.onkeydown = function (e) {
            if (e.key === "Escape") {
                newModal.style.display = "none";
                newCustomOverlay.style.display = "none"; // Hide the overlay
            }
        }

        // Initial modal setup
        resetNewModal();
    </script>

</body>

</html>