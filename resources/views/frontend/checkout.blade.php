@extends('frontend.layouts.main')
@section('title', 'Checkout')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .error {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }
    input.error {
        border-color: #dc3545;
    }
    input.valid {
        border-color: #198754;
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
    <form action="{{ route('chckout.store',$id) }}" method="post" id="checkoutForm">
        @csrf
        <div class="d_container">
            <div class="row">
            <div class="col-12 col-lg-7">
                <div class="d_inquiry">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h6>Guest Information</h6>
                        </div>
                    </div>
                    <input type="hidden" name="room_id" id="room_id" value="{{ $id }}" >
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label for="dob">First Name</label>
                            <input type="text" placeholder="First Name*" id=""  name="first_name" value="{{ old('name', $user->name ?? '') }}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dob">Last Name</label>
                            <input type="text" placeholder="Last Name*" name="last_name" id=""  value="{{ old('lname', $user->lname ?? '') }}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dob">Phone</label>
                            <input type="tel" placeholder="Phone*" name="phone" id="" value="{{ old('phone', $user->phone_number ?? '') }}">
                        </div>
                      
                        <div class="col-12 col-md-6">
                            <label for="dob">Email</label>
                            <input type="email" placeholder="Email*" name="email" id="" value="{{ old('phone', $user->email ?? '') }}">
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="input-group">
                                <label for="dob">Date of Birth (DD/MM/YYYY)</label>
                                <input type="date" class="birthdate" id="dob" name="dob"
                                    value="{{ old('dob', $user->dob ?? '') }}">
                                <div class="custom-date-icon" style="margin-top:-29px;display:flex;margin-left:92%">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </div>
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
                            <label for="dob">House No</label>
                            <input type="text" placeholder="House No. / Block No. / Flat No.*" name="house_no" id="" value="{{ old('house_no')}}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dob">Building Name / Street Name / Colony</label>
                            <input type="text" placeholder="Building Name / Street Name / Colony*" name="buling_name" id="" value="{{ old('buling_name')}}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dob">City</label>
                            <input type="text" placeholder="City*" name="city" id="" value="{{ old('city')}}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dob">State</label>
                            <input type="text" placeholder="State*" name="state" id="" value="{{ old('state')}}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dob">Country</label>
                            <input type="text" placeholder="Country*" name="country" id="" value="{{ old('country')}}">
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
                            <textarea type="text" placeholder="Additional Message" name="additional_info" id="" rows="7"></textarea>
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
                            <label for="dob">Card Holder Name</label>
                            <input type="text" placeholder="Card Holder Name*" name="cardholder_name" id=""  value="{{ old('cardholder_name')}}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dob">Card Number</label>
                            <input type="text" placeholder="Card Number*" name="card_number" id="" value="{{ old('card_number')}}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dob">Expiry Date MM/YYr</label>
                            <input type="text" placeholder="Expiry Date MM/YY" name="expiry_date" id="" value="{{ old('expiry_date')}}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dob">CVV</label>
                            <input type="text" placeholder="CVV*" name="cvv" id="" value="{{ old('CVV')}}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dob">Enter Captcha</label>
                            <input type="text" placeholder="Enter Captcha*" name="captcha" id="captcha">
                            @if($errors->has('captcha'))
                                <div class="error">{{ $errors->first('captcha') }}</div>
                            @endif
                        </div>
                        <div class="col-6 col-xl-4">
                            <div class="d-flex align-items-center">
                                <!-- <input type="text" placeholder="Country*" name="" id=""> -->
                                 <div class="captcha">
                                 <span>{!! captcha_img()!!}</span>
                                    <button type="button" class="btn btn-danger reload" id="reload">
                                        &#x21bb;</button>
                                 </div>
                               
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
                                <button type="submit" class="d-block d-sm-inline-block text-center">Confirm Your Stay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            </div>
            <!-- <div class="col-12 col-sm-1"></div> -->
            <div class="col-12 col-lg-5 p-sm-4 ">
                <div class="d_book">
                    <div class="d_box">
                        <div class="row g-3">
                            <div class="col-12 col-xl-5">
                                <div class="d_img">
                                <div class="d_img">
                                    @if($booking->room->images->isNotEmpty())
                                        <img src="{{ asset('assets/upload/' . $booking->room->images->first()->image) }}" alt="{{ $booking->room->name }}" class="img-fluid">
                                    @else
                                        <img src="{{ asset('assets/upload/default.jpg') }}" alt="Default Image" class="img-fluid">
                                    @endif
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7">
                                <h5>{{ $booking->room->room_name }}</h5>
                                <p><span>Check in :</span> {{ \Carbon\Carbon::parse($booking->check_in_date)->format('d/m/Y') }}</p>
                                <p><span>Guests :</span> {{ $booking->member_count }} Guest</p>
                                <p><span>Rooms : </span>{{ $booking->room_count }} Room</p>
                            </div>
                        </div>
                        <h3 class="mt-3">Total</h3>
                    </div>
                    <hr class="m-0">
                    <div class="d_box d_pricelist">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4>Deposit</h4>
                            <h4>$1000</h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4>Total Base Price</h4>
                            <h4>${{ number_format($booking->total_cost_input, 2) }}</h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4>Taxes</h4>
                            <h4>$100</h4>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="d_box d_pricelist">
                        <!-- <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4>You Saved</h4>
                            <h4>$100</h4>
                        </div> -->
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3>Total</h3>
                            <h3>${{ number_format($booking->total_cost_input + 100 + 1000, 2) }}</h3>
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

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

$(document).ready(function() {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        let isCaptchaValid = false;
        $("#checkoutForm").validate({
        rules: {
            first_name: {
                required: true,
                minlength: 2
            },
            last_name: {
                required: true,
                minlength: 2
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 15
            },
            email: {
                required: true,
                email: true
            },
            house_no: {
                required: true
            },
            buling_name: {
                required: true
            },
            city: {
                required: true
            },
            state: {
                required: true
            },
            country: {
                required: true
            },
            pincode: {
                required: true,
                digits: true
            },
            cardholder_name: {
                required: true,
                minlength: 2
            },
            card_number: {
                required: true,
                creditcard: true
            },
            expiry_date: {
                required: true,
                pattern: /^(0[1-9]|1[0-2])\/([0-9]{2})$/
            },
            cvv: {
                required: true,
                digits: true,
                minlength: 3
            },
            captcha: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Please enter your first name",
                minlength: "Name must be at least 2 characters long"
            },
            last_name: {
                required: "Please enter your last name",
                minlength: "Name must be at least 2 characters long"
            },
            phone: {
                required: "Please enter your phone number",
                digits: "Please enter only digits",
                minlength: "Phone number must be at least 10 digits",
                maxlength: "Phone number must not exceed 15 digits"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            house_no: "Please enter your house number",
            buling_name: "Please enter your building name",
            city: "Please enter your city",
            state: "Please enter your state",
            country: "Please enter your country",
            pincode: {
                required: "Please enter your pincode",
                digits: "Please enter only digits"
            },
            cardholder_name: {
                required: "Please enter the cardholder's name",
                minlength: "Name must be at least 2 characters long"
            },
            card_number: {
                required: "Please enter your card number",
                creditcard: "Please enter a valid credit card number"
            },
            expiry_date: {
                required: "Please enter the expiry date",
                pattern: "Please enter date in MM/YY format"
            },
            cvv: {
                required: "Please enter the CVV",
                digits: "Please enter only digits",
                minlength: "CVV must be at least 3 digits",
                maxlength: "CVV must be at most 4 digits"
            },
            captcha: "Please enter the captcha"
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('error');
            error.insertAfter(element);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('error').removeClass('valid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('error').addClass('valid');
        },
        submitHandler: function(form) {
            // Check if the CAPTCHA is valid
            $.ajax({
                type: 'POST',
                url: '/validate-captcha',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    captcha: $("input[name='captcha']").val()
                },
                success: function(response) {
                    if (response.valid) {
                        // CAPTCHA is valid, submit the form
                        form.submit();
                    } else {
                        // CAPTCHA is invalid, show an error message
                        alert('Invalid CAPTCHA, please try again.');
                        // $('#reload').click();
                        $("input[name='captcha']").val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('CAPTCHA validation failed:', error);
                    alert('Failed to validate CAPTCHA. Please try again.');
                }
            });
        }
    });
        

    // Custom method for expiry date validation
    $.validator.addMethod("pattern", function(value, element, regexp) {
        return this.optional(element) || regexp.test(value);
    }, "Please check your input.");

    $('#reload').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: '/reload-captcha',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            beforeSend: function() {
                $('#reload').prop('disabled', true);
            },
            success: function(data) {
                if (data.captcha) {
                    $(".captcha span").html(data.captcha);
                } else {
                    console.error('Invalid CAPTCHA response');
                }
            },
            error: function(xhr, status, error) {
                console.error('CAPTCHA reload failed:', error);
                alert('Failed to reload CAPTCHA. Please try again.');
            },
            complete: function() {
                $('#reload').prop('disabled', false);
            }
        });
    });
    
});
</script>




@endsection






