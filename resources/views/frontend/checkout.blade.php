@extends('frontend.layouts.main')
@section('title', 'Checkout')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>
    .custom-dropdown {
        position: relative;
        display: inline-block;
        width: 200px;
    }

    .dropdown-button {
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #fff;
        font-size: 16px;
        text-align: left;
        cursor: pointer;
        position: relative;
        z-index: 1000;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #1A2142;
        min-width: 100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        z-index: 1000;
    }

    .dropdown-content a {
        display: block;
        padding: 8px;
        color: #fff;
        text-decoration: none;
    }

    .dropdown-content a:hover {
        background-color: #1A2142;
    }

    .y_select_btn {
        background-color: #1A2142;
        color: white !important;
    }
</style>

<!-- Heading section start -->

<section class="d_p-25 d_heading">
    <div class="d_container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Checkout</h2>
            </div>
        </div>
    </div>
</section>

<!-- Heading section end -->

<!-- Form section start -->

<section class="d_p-25 d_form">
    <div class="d_container">
        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="d_inquiry">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h6>Guest Information</h6>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="First Name*" name="" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="First Name*" name="" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex">
                                <div class="custom-dropdown w-auto " style="border-radius:0px;">
                                    <button class="dropdown-button m-0 y_select_btn">+1</button>
                                    <div class="dropdown-content">
                                        <a href="#" data-value="+1">+1</a>
                                        <a href="#" data-value="+1">+1</a>
                                        <a href="#" data-value="+44">+44</a>
                                        <a href="#" data-value="+61">+61</a>
                                        <!-- Add more options as needed -->
                                    </div>
                                </div>


                                <input type="text" placeholder="Phone*" class="rounded-top-0 rounded-bottom-0 " name=""
                                    id="">
                            </div>

                        </div>
                        <div class="col-12 col-md-6">
                            <input type="email" placeholder="Nationality*" name="" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="email" placeholder="Nationality*" name="" id="">
                        </div>
                    </div>
                </div>
                <div class="d_inquiry">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h6>Billing Details</h6>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="House No. / Block No. / Flat No.*" name="" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="Building Name / Street Name / Colony*" name="" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="City*" name="" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="State*" name="" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="Pincode*" name="" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="Country*" name="" id="">
                        </div>
                    </div>
                </div>
                <div class="d_inquiry">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h6>Additional Message (Optional)</h6>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <textarea type="text" placeholder="Additional Message" name="" id="" rows="7"></textarea>
                        </div>
                    </div>
                </div>
                <div class="d_inquiry">
                    <div class="row mb-3 mt-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="m-0">Card information</h6>
                                <div class="d_paymentimg">
                                    <svg width="40" height="30" viewBox="0 0 40 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.166667" y="0.166667" width="39.6667" height="29.6667" rx="1.16667"
                                            fill="white" stroke="#D9D9D9" stroke-width="0.333333" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.1429 20.3227H9.71965L7.90253 12.7404C7.81628 12.3916 7.63315 12.0833 7.36377 11.9379C6.6915 11.5727 5.95071 11.2821 5.14258 11.1355V10.8435H9.0462C9.58496 10.8435 9.98903 11.2821 10.0564 11.7913L10.9992 17.2607L13.4212 10.8435H15.7771L12.1429 20.3227ZM17.1225 20.3227H14.834L16.7185 10.8435H19.007L17.1225 20.3227ZM21.9703 13.4696C22.0377 12.9591 22.4417 12.6672 22.9132 12.6672C23.654 12.5939 24.4609 12.7405 25.1344 13.1044L25.5384 11.0635C24.865 10.7716 24.1242 10.625 23.4519 10.625C21.2307 10.625 19.6145 11.938 19.6145 13.7603C19.6145 15.1466 20.7593 15.8745 21.5674 16.313C22.4417 16.7503 22.7785 17.0422 22.7111 17.4794C22.7111 18.1353 22.0377 18.4272 21.3654 18.4272C20.5573 18.4272 19.7491 18.2086 19.0095 17.8434L18.6055 19.8856C19.4136 20.2495 20.2879 20.3961 21.096 20.3961C23.5866 20.4681 25.1344 19.1564 25.1344 17.1875C25.1344 14.7081 21.9703 14.5628 21.9703 13.4696ZM33.143 20.3227L31.3259 10.8435H29.3741C28.97 10.8435 28.566 11.1354 28.4313 11.5727L25.0664 20.3227H27.4223L27.8925 18.9377H30.7872L31.0565 20.3227H33.143ZM29.7102 13.3964L30.3825 16.9689H28.498L29.7102 13.3964Z"
                                            fill="#172B85" />
                                    </svg>
                                    <svg width="40" height="30" viewBox="0 0 40 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.166667" y="0.166667" width="39.6667" height="29.6667" rx="1.16667"
                                            fill="white" stroke="#D9D9D9" stroke-width="0.333333" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.282 21.4472C18.9203 22.732 17.1542 23.5076 15.2244 23.5076C10.9173 23.5076 7.42578 19.6444 7.42578 14.8789C7.42578 10.1133 10.9173 6.25012 15.2244 6.25012C17.1542 6.25012 18.9203 7.02571 20.282 8.31053C21.6437 7.02571 23.4098 6.25012 25.3396 6.25012C29.6467 6.25012 33.1382 10.1133 33.1382 14.8789C33.1382 19.6444 29.6467 23.5076 25.3396 23.5076C23.4098 23.5076 21.6437 22.732 20.282 21.4472Z"
                                            fill="#ED0006" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.2832 21.4463C21.96 19.8636 23.0232 17.5086 23.0232 14.8789C23.0232 12.2491 21.96 9.89412 20.2832 8.31145C21.645 7.02608 23.4115 6.25012 25.3418 6.25012C29.6488 6.25012 33.1404 10.1133 33.1404 14.8789C33.1404 19.6444 29.6488 23.5076 25.3418 23.5076C23.4115 23.5076 21.645 22.7316 20.2832 21.4463Z"
                                            fill="#F9A000" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.2839 21.4472C21.9613 19.8645 23.0249 17.5091 23.0249 14.8789C23.0249 12.2486 21.9613 9.89322 20.2839 8.31055C18.6066 9.89322 17.543 12.2486 17.543 14.8789C17.543 17.5091 18.6066 19.8645 20.2839 21.4472Z"
                                            fill="#FF5E00" />
                                    </svg>


                                    <svg width="40" height="30" viewBox="0 0 40 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.166667" y="0.166667" width="39.6667" height="29.6667" rx="1.16667"
                                            fill="#1F72CD" stroke="#D9D9D9" stroke-width="0.333333" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.6336 10.625L3.99805 19.6834H8.35032L8.88987 18.2391H10.1232L10.6627 19.6834H15.4534V18.5811L15.8802 19.6834H18.3583L18.7852 18.5578V19.6834H28.7484L29.9599 18.2766L31.0942 19.6834L36.2116 19.6951L32.5645 15.1795L36.2116 10.625H31.1736L29.9943 12.0058L28.8956 10.625H18.057L17.1263 12.9631L16.1737 10.625H11.8305V11.6898L11.3474 10.625H7.6336ZM22.5117 11.9114H28.2331L29.983 14.0396L31.7892 11.9114H33.5391L30.8804 15.1783L33.5391 18.4076H31.7099L29.96 16.2546L28.1445 18.4076H22.5117V11.9114ZM23.9238 14.4437V13.2571V13.256H27.4938L29.0515 15.1536L27.4247 17.0616H23.9238V15.7662H27.0451V14.4437H23.9238ZM8.47529 11.9114H10.5968L13.0082 18.0539V11.9114H15.3323L17.1948 16.3156L18.9114 11.9114H21.2238V18.4114H19.8168L19.8053 13.318L17.754 18.4114H16.4953L14.4325 13.318V18.4114H11.5379L10.9891 16.9542H8.02431L7.47668 18.4101H5.92578L8.47529 11.9114ZM8.53125 15.607L9.50803 13.0111L10.4837 15.607H8.53125Z"
                                            fill="white" />
                                    </svg>
                                    <svg width="40" height="30" viewBox="0 0 40 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.166667" y="0.166667" width="39.6667" height="29.6667" rx="1.16667"
                                            fill="white" stroke="#D9D9D9" stroke-width="0.333333" />
                                        <path
                                            d="M17.1426 28.75L38.8569 21.5625V28.0833C38.8569 28.4515 38.5584 28.75 38.1902 28.75H17.1426Z"
                                            fill="#FD6020" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M34.7374 11.3885C35.932 11.3885 36.5891 11.993 36.5891 13.1347C36.6488 14.0077 36.1112 14.7465 35.3945 14.8808L37.0072 17.3657H35.7528L34.379 14.948H34.2596V17.3657H33.2441V11.3885H34.7374ZM34.2598 14.1421H34.5584C35.2155 14.1421 35.5141 13.8063 35.5141 13.2019C35.5141 12.6646 35.2155 12.3288 34.5584 12.3288H34.2598V14.1421ZM29.7207 17.3657H32.5878V16.3583H30.7361V14.7465H32.5281V13.7391H30.7361V12.3959H32.5878V11.3885H29.7207V17.3657ZM26.7341 15.4181L25.3603 11.3885H24.2852L26.4952 17.5H27.0328L29.2428 11.3885H28.1677L26.7341 15.4181ZM14.6094 14.4108C14.6094 16.0897 15.804 17.5001 17.2973 17.5001C17.7751 17.5001 18.1932 17.3657 18.6114 17.1643V15.8211C18.3127 16.224 17.8946 16.4927 17.4167 16.4927C16.461 16.4927 15.6845 15.6868 15.6845 14.6122V14.4779C15.6248 13.4034 16.4013 12.4632 17.357 12.396C17.8349 12.396 18.3127 12.6646 18.6114 13.0676V11.7244C18.253 11.4558 17.7751 11.3886 17.357 11.3886C15.804 11.2543 14.6094 12.6646 14.6094 14.4108ZM12.7555 13.672C12.1582 13.4033 11.979 13.269 11.979 12.9332C12.0387 12.5303 12.3373 12.1945 12.6957 12.2616C12.9944 12.2616 13.293 12.4631 13.532 12.7317L14.0696 11.9258C13.6514 11.5229 13.1139 11.2542 12.5763 11.2542C11.74 11.1871 11.0233 11.9258 10.9635 12.8661V12.9332C10.9635 13.7391 11.2622 14.2092 12.2179 14.545C12.4568 14.6122 12.6957 14.7465 12.9347 14.8808C13.1139 15.0151 13.2333 15.2166 13.2333 15.4852C13.2333 15.9554 12.8749 16.3583 12.5165 16.3583H12.4568C11.979 16.3583 11.5608 16.0225 11.3817 15.5524L10.7246 16.2911C11.083 17.0299 11.7998 17.4328 12.5165 17.4328C13.4722 17.5 14.2487 16.6941 14.3085 15.6196V15.4181C14.2487 14.6122 13.9501 14.2092 12.7555 13.672ZM9.29102 17.3657H10.3064V11.3885H9.29102V17.3657ZM4.57422 11.3885H6.0675H6.36615C7.7997 11.4557 8.93459 12.7988 8.87486 14.4107C8.87486 15.2837 8.51647 16.0896 7.91916 16.694C7.38158 17.1642 6.72454 17.4328 6.0675 17.3656H4.57422V11.3885ZM5.8885 16.3582C6.36635 16.4254 6.90393 16.2239 7.26232 15.8881C7.6207 15.4852 7.7999 14.9479 7.7999 14.3435C7.7999 13.8062 7.6207 13.2689 7.26232 12.866C6.90393 12.5302 6.36635 12.3287 5.8885 12.3959H5.58984V16.3582H5.8885Z"
                                            fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.6539 11.25C20.1606 11.25 18.9062 12.5932 18.9062 14.3393C18.9062 16.0183 20.1009 17.4286 21.6539 17.4958C23.2069 17.5629 24.4015 16.1526 24.4612 14.4065C24.4015 12.6603 23.2069 11.25 21.6539 11.25V11.25Z"
                                            fill="#FD6020" />
                                    </svg>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="Card Holder Name*" name="" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="Card Number*" name="" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="Expiry Date MM/YY" name="" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="CVV*" name="" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="Enter Captcha*" name="" id="">
                        </div>
                        <div class="col-6 col-xl-4">
                            <div class="d-flex align-items-center">
                                <!-- <input type="text" placeholder="Country*" name="" id=""> -->
                                <img src="/img/d_img/captch.png" alt="">
                                <i class="fa-solid fa-arrows-rotate d_refresh ms-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d_inquiry">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h6>Cancellation information</h6>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <p>You may cancel your reservation for no charge until 18:00:00 hotel time on August 07,
                                2024. Please note that we will assess a fee of $ 150 if you must cancel after this
                                deadline.</p>
                            <p>By making a reservation, I agree to Hotels Terms of Use. I also acknowledge Hotels
                                Privacy Statement located in the Privacy Center.</p>
                        </div>
                    </div>
                </div>
                <div class="d_inquiry mt-2">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="d_cta">
                                <a href="" class="d-block d-sm-inline-block text-center">Confirm Your Stay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-12 col-sm-1"></div> -->
            <div class="col-12 col-lg-5 p-sm-4 ">
                <div class="d_book">
                    <div class="d_box">
                        <div class="row g-3">
                            <div class="col-12 col-xl-5">
                                <div class="d_img">
                                    <img src="{{ url('frontend/img/d_img/room1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-xl-7">
                                <h5>1 King Bed, Forest View, Loft Guest Room</h5>
                                <p><span>Check in :</span> 07/08/24</p>
                                <p><span>Guests :</span> 1 Adult</p>
                                <p><span>Rooms : </span>1 Room</p>
                            </div>
                        </div>
                        <h3 class="mt-3">Total</h3>
                    </div>
                    <hr class="m-0">
                    <div class="d_box d_pricelist">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4>Deposit</h4>
                            <h4>$2000</h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4>Total Base Price</h4>
                            <h4>$1250</h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4>Taxes</h4>
                            <h4>$0</h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4>Extra : Room Clean</h4>
                            <h4>$100</h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h4>Remaining Balance</h4>
                            <h4>$0</h4>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="d_box d_pricelist">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4>You Saved</h4>
                            <h4>$100</h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3>Total</h3>
                            <h3>$1350</h3>
                        </div>
                    </div>
                </div>
                <div class="d_apply mt-4">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" placeholder="Apply Coupon" name="" id="">
                        </div>
                        <div class="col-6 d-block">
                            <div class="d_cta h-100 d-block">
                                <a href=""
                                    class="d-flex w-100 justify-content-center h-100 align-items-center">Apply</a>
                            </div>
                        </div>
                    </div>
                    <p class="d_note">Note : Booking Details will be send on your mobile number or Email.</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // log in model
        // Get elements
        const modal = document.getElementById('authModal');
        const openModalBtn = document.getElementById('openModalBtn');
        const loginBtn = document.getElementById('loginBtn');
        const registerBtn = document.getElementById('registerBtn');
        const forgotPasswordBtn = document.getElementById('forgotPasswordBtn');
        const sendCodeBtn = document.getElementById('sendCodeBtn');
        const verifyBtn = document.getElementById('verifyBtn');

        const modalHeader = document.getElementById('modalHeader');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const forgotPasswordForm = document.getElementById('forgotPasswordForm');
        const otpVerificationForm = document.getElementById('otpVerificationForm');
        const createNewPasswordForm = document.getElementById('createNewPasswordForm');

        const toggleLoginPassword = document.getElementById('toggleLoginPassword');
        const toggleRegisterPassword = document.getElementById('toggleRegisterPassword');
        const toggleNewPassword = document.getElementById('toggleNewPassword');
        const toggleConfirmNewPassword = document.getElementById('toggleConfirmNewPassword');

        // Function to reset the modal to the login form
        function resetModal() {
            loginForm.style.display = "block";
            registerForm.style.display = "none";
            forgotPasswordForm.style.display = "none";
            otpVerificationForm.style.display = "none";
            createNewPasswordForm.style.display = "none";
            modalHeader.style.display = "flex";
            loginBtn.classList.add('active');
            registerBtn.classList.remove('active');
        }

        // Open modal and reset to login form
        openModalBtn.onclick = function () {
            modal.style.display = "block";
            resetModal();  // Reset modal every time it's opened
        }

        // Switch to login form
        loginBtn.onclick = function () {
            resetModal();  // Reset to login form
        }

        // Switch to register form
        registerBtn.onclick = function () {
            registerForm.style.display = "block";
            loginForm.style.display = "none";
            forgotPasswordForm.style.display = "none";
            otpVerificationForm.style.display = "none";
            createNewPasswordForm.style.display = "none";
            modalHeader.style.display = "flex";
            registerBtn.classList.add('active');
            loginBtn.classList.remove('active');
        }

        // Switch to forgot password form
        forgotPasswordBtn.onclick = function () {
            forgotPasswordForm.style.display = "block";
            loginForm.style.display = "none";
            registerForm.style.display = "none";
            otpVerificationForm.style.display = "none";
            createNewPasswordForm.style.display = "none";
            modalHeader.style.display = "none";
        }

        // Switch to OTP verification form
        sendCodeBtn.onclick = function () {
            otpVerificationForm.style.display = "block";
            forgotPasswordForm.style.display = "none";
            modalHeader.style.display = "none";
        }

        // Switch to create new password form
        verifyBtn.onclick = function () {
            createNewPasswordForm.style.display = "block";
            otpVerificationForm.style.display = "none";
            modalHeader.style.display = "none";
        }

        // Close the modal when clicking outside
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Toggle password visibility
        function togglePasswordVisibility(inputId, toggleIcon) {
            const passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Event listeners for toggling password visibility
        toggleLoginPassword.onclick = function () {
            togglePasswordVisibility('loginPassword', toggleLoginPassword);
        };

        toggleRegisterPassword.onclick = function () {
            togglePasswordVisibility('registerPassword', toggleRegisterPassword);
        };

        toggleNewPassword.onclick = function () {
            togglePasswordVisibility('newPassword', toggleNewPassword);
        };

        toggleConfirmNewPassword.onclick = function () {
            togglePasswordVisibility('confirmNewPassword', toggleConfirmNewPassword);
        };
        const createPasswordBtn = document.getElementById('createPasswordBtn');

        // Function to close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // Event listener for the "Create Password" button
        createPasswordBtn.onclick = function () {
            closeModal();  // Close the modal when "Create Password" is clicked
        };

        // Close the modal when clicking outside
        window.onclick = function (event) {
            if (event.target == modal) {
                closeModal();  // Close the modal when clicking outside
            }
        };
        // Function to change modal margin when the register form is open
        function adjustModalMargin() {
            if (registerForm.style.display === "block") {
                document.querySelector('.login_model').style.margin = "5% auto";
            } else {
                document.querySelector('.login_model').style.margin = "10% auto";
            }
        }

        // Modify the existing register button event to adjust the margin
        registerBtn.onclick = function () {
            registerForm.style.display = "block";
            loginForm.style.display = "none";
            forgotPasswordForm.style.display = "none";
            otpVerificationForm.style.display = "none";
            createNewPasswordForm.style.display = "none";
            modalHeader.style.display = "flex";
            registerBtn.classList.add('active');
            loginBtn.classList.remove('active');

            // Adjust modal margin when register form is shown
            adjustModalMargin();
        }

        // Ensure margin resets when switching to login form
        loginBtn.onclick = function () {
            resetModal();  // Reset to login form
            adjustModalMargin();  // Reset margin to 10% for login
        }
        const customOverlay = document.getElementById('customOverlay');

        // Function to open the modal and show the overlay
        openModalBtn.onclick = function () {
            modal.style.display = "block";
            loginForm.style.display = "block"
            customOverlay.style.display = "block"; // Show the black overlay
            resetModal();  // Reset modal every time it's opened
        }

        // Function to close the modal and hide the overlay
        function closeModal() {
            modal.style.display = "none";
            customOverlay.style.display = "none"; // Hide the black overlay
        }

        // Event listener for the "Create Password" button to close the modal
        createPasswordBtn.onclick = function () {
            closeModal();  // Close the modal when "Create Password" is clicked
        };

        // Close the modal and overlay when clicking outside the modal
        window.onclick = function (event) {
            if (event.target == modal || event.target == customOverlay) {
                closeModal();  // Close the modal and hide the overlay when clicking outside
            }
        }

    </script>
@endpush

