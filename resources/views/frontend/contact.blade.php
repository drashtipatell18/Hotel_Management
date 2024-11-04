@extends('frontend.layouts.main')
@section('title', 'Contact Us')
@section('main-container')
<!-- Breadcrumb Begin -->
<style>
    .contact_form input{
        margin:0px !important;
    }
</style>
<div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h1>Contact us</h1>
                    <div class="breadcrumb__links">
                        <a href="{{ route('index') }}">Home</a>
                        <span>Contact us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- welcome Section Begin -->
<div class="chooseus mt-0 spad">
    <img class="WelBackImg2" src="{{ url('frontend/img/WelcommeBack2.png') }}" alt>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="chooseus__text">
                    <div class="section-title mb-0">
                        <p>Need help with your online booking, have a question or need more information? Just drop us a
                            line!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-title">
            <h5>Reservations please call or email</h5>
            <p class="text-dark">Call us : +1 234567890</p>
            <p class="text-dark">Email : booking@example.com</p>
        </div>
    </div>
</div>
<!-- welcome Section End -->

<!-- CONTACT Section2 Begin -->
<section class="about_sec2 about_sectionBg py-4">
    <img class="pattern2" src="{{ url('frontend/img/about/pattern2.png') }}" alt>
    <div class="container-fluid">
        <div class="row py-4 about_sec2_row">
            <div class="col-lg-6 y_aboutrestrarant_col2 contact_sec1">
                <div>
                    <div class="y_abouttext">
                        <h2>Get in Touch</h2>
                        <p>Please complete the form below and a member of team will be in contact with you shortly.</p>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="contact_form" action="{{ route('contactStore') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input placeholder="Your Name" type="text" class="form-control" id="name" name="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input placeholder="Your Email" type="email" class="form-control" id="email" name="email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input placeholder="Your Subject" type="text" class="form-control" id="subject" name="subject">
                            @error('subject')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea placeholder="Your Message" class="form-control" rows="5" id="message" name="message"></textarea>
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-5 y_contact_btn">
                            <button type="submit" class="Custom_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 p-0 d-flex justify-content-center">
                <img class="y_contact_img" src="{{ url('frontend/img/contact_sec2.png') }}" alt>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT Section2 End -->

<!-- CONTACT Section3 Begin -->
<section class="about_sec2 about_sectionBg py-4">
    <img class="backpattern" src="{{ url('frontend/img/about/pattern 1.png') }}" alt>
    <div class="container-fluid">
        <div class="row py-4 about_sec2_row">
            <div class="col-lg-8 col-md-6">
                <div class="d-flex justify-content-center">
                    {!! $location->map_link !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-center">
                <div>
                    <div class="y_abouttext">
                        <h2>Location</h2>
                        <p>{{ $address }}</p>
                        <div class="pt-3">
                            <a href="https://www.google.com/maps/place/Kalathiya+Infotech/@{{ $location->latitude }},{{ $location->longitude }},19z/data=!4m6!3m5!1s0x26cb5e4230fc8877:0xd36ccfe485cd6a01!8m2!3d{{ $location->latitude }}!4d{{ $location->longitude }}!16s%2Fg%2F11kbyh9bk6?hl=en&entry=ttu&g_ep=EgoyMDI0MTAyOS4wIKXMDSoASAFQAw%3D%3D" class="Custom_btn" target="_blank">Get Directions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT Section3 End -->
@endsection
