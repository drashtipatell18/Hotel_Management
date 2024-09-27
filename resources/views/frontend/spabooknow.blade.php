<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book now</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css"> -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/d_style.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <style>
        .over {
            padding: 50px !important;
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


    <!-- Image section start -->

    <div class="owl-carousel owl-theme" id="d_test2">
        <div class="item">
            <div class="d_img">
                <img src="/img/d_img/spasilder1.png" alt="">
            </div>
        </div>
        <div class="item">
            <div class="d_img">
                <img src="/img/d_img/spasilder1.png" alt="">
            </div>
        </div>
        <div class="item">
            <div class="d_img">
                <img src="/img/d_img/spasilder1.png" alt="">
            </div>
        </div>
        <div class="item">
            <div class="d_img">
                <img src="/img/d_img/spasilder1.png" alt="">
            </div>
        </div>

    </div>


    <!-- Detail section start -->

    <section class="d_p-25 d_detail d_spa">
        <div class="d_container">
            <div class="row g-3">
                <div class="col-12 col-lg-4">
                    <div class="d_item">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Book</h5>
                            <h6>From $120/person</h6>
                        </div>
                        <div class="row g-3 mt-1">
                            <div class="col-12">
                                <div class="d_filed d-flex justify-content-between align-items-center">
                                    <div class="d_formsubtitle">Check in</div>
                                    <div class="d-flex align-items-center d_cal">
                                        <input type="text" class="ds" name="checkin" style="width: 88px;">
                                        <i class="fa-solid fa-angle-down ms-sm-1 datepicker-trigger"
                                            style="color: #ffffff;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div
                                    class="d_filed d_select d-flex justify-content-between align-items-center position-relative">
                                    <div class="d_formsubtitle">Time</div>
                                    <div class="custom-select-wrapper">
                                        <div class="custom-select">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="custom-select-trigger">
                                                    <span class="d_time">09:00 am - 10:40 am</span>
                                                    <!-- <span class="d_price">$120</span> -->
                                                </div>
                                                <i class="fa-solid fa-angle-down"></i>
                                            </div>
                                            <div class="custom-options py-3">
                                                <div class="custom-option d-flex justify-content-between align-items-center"
                                                    data-time="09:00 am - 10:40 am" data-price="120">
                                                    <div class="d_time">09:00 am - 10:40 am</div>
                                                    <div class="d_price">$120</div>
                                                </div>
                                                <div class="custom-option d-flex justify-content-between align-items-center"
                                                    data-time="10:00 am - 11:40 am" data-price="140">
                                                    <div class="d_time">10:00 am - 11:40 am</div>
                                                    <div class="d_price">$140</div>
                                                </div>
                                                <div class="custom-option d-flex justify-content-between align-items-center"
                                                    data-time="11:00 am - 12:40 pm" data-price="150">
                                                    <div class="d_time">11:00 am - 12:40 pm</div>
                                                    <div class="d_price">$150</div>
                                                </div>
                                                <div class="custom-option d-flex justify-content-between align-items-center"
                                                    data-time="12:00 pm - 01:40 pm" data-price="150">
                                                    <div class="d_time">12:00 pm - 01:40 pm</div>
                                                    <div class="d_price">$150</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div
                                    class="d_filed d_select1 d-flex justify-content-between align-items-center position-relative">
                                    <div class="d_formsubtitle">Technician</div>
                                    <div class="custom-select-wrapper ">
                                        <div class="custom-select1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="custom-select-trigger1">Any Technician</div>
                                                <i class="fa-solid fa-angle-down"></i>
                                            </div>
                                            <div class="custom-options1 py-3">
                                                <div class="custom-option1" data-value="Any Technician">Any Technician
                                                </div>
                                                <div class="custom-option1" data-value="Female">Female</div>
                                                <div class="custom-option1" data-value="Male">Male</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d_filed d-flex justify-content-between align-items-center">
                                    <div class="d_formsubtitle">Person</div>
                                    <div class="d-flex d_btn">
                                        <button class="btn-decrement" data-target="room"><i
                                                class="fa-solid fa-minus"></i></button>
                                        <span id="room-count" class="mx-2">1</span>
                                        <button class="btn-increment" data-target="room"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="m-0 p-0">
                    <div class="d_item d_itme1">
                        <div class="d_total mt-3">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2>Total Cost</h2>
                                        <h5 id="total-cost">$0</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d_cta mt-3 text-center">
                                <a href="spacheckout.html" class="d-block d-sm-inline-block text-center">Book Treatment</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 ps-lg-5">
                    <div class="d_right">
                        <div class="d-sm-flex d-inline-block justify-content-between align-items-center mb-3">
                            <h2 class=" d_spatext">Custom Massage (100 min)</h2>
                            <h2 class="d_spatext">Starting from $120</h2>
                        </div> 
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                            ridiculus mus. </p>
                        <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                            quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim
                            justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis
                            pretium. Integer tincidunt. </p>
                        <div class="d_suite mt-xl-3 mt-3">
                            <h5>Remarks</h5>
                            <div class="mt-3">
                                <ul class="px-4">
                                    <li>*Price increases on weekends & holidays</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Detail section end -->


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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="js/jquery.nice-select.min.js"></script>
    <!-- <script src="js/jquery-ui.min.js"></script> -->
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="js/d_home.js"></script>
    <script src="js/main.js"></script>

    <script>
        $('#d_test2').owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            nav: false,
            dotsEach: true

        })
    </script>

    <script>

        // select functionality

        document.addEventListener('DOMContentLoaded', function () {
            var customSelects = document.querySelectorAll('.custom-select');

            customSelects.forEach(function (customSelect) {
                var selectTrigger = customSelect.querySelector('.custom-select-trigger');
                var customOptions = customSelect.querySelector('.custom-options');
                var customOptionItems = customSelect.querySelectorAll('.custom-option');

                // Toggle the dropdown when the custom-select is clicked
                customSelect.addEventListener('click', function (event) {
                    // Prevent click event from bubbling up to the document
                    event.stopPropagation();
                    customSelect.classList.toggle('open');
                });

                // Update the trigger text and close the dropdown when an option is clicked
                customOptionItems.forEach(function (option) {
                    option.addEventListener('click', function (event) {
                        selectTrigger.textContent = this.textContent;
                        customSelect.classList.remove('open');
                        event.stopPropagation(); // Prevent click event from bubbling up
                    });
                });
            });

            // Close the dropdown if clicking outside of the custom-select
            document.addEventListener('click', function (event) {
                customSelects.forEach(function (customSelect) {
                    if (!event.target.closest('.custom-select')) {
                        customSelect.classList.remove('open');
                    }
                });
            });
        });
    </script>

    <script>

        // select functionality

        document.addEventListener('DOMContentLoaded', function () {
            var customSelects = document.querySelectorAll('.custom-select1');

            customSelects.forEach(function (customSelect) {
                var selectTrigger = customSelect.querySelector('.custom-select-trigger1');
                var customOptions = customSelect.querySelector('.custom-options1');
                var customOptionItems = customSelect.querySelectorAll('.custom-option1');

                // Toggle the dropdown when the custom-select is clicked
                customSelect.addEventListener('click', function (event) {
                    // Prevent click event from bubbling up to the document
                    event.stopPropagation();
                    customSelect.classList.toggle('open1');
                });

                // Update the trigger text and close the dropdown when an option is clicked
                customOptionItems.forEach(function (option) {
                    option.addEventListener('click', function (event) {
                        selectTrigger.textContent = this.textContent;
                        customSelect.classList.remove('open1');
                        event.stopPropagation(); // Prevent click event from bubbling up
                    });
                });
            });

            // Close the dropdown if clicking outside of the custom-select
            document.addEventListener('click', function (event) {
                customSelects.forEach(function (customSelect) {
                    if (!event.target.closest('.custom-select1')) {
                        customSelect.classList.remove('open1');
                    }
                });
            });
        });

    </script>


     <!-- // total price functionality -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const timeSelect = document.querySelector('.d_select .custom-select');
            const timeOptions = document.querySelectorAll('.d_select .custom-option');
            const personCount = document.getElementById('room-count');
            const decrementBtn = document.querySelector('.btn-decrement');
            const incrementBtn = document.querySelector('.btn-increment');
            const totalCostElement = document.getElementById('total-cost');
            const customSelectTrigger = document.querySelector('.custom-select-trigger');

            let selectedPrice = 0; // Default price
            let persons = 1; // Default number of persons

            // Time selection functionality
            timeSelect.addEventListener('click', function () {
                this.querySelector('.custom-options').classList.toggle('open');
            });

            timeOptions.forEach(option => {
                option.addEventListener('click', function () {
                    const selectedTime = this.querySelector('.d_time').textContent;
                    const selectedPriceText = this.querySelector('.d_price').textContent;
                    selectedPrice = parseInt(selectedPriceText.replace('$', ''));

                    customSelectTrigger.innerHTML = `
                        <span class="d_time">${selectedTime}</span>
                        <span class="d_price">$${selectedPrice}</span>
                    `;

                    updateTotalCost();
                });
            });

            // Person increment/decrement functionality
            decrementBtn.addEventListener('click', function () {
                if (persons > 1) {
                    persons--;
                    updatePersonCount();
                }
            });

            incrementBtn.addEventListener('click', function () {
                persons++;
                updatePersonCount();
            });

            function updatePersonCount() {
                personCount.textContent = persons;
                updateTotalCost();
            }

            // Update total cost
            function updateTotalCost() {
                const total = selectedPrice * persons;
                totalCostElement.textContent = `$${total}`;
            }

            // Initial total cost calculation
            updateTotalCost();

            // Close the time options dropdown when clicking outside
            document.addEventListener('click', function (event) {
                if (!timeSelect.contains(event.target)) {
                    timeSelect.querySelector('.custom-options').classList.remove('open');
                }
            });
        });
    </script>

    <!-- select 1  -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const customSelect = document.querySelector('.custom-select');
            const customSelectTrigger = document.querySelector('.custom-select-trigger');
            const customOptions = document.querySelectorAll('.custom-option');
            const totalCostElement = document.getElementById('total-cost');

            customSelectTrigger.addEventListener('click', function () {
                customSelect.classList.toggle('open');
            });

            customOptions.forEach(option => {
                option.addEventListener('click', function () {
                    const selectedTime = this.getAttribute('data-time');
                    const selectedPrice = this.getAttribute('data-price');

                    customSelectTrigger.querySelector('.d_time').textContent = selectedTime;

                    customOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');

                    customSelect.classList.remove('open');

                    // Update total cost
                    totalCostElement.textContent = `$${selectedPrice}`;
                });
            });

            document.addEventListener('click', function (e) {
                if (!customSelect.contains(e.target)) {
                    customSelect.classList.remove('open');
                }
            });
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