@extends('frontend.layouts.main')

@section('main-container')

    <!-- Default Modal -->
    <div id="defaultModal" class="unique-modal" style="display: none;">
        <div class="unique-modal-content">
            <div class="row y_default_m_row">
                <span class="unique-close" onclick="closeModal()">&times;</span>
                <div class="col-lg-5 p-0 unique-modal-content_img">
                    <!-- <img class="unique-modal-content_img" src="{{ url('frontend/img/Welcom_popup.png') }}" alt=""> -->
                </div>
                <div class="col-lg-7 unique-modal-content_text">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <h5 class="text-center default_model_title">Sign up to get the latest news and Updates</h5>
                            <p class="text-center default_model_p">Join over 3,000 members to get weekly
                                updates and special deals only available via
                                email.</p>
                        </div>
                    </div>

                    <input class="welcom_mod_input" type="email" placeholder="Enter Your Email">
                    <div class="pt-3">
                        <button class="Custom_btn w-100 text-light"><a href="#"
                                class="text-light">Subscribe</a></button>

                    </div>
                    <p class="text-center pt-4">No, Thanks</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section Begin -->
    <section class=" set-bg" data-setbg="{{ url('frontend/img/hero.jpg') }}">
        <div class="Opacity_bg hero spad">
            <div class="container">
                <div class="row  m-0">
                    <div class="col-lg-12">
                        <div class="hero__text">
                            <h2>Simple, unique & Friendly</h2>
                            <h3>The forest paradise of warmth, tranquility
                                and restoration</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class>
                <div class="row m-0">
                    <div class="col-lg-12 ">
                        <form action="#" class="filter__form">
                            <div class="filter__form__item">
                                <div class="filter__form__datepicker d-flex">
                                    <div class="d-flex">
                                        <img class="icon_calendar" src="{{ url('frontend/img/calander.svg') }}" alt>
                                    </div>
                                    <div>
                                        <p class="Checkin mb-0">Check in</p>
                                        <input type="text" class="datepicker_pop check__in">
                                    </div>
                                </div>
                            </div>
                            <div class="filter__form__item">
                                <div class="filter__form__datepicker d-flex">
                                    <div class="d-flex">
                                        <img class="icon_calendar" src="{{ url('frontend/img/calander.svg') }}" alt>
                                    </div>
                                    <div>
                                        <p class="Checkin mb-0">Check Out</p>
                                        <input type="text" class="datepicker_pop check__in">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <img class="Guest_icon" src="{{ url('frontend/img/Guests.svg') }}" alt>
                                </div>
                                <div class="y_selecter">
                                    <p class="mb-0">Guests</p>
                                    <div class="guest-selector">
                                        <div class="selected-guests">
                                            <span id="guest-summary">1 Room,
                                                1 Adult, 0 Child</span>
                                        </div>
                                        <div class="guest-dropdown">
                                            <div class="d-flex justify-content-between">
                                                <span>Rooms</span>
                                                <div class="guest-item">
                                                    <button class="decrement" data-type="room">-</button>
                                                    <span id="room-count">1</span>
                                                    <button class="increment" data-type="room">+</button>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>Adults</span>
                                                <div class="guest-item">
                                                    <button class="decrement" data-type="adult">-</button>
                                                    <span id="adult-count">1</span>
                                                    <button class="increment" data-type="adult">+</button>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>Children</span>
                                                <div class="guest-item">
                                                    <button class="decrement" data-type="child">-</button>
                                                    <span id="child-count">1</span>
                                                    <button class="increment" data-type="child">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center hero_checkAvalibility">
                                <button class="Custom_btn" type="submit"><a href="{{ route('check-avilabilty') }}"
                                        class="text-decoration-none text-light">Check Availability</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Hero Section End -->
    <!-- welcome Section Begin -->
    <div class="chooseus chooseus2 spad">
        <img class="WelBackImg" src="{{ url('frontend/img/WelcommeBack.png') }}" alt>
        <div class="container">
            <div class="row  m-0 d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="chooseus__text">
                        <div class="section-title">
                            <h5>Welcome to our Luxury
                                Hotel of Newyork.</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip
                                ex</p>
                        </div>
                        <a href="{{ route('aboutus') }}" class="Custom_btn3">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome Section End -->

    <!-- service Section Begin -->
    <div class="service">
        <div class="service_opacity_bg">
            <div class="container service_container">
                <div class="row m-0 d-flex justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-title Service_sec">
                            <h5 class="text-light">Hotel Amenities</h5>
                        </div>
                        <div class="row m-0">
                            @if (!empty($amenities))
                                @foreach ($amenities as $amenity)
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-6 hotel_amelity_col pt-5">
                                        <div class="service_img">
                                            @if ($amenity && $amenity->image)
                                                <img src="{{ asset('assets/amenities/' . $amenity->image) }}"
                                                    alt="{{ $amenity->name }}">
                                            @else
                                                <img src="{{ asset('assets/amenities/default.png') }}"
                                                    alt="Default Image">
                                            @endif
                                            <p class="mb-0 text-center text-light">
                                                {{ $amenity->name ?? 'Unknown Amenity' }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center text-light">
                                    <p>No amenities available.</p>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service Section End -->

    <!-- Gallery Section Begin -->
    <section class="gallery spad2">
        <div class="gallery__text">
            <div class="container Facilities">
                <div class="row m-0  d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title">
                            <h5 class="text-center">Our Facilities</h5>
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
        <div class="gallery__slider owl-carousel">
            @foreach ($facilities as $facility)
                <div class="gallery__item">
                    <div class="Slider_image">
                        @if ($facility && $facility->image)
                            <img src="{{ asset('assets/facilities/' . $facility->image) }}" alt="{{ $facility->name }}">
                        @else
                            <img src="{{ asset('assets/facilities/default.png') }}" alt="Default Image">
                        @endif
                        <div class="image__overlay image__overlay--primary">
                            <div class="image__title">{{ $facility->name ?? 'Unknown Facility' }}</div>
                            <!-- <a href="#" class="Custom_btn">Book Now</a> -->
                            <p class="image__description">
                                {{ $facility->description ?? 'Unknown Facility' }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
    <!-- Gallery Section End -->

    <!-- rooms Section Begin -->
    <section class="rooms spad">
        <div class="gallery__text">
            <div class="container Facilities">
                <div class="row m-0  d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title">
                            <h5 class="text-center">Rooms & Suites</h5>
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
        <div class="order__slider owl-carousel">
            @foreach ($roomTypes as $roomType)
                <div class="order__item">
                    <div class="Slider_image">
                        @if ($roomType->images->isNotEmpty())
                            <img class="image__img"
                                src="{{ URL::to('/assets/upload/' . $roomType->images->first()->room_image) }}"
                                alt="{{ $roomType->room_name }}">
                        @else
<<<<<<< Updated upstream
                            <img class="image__img" src="{{ URL::to('/assets/upload/default.png') }}" alt="Default Image">
=======
                            <img class="image__img" src="{{ URL::to('/assets/upload/default.png') }}"
                                alt="Default Image">
>>>>>>> Stashed changes
                        @endif
                        <div class="image__overlay3 image__overlay3--primary">
                            <a href="{{ route('check-avilabilty') }}" class="Custom_btn">Reserve</a>
                        </div>
                        <div class="image_onsection bg-light py-3">
                            <h4 class="text-center pb-2">{{ $roomType->room_name }}</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                <p class="text-dark mb-0">${{ $roomType->base_price }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            <!-- Repeat other items as needed -->
        </div>

    </section>
    <!-- rooms Section End -->

    <!-- Experience Section Begin -->
    <section class="Experience spad2">
        <div class="gallery__text">
            <div class="container Facilities">
                <div class="row m-0  d-flex justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title">
                            <h5 class="text-center">Elevate Your
                                Experience</h5>
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
            <div class="gallery__item">
                <div class="Slider_image">
                    <img class="image__img" src="{{ url('frontend/img/experince2.jpg') }}" alt="Bricks">
                    <div class="image__overlay2 image__overlay2--primary">
                        <p class="image__description2">
                            Lorem ipsum dolor sit amet, consectetur
                            laboris nisi ut aliquip ex
                        </p>
                    </div>
                </div>
            </div>
            <div class="gallery__item">
                <div class="Slider_image">
                    <img class="image__img" src="{{ url('frontend/img/experince1.jpg') }}" alt="Bricks">
                    <div class="image__overlay2 image__overlay2--primary">
                        <p class="image__description2">
                            Lorem ipsum dolor sit amet, consectetur
                            laboris nisi ut aliquip ex
                        </p>
                    </div>
                </div>
            </div>
            <div class="gallery__item">
                <div class="Slider_image">
                    <img class="image__img" src="{{ url('frontend/img/experince2.jpg') }}" alt="Bricks">
                    <div class="image__overlay2 image__overlay2--primary">
                        <p class="image__description2">
                            Lorem ipsum dolor sit amet, consectetur
                            laboris nisi ut aliquip ex
                        </p>
                    </div>
                </div>
            </div>

            <!-- Repeat other items as needed -->
        </div>

    </section>
    <!-- Experience Section End -->

    <section class="count_section">
        <div class="container pt-lg-4 pb-lg-4">
            <div class="row m-0">
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="count_imgbox p-5">
                    <h2 class="text-center outlined-text"><?php echo $premiumRoomsCount ?? 0; ?></h2>
                        <h3 class="text-center text-light">Premium
                            Rooms</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="count_imgbox p-5">
                        <h2 class="text-center outlined-text"><?php echo $deluxeSuitesCount ?? 0; ?></h2>
                        <h3 class="text-center text-light">Deluxe
                            Suites</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="count_imgbox p-5">
                        <h2 class="text-center outlined-text"><?php echo $HoneymoonRoomsCount ?? 0; ?></h2>
                        <h3 class="text-center text-light">Honeymoon Suite Room</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="count_imgbox p-5">
                        <h2 class="text-center outlined-text"><?php echo $standardSuitesCount ?? 0; ?></h2>
                        <h3 class="text-center text-light">Standard double Room</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- offer Section Begin -->
    <section class="offer spad">
        <div class="gallery__text">
            <div class="container Facilities">
                <div class="row m-0  d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title">
                            <h5 class="text-center">Offers & Packages</h5>
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
        <div class="order__slider owl-carousel">
            <div class="order__item">
                <div class="Slider_image">
                    <img class="image__img" src="{{ url('frontend/img/offer1.png') }}" alt>
                    <div class="image__overlay3 image__overlay3--primary">
                        <a href="Offer_Package.html" class="Custom_btn">Learn More</a>
                    </div>
                    <div class="image_onsection bg-light py-3">
                        <h4 class="text-center pb-2">Weekend Gateway</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-tag px-2"></i>
                            <p class="text-dark mb-0">Book 2 Nights on Fri,
                                Sat or Sun. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order__item">
                <div class="Slider_image">
                    <img class="image__img" src="{{ url('frontend/img/offer2.png') }}" alt>
                    <div class="image__overlay3 image__overlay3--primary">
                        <a href="Offer_Package.html" class="Custom_btn">Learn More</a>
                    </div>
                    <div class="image_onsection bg-light py-3">
                        <h4 class="text-center pb-2">Weekend Gateway</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-tag px-2"></i>
                            <p class="text-dark mb-0">Book 2 Nights on Fri,
                                Sat or Sun. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order__item">
                <div class="Slider_image">
                    <img class="image__img" src="{{ url('frontend/img/offer3.png') }}" alt>
                    <div class="image__overlay3 image__overlay3--primary">
                        <a href="Offer_Package.html" class="Custom_btn">Learn More</a>
                    </div>
                    <div class="image_onsection bg-light py-3">
                        <h4 class="text-center pb-2">Weekend Gateway</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-tag px-2"></i>
                            <p class="text-dark mb-0">Book 2 Nights on Fri,
                                Sat or Sun. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order__item">
                <div class="Slider_image">
                    <img class="image__img" src="{{ url('frontend/img/offer4.png') }}" alt>
                    <div class="image__overlay3 image__overlay3--primary">
                        <a href="Offer_Package.html" class="Custom_btn">Learn More</a>
                    </div>
                    <div class="image_onsection bg-light py-3">
                        <h4 class="text-center pb-2">Weekend Gateway</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-tag px-2"></i>
                            <p class="text-dark mb-0">Book 2 Nights on Fri,
                                Sat or Sun. </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Repeat other items as needed -->
        </div>

    </section>
    <!-- offer Section End -->

    <!-- Testimonials Section Begin -->
    <section class="Testimonials pt-lg-5">
        <div class="Testimonial_back">
            <div class="gallery__text2">
                <div class="container Facilities">
                    <div class="row m-0  d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-title">
                                <h5 class="text-center">Happy Clients</h5>
                                <p class="text-dark text-center">Lorem ipsum
                                    dolor sit amet, consectetur adipiscing
                                    elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna
                                    laboris nisi ut aliquip ex</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonai__container">
                <div class="Testimonials_slider owl-carousel">
                    @foreach($clientReviews as $review)
                        <div class="gallery__item gallery__item2">
                            <div class="testimonial-container">
                                <div class="testimonial-box">
                                    <p class="testimonial-text">"{{ $review->description }}"</p>
                                </div>
                                <div class="testimonial-author">
                                    <img class="image__img" src="{{ URL::to('/assets/upload/'.$review->image) }}" alt="{{ $review->client_name }}">
                                    <div class="author-info">
                                        <h3>{{ $review->client_name }}</h3>
                                        <p>{{ $review->country }} {{$review->state}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Repeat other items as needed -->
                </div>
            </div>

        </div>
    </section>
    <!-- Experience Section End -->

    <!-- service Section Begin -->
    <div class="Newslatter">
        <div class="Newslatter_opacity_bg  pt-lg-5 pb-lg-5">
            <div class="container Newslatter_container ">
                <h1 class="text-light text-center">Subscribe to Our
                    Newsletter</h1>
                <h2 class="text-light text-center">Sign up to our
                    newsletter for exclusive offers. </h2>
                <div class="row m-0 d-flex justify-content-center">
                    <div class="col-lg-7 col-md-12 ">
                        <div class="pt-4 row m-0 newslater_input">
                            <div class="col-sm-8 col-12 p-0">
                                <input type="text" id="fname" name="firstname" placeholder="Email Address">
                            </div>
                            <div class="col-sm-4 col-12 d-flex justify-content-center align-items-center p-0">
                                <a href="#" class="Custom_btn2">Sign
                                    up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
