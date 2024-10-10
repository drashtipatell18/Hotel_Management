@include('frontend.layouts.main')
@php dd('gfhgfh'); @endphp
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
    <p class="verification_resend">Didn't
        receive code?
        <span>Resend</span>
    </p>
</div>
