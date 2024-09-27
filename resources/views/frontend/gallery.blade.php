@extends('frontend.layouts.main')
@section('title', 'Gallery')
@section('main-container')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h1>Gallery</h1>
                        <div class="breadcrumb__links">
                            <a href="./index.html" class="text-decoration-none">Home</a>
                            <span>Gallery</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <section class="d_p-25 d_gallery mt-3">
        <div class="d_container">
            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna
                laboris nisi ut aliquip ex</p>
            <div class="nav-tabs d-flex justify-content-between mt-5">
                <button class="tab active" data-category="all">All</button>
                <button class="tab" data-category="hotel-ground">Hotel & Ground</button>
                <button class="tab" data-category="rooms-suites">Rooms & Suites</button>
                <button class="tab" data-category="fitness-center">Fitness Center</button>
                <button class="tab" data-category="restaurant-bar">Restaurant & Bar</button>
                <button class="tab" data-category="indoor-pool">Indoor Pool</button>
            </div>
            <div class="image-gallery" id="imageGallery1">
                <div class="row g-3 px-sm-2 p-0">
                    <div class="col-12 col-lg-6 my-2">
                        <div class="image-item h-100" data-category="hotel-ground" data-index="0">
                            <img src="{{ url('frontend/img/d_img/gallery1.png') }}" alt="Hotel & Ground">
                            <div class="d_image-overlay">
                                <p>Lorem ipsum dolor sit amet...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 my-2">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <div class="image-item d_sub" data-category="rooms-suites" data-index="1">
                                    <img src="{{ url('frontend/img/d_img/gallery2.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="image-item d_sub" data-category="fitness-center" data-index="2">
                                    <img src="{{ url('frontend/img/d_img/galley3.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p> ipsum </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="image-item d_sub" data-category="restaurant-bar" data-index="3">
                                    <img src="{{ url('frontend/img/d_img/gallery4.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="image-item d_sub" data-category="indoor-pool" data-index="4">
                                    <img src="{{ url('frontend/img/d_img/gallery5.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image-gallery my-3" id="imageGallery2">
                <div class="row g-3 px-sm-2 p-0">
                    <div class="col-12 col-lg-6 my-2">
                        <div class="row g-3 p-0">
                            <div class="col-12 col-sm-6">
                                <div class="image-item d_sub" data-category="rooms-suites" data-index="5">
                                    <img src="{{ url('frontend/img/d_img/gallery7.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="image-item d_sub" data-category="fitness-center" data-index="6">
                                    <img src="{{ url('frontend/img/d_img/gallery8.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="image-item d_sub" data-category="fitness-center" data-index="7">
                                    <img src="{{ url('frontend/img/d_img/gallery9.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="image-item d_sub" data-category="fitness-center" data-index="8">
                                    <img src="{{ url('frontend/img/d_img/gallery10.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 my-2">
                        <div class="image-item h-100" data-category="fitness-center" data-index="9">
                            <img src="{{ url('frontend/img/d_img/gallery6.png') }}" alt="Hotel & Ground">
                            <div class="d_image-overlay">
                                <p>Lorem ipsum dolor sit amet...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image-gallery" id="imageGallery3">
                <div class="row g-3 px-sm-2 p-0">
                    <div class="col-12 col-lg-6 my-2">
                        <div class="image-item h-100" data-category="hotel-ground" data-index="10">
                            <img src="{{ url('frontend/img/d_img/gallery11.png') }}" alt="Hotel & Ground">
                            <div class="d_image-overlay">
                                <p>Lorem ipsum dolor sit</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 my-2">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <div class="image-item d_sub" data-category="rooms-suites" data-index="11">
                                    <img src="{{ url('frontend/img/d_img/gallery12.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="image-item d_sub" data-category="fitness-center" data-index="12">
                                    <img src="{{ url('frontend/img/d_img/gallery13.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="image-item d_sub" data-category="restaurant-bar" data-index="13">
                                    <img src="{{ url('frontend/img/d_img/gallery14.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="image-item d_sub" data-category="indoor-pool" data-index="14">
                                    <img src="{{ url('frontend/img/d_img/gallery15.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popup Modal -->
    <div id="imageModal" class="d_modal">
        <span class="d_close">&times;</span>
        <div class="position-relative">
            <div class="owl-carousel owl-theme" id="test1">
                <!-- Carousel items will be dynamically inserted here -->
            </div>
            <div class="d_sildertext"></div>
        </div>
    </div>
@endsection