@extends('frontend.layouts.main')
@section('title', 'Hotel Management: Spa')
@section('main-container')


<!-- Breadcrumb Begin -->
<div class="breadcrumb-option set-bg lazy-bg" data-setbg="{{ url('frontend/img/breadCram2.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h1>Bath & Spa</h1>
                    <div class="breadcrumb__links">
                        <!-- <a href="./index.html">Home</a> -->
                        <span>An elevated Spa experience</span>
                    </div>
                    <div class="mt-3">
                        <a href="{{ url('spabook') }}" class="Custom_btn4">Book Treatment</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<section class="spad">
    <div class="container">
        <div class="row  d-flex justify-content-center">
            <div class="col-lg-7">
                <div class="section-title">
                    <p class="text-dark text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- offer Section Begin -->
<section class="offer2 spad2">
    <div class="gallery__text mb-0">
        <div class="container Facilities">
            <div class="row  d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h5 class="text-center">Indulge in Luxury</h5>
                        <p class="text-dark text-center">Lorem ipsum
                            dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore
                            et dolore magna
                            laboris nisi ut aliquip ex</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d_container pb-5">
            <div class="row">
                @foreach($spas as $spa)
                    <div class="col-lg-4 p-0">
                        <div class="order__item">
                            <div class="Slider_image">
                                @php
                                    // Split the images by comma and get the first one
                                    $images = explode(',', $spa->image);
                                    $firstImage = trim($images[0]);
                                @endphp
                                <img class="image__img" src="{{ url('assets/spa/' . $firstImage) }}" alt="{{ $spa->name }}">
                                
                                <div class="image__overlay3 image__overlay3--primary">
                                    <a href="#" class="Custom_btn">Book Treatment</a>
                                </div>
                                <div class="image_onsection bg-light py-3">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <h4 class="text-center pb-2">{{$spa->name}}<br/>
                                            ${{$spa->price}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
            



</section>
<!-- offer Section End -->

<section class="count_section">
    <div class="container pt-lg-4 pb-lg-4">
        <div class="row py-lg-5 d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="count_imgbox p-2 d-flex justify-content-center">
                            <img src="{{ url('frontend/img/spa2_1.png') }}" alt="">
                        </div>
                        <h3 class="text-center text-light spa_sec">Spa</h3>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="count_imgbox p-2 d-flex justify-content-center">
                            <img src="{{ url('frontend/img/spa2_2.png') }}" alt="">
                        </div>
                        <h3 class="text-center text-light spa_sec">+1 1234567890</h3>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="count_imgbox p-2 d-flex justify-content-center">
                            <img src="{{ url('frontend/img/spa2_3.png') }}" alt="">
                        </div>
                        <h3 class="text-center text-light spa_sec">18 and up</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Experience Section Begin -->
<section class="Experience spad ">
    <div class="gallery__text">
        <div class="container Facilities">
            <div class="row  d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title">
                        <h5 class="text-center">Roman Baths</h5>
                        <p class="text-dark text-center">Lorem ipsum
                            dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore
                            et dolore magna
                            laboris nisi ut aliquip ex</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="experince_slider owl-carousel">
        @foreach($RoomBaths as $spa) <!-- Assuming $spas is your collection of spa records -->
            <div class="gallery__item">
                <div class="Slider_image">
                    @php
                        // Split the images by comma and get the last one
                        $images = explode(',', $spa->image);
                        $lastImage = end($images); // Get the last image
                    @endphp
                    <img class="image__img" src="{{ url('assets/spa/' . trim($lastImage)) }}" alt="{{ $spa->name }}">
                    <div class="image__overlay2 image__overlay2--primary">
                        <h4 class="text-light">{{ $spa->name }}</h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- Experience Section End -->

@endsection
