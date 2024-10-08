@extends('frontend.layouts.main')
@section('title', 'Contact Us')
@section('main-container')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h1>Contact us</h1>
                    <div class="breadcrumb__links">
                        <a href="{{ route('index') }}">Home</a>
                        <span>Contact us </span>
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
        <div class="row  py-4 about_sec2_row">
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
                        <input placeholder="Your Name" type="text" class="form-control" id="name" name="name">
                        <input placeholder="Your Email" type="email" class="form-control" id="email" name="email">
                        <input placeholder="Your Subject" type="subject" class="form-control" id="subject" name="subject">
                        <textarea placeholder="Your Message" class="form-control" rows="5" id="message" 
                            name="message"></textarea>
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
<!-- CONTACT Section2 Begin -->

<!-- CONTACT Section3 Begin -->
<section class="about_sec2 about_sectionBg py-4">
    <img class="backpattern" src="{{ url('frontend/img/about/pattern 1.png') }}" alt>
    <div class="container-fluid">
        <div class="row py-4 about_sec2_row">
            <div class="col-lg-8 col-md-6">
                <div class="d-flex justify-content-center">
                    <iframe class="y_con_location"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14877.287421451878!2d72.8858624!3d21.219082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1724393202474!5m2!1sen!2sin"
                        width="786" height="702" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-6  d-flex align-items-center">
                <div>
                    <div class=" y_abouttext">
                        <h2>Location</h2>
                        <p>330 Kling Ford, Lake Denitaside,
                            United States</p>
                        <div class="pt-3">
                            <a href="#" class="Custom_btn">Get Directions</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT Section3 Begin -->
 @endsection