@extends('frontend.layouts.main')
@section('title', 'About Us')
@section('main-container')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h1>About Us</h1>
                        <div class="breadcrumb__links">
                            <a href="{{ route('index') }}">Home</a>
                            <span>About Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- About Section1 Begin -->
    <section class="about_sec1 spad2">
        <img class="backpattern" src="{{ url('frontend/img/about/pattern 1.png') }}" alt>
        <div class="container">
            <div class="row  d-flex justify-content-center">
                <div class="col-lg-9">
                    <div class="section-title">
                        <p class="text-center">Welcome to our Hotel</p>
                        <h5 class="text-center d_none_md mb-0">Stay Once,</h5>
                        <h5 class="text-center d_none_md">Carry Memories Forever</h5>
                        <h5 class="text-center d_block_md">Stay Once, Carry Memories Forever</h5>
                        <p class="text-dark text-center">Lorem ipsum
                            dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore
                            et dolore magna
                            laboris nisi ut aliquip ex</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row about_sec1_row pb-5">
            <div class="col-lg-4 about_sec1_col d-flex justify-content-center">
                <img src="{{ url('frontend/img/about/aboutsec1_1.png') }}" alt>
            </div>
            <div class="col-lg-4 about_sec1_col d-flex justify-content-center">
                <img src="{{ url('frontend/img/about/aboutsec1_2.png') }}" alt>
            </div>
            <div class="col-lg-4 about_sec1_col d-flex justify-content-center">
                <img src="{{ url('frontend/img/about/aboutsec1_3.png') }}" alt>
            </div>
        </div>
    </section>
    <!-- About Section1 End -->

    <!-- About Section2 Begin -->
    <section class="about_sec2 about_sectionBg spad">
        <img class="pattern2" src="{{ url('frontend/img/about/pattern2.png') }}" alt="">
        <div class="container-fluid">
            @foreach($facilities as $section)
                <div class="row py-4 about_sec2_row">
                    @php
                        // Split the images into an array
                        $images = explode(',', $section->image);
                        // Get the first image for display
                        $firstImage = trim($images[0]);
                    @endphp

                    @if($loop->first) <!-- Check if it's the first iteration -->
                        <div class="col-lg-5 d-flex justify-content-center">
                            <img src="{{ asset('assets/facilities/' . $firstImage) }}" alt="{{ $section->name }}">
                        </div>
                        <div class="col-lg-7 y_aboutrestrarant_col2 d-flex align-items-center">
                            <div class="y_abouttext">
                                <h4>{{ $section->name }}</h4>
                                <h2>{{ $section->title }}</h2>
                                <p>{{ $section->description }}</p>
                            </div>
                        </div>
                    @elseif($loop->index == 1) <!-- Check if it's the second iteration -->
                        <div class="col-lg-7 y_aboutrestrarant_col2 d-flex align-items-center">
                            <div class="y_abouttext">
                                <h4>{{ $section->name }}</h4>
                                <h2>{{ $section->title }}</h2>
                                <p>{{ $section->description }}</p>
                            </div>
                        </div>
                        <div class="col-lg-5 d-flex justify-content-center">
                            <img src="{{ asset('assets/facilities/' . $firstImage) }}" alt="{{ $section->name }}">
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>



    <!-- About Section2 Begin -->


    <!-- About Section3 Begin -->
    <!-- <section class="about_sec1 spad">
        <img class="backpattern" src="img/about/pattern 1.png" alt>
        <div class="row about_sec1_row pb-5">
            <div class="col-lg-7 col-md-6">
                <div class="d-flex justify-content-center">
                    <img class="aboutsec4_img1" src="{{ url('frontend/img/about/sce3_1.png') }}" alt="">
                    <img class="aboutsec4_img2" src="{{ url('frontend/img/about/sce3_2.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-md-6  d-flex align-items-center">
                <div>
                    <div class=" y_abouttext">
                        <h4>Spa & Wellness</h4>
                        <h2>Refreshment for the
                            Body and Mind</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magnalaboris nisi ut aliquip exLorem ipsum
                            dolor sit.</p>
                    </div>
                </div>

            </div>
        </div>
    </section> -->
    
    <section class="about_sec1 spad">
        <img class="backpattern" src="img/about/pattern 1.png" alt="">
        <div class="row about_sec1_row pb-5">
            <div class="col-lg-7 col-md-6">
                <div class="d-flex justify-content-center">
                    @foreach($facilities as $facility)
                        @if($facility->name === 'Spa')
                            @php
                                // Split the image string into an array
                                $images = explode(',', $facility->image);
                            @endphp
                            @foreach($images as $index => $image)
                                @if($index < 2) {{-- Limit to first 2 images --}}
                                    <img class="{{ $index === 0 ? 'aboutsec4_img1' : 'aboutsec4_img2' }}" src="{{ asset('assets/facilities/' . trim($image)) }}" alt="{{ $facility->name }}">
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 col-md-6 d-flex align-items-center">
                <div>
                    <div class="y_abouttext">
                        <h4>{{ $facility->name }}</h4> <!-- Display Facility Name (e.g., Spa & Wellness) -->
                        <h2>{{ $facility->title }}</h2> <!-- Assuming you have a subtitle field -->
                        <p>{{ $facility->description }}</p> <!-- Facility description from the database -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section3 End -->

    <section class="about_sec1 about_sectionBg spad2">
        <img class="pattern2" src="{{ url('frontend/img/about/pattern2.png') }}" alt="">
            @foreach ($fitnessFacilities as $facility)
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-9">
                            <div class="section-title">
                                <p class="text-center">{{$facility->name}}</p>
                                <h5 class="text-center d_none_md mb-0">{{$facility->title}}</h5>
                                <h5 class="text-center d_block_md">Fitness First, Everything Else Later</h5>
                                <p class="text-dark text-center">
                                {{ $facility->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row about_sec1_row pb-5">
                    @php
                        $images = explode(',', $facility->image); // Assuming $facility->image holds the comma-separated image names
                        $imagesToShow = array_slice($images, 0, 3); // Get only the first 3 images
                    @endphp
                    @foreach ($imagesToShow as $image)
                        <div class="col-lg-4 about_sec1_col d-flex justify-content-center">
                            <img src="{{ asset('assets/facilities/' . trim($image)) }}" alt="{{ $facility->name }}" class="img-fluid">
                        </div>
                    @endforeach
                </div>
            @endforeach
    </section>

    <!-- About Section4 End -->



    <!-- About Section5 Begin -->
    <section class="about_sec1 spad">
        <img class="backpattern" src="{{ url('frontend/img/about/pattern 1.png') }}" alt>
        @foreach($indoorPoolFacilities as $facility)
            <div class="row about_sec1_row pb-5">
                <div class="col-lg-5 col-md-6  d-flex align-items-center">
                    <div>
                        <div class="y_abouttext">
                            <h4>{{ $facility->name }}</h4>
                            <h2>{{ $facility->title }}</h2>
                            <p> {{ $facility->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="d-flex justify-content-center">
                            @if($facility->name === 'Indoor Pool')
                                @php
                                    // Split the image string into an array
                                    $images = explode(',', $facility->image);
                                @endphp
                                @foreach($images as $index => $image)
                                    @if($index < 2) {{-- Limit to first 2 images --}}
                                        <img class="{{ $index === 0 ? 'aboutsec4_img1' : 'aboutsec4_img2' }}" src="{{ asset('assets/facilities/' . trim($image)) }}" alt="{{ $facility->name }}">
                                    @endif
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection