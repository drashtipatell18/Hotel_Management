@extends('frontend.layouts.main')
@section('title', 'Offer Package')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .d_box {
        position: relative;
        overflow: hidden;
    }

    .d_night {
        position: relative;
        z-index: 0;
    }
</style>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row m-0">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h1>Offers & Packages</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- About Section1 Begin -->
<section class="about_sec1 spad2">
    <div class="d_container p-0">
        <div class="row px-5 m-0  d-flex justify-content-center">
            <div class="col-lg-9 p-0">
                <div class="section-title">
                    <!-- <p class="text-center">Weekend Gateway</p> -->
                    <h5 class="text-center ">Weekend Gateway</h5>
                    <div class="d-flex justify-content-center align-items-center offer_haed">
                        <i class="y_offer_sec_i fa-solid fa-tag px-2"></i>
                        <p class="text-dark mb-0 y_offer_sec_p">10 % savings on
                            Booking 2 Nights on Fri, Sat or Sun.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-5 m-0 p-0  pb-5">
            <div class="col-lg-4 about_sec1_col d-flex justify-content-center">
                <img src="{{ url('frontend/img/room1.png') }}" alt>
            </div>
            <div class="col-lg-4 about_sec1_col d-flex justify-content-center">
                <img src="{{ url('frontend/img/room1.png') }}" alt>
            </div>
            <div class="col-lg-4 about_sec1_col d-flex justify-content-center">
                <img src="{{ url('frontend/img/room1.png') }}" alt>
            </div>
        </div>
        <div class="row m-0  d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="section-title">
                    <!-- <p class="text-center">Weekend Gateway</p> -->
                    <h5 class="text-center ">Offer Details</h5>
                </div>
                <p class="text-start">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sollicitudin
                    facilisis consequat. Sed in est sed dui maximus tempor. Donec ullamcorper volutpat dolor ac posuere.
                    Vivamus commodo lacus ac ornare tincidunt. Vivamus in lectus orci. Fusce sit amet consectetur nulla.
                </p>
                <p class="text-start">Maecenas non arcu neque. Nam iaculis, nulla pulvinar bibendum accumsan, nulla
                    sapien vestibulum mi, nec interdum velit quam suscipit eros. In vitae lorem mi. Ut nec leo nec augue
                    congue bibendum. Maecenas rutrum nibh gravida enim fermentum consectetur.</p>

            </div>
        </div>

        <div class="row m-0  d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="section-title">
                    <!-- <p class="text-center">Weekend Gateway</p> -->
                    <h5 class="text-center ">Offer Includes</h5>
                </div>
                <p class="text-start">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sollicitudin
                    facilisis consequat. Sed in est sed dui maximus tempor. Donec ullamcorper volutpat dolor ac posuere.
                    Vivamus commodo lacus ac ornare tincidunt. Vivamus in lectus orci. Fusce sit amet consectetur nulla.
                </p>
                <p class="text-start">Maecenas non arcu neque. Nam iaculis, nulla pulvinar bibendum accumsan, nulla
                    sapien vestibulum mi, nec interdum velit quam suscipit eros. In vitae lorem mi. Ut nec leo nec augue
                    congue bibendum. Maecenas rutrum nibh gravida enim fermentum consectetur.</p>

            </div>
        </div>
    </div>

</section>
<!-- About Section1 End -->

<section class="d_p-25 d_room">
    <div class="d_container">
        <div class="row m-0  d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="section-title mb-0">
                    <h5 class="text-center ">Rooms Eligible For Offer</h5>
                </div>
            </div>
        </div>
        <div class="row m-0 g-lg-5 g-4 m-0">
            @foreach($availableRooms as $offerRoom)
                <div class="col-xs-12 col-sm-6">
                    <div class="d_box position-relative">
                    @if($offerRoom->offer && $offerRoom->offer->discount_value)
                            <div class="d_ribbon">{{ $offerRoom->offer->discount_value }}% Saving</div>
                    @endif
                        <div class="d_img">
                            @if($offerRoom->images->isNotEmpty())
                                <img src="{{ url('assets/upload/' . $offerRoom->images->first()->image) }}"
                                    alt="{{ $offerRoom->room_name }}">
                            @else
                                <img src="{{ url('path/to/default/image.jpg') }}" alt="{{ $offerRoom->room_name }}">
                            @endif
                        </div>
                        <div class="d_night">
                            <div class="d_price">
                                <h6>${{ $offerRoom->rent }}/ Night</h6>
                            </div>
                        </div>
                        <div class="d_content">
                            <div class="d_icon d-flex align-items-center">
                                <div class="d-flex align-items-center me-3">
                                    <img src="{{ url('frontend/img/d_img/icon1.png') }}" class="me-2" alt="">
                                    <div class="d_icondesc">{{ $offerRoom->room_size }}</div>
                                </div>
                                <div class="d-flex align-items-center me-3">
                                    <img src="{{ url('frontend/img/d_img/icon2.png') }}" class="me-2" alt="">
                                    <div class="d_icondesc">Guests</div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{ url('frontend/img/d_img/bedroom.png') }}" class="me-2" alt="">
                                    <div class="d_icondesc">{{ $offerRoom->bed_type }}</div>
                                </div>
                            </div>
                            <div class="row m-0 g-2 mt-1 align-items-center">
                                <div class="col-12 col-lg-8 p-0">
                                    <h3>{{ $offerRoom->room_name }}</h3>
                                </div>
                                <div class="col-12 col-lg-1 p-0"></div>
                                <div class="col-12 col-lg-3 p-0">
                                <div class="d_cta">
                                    <a href="javascript:void(0);" class="d-block text-center reserve-btn" data-room-id="{{ $offerRoom->id }}">Reserve</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.reserve-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const roomId = this.getAttribute('data-room-id');
            window.location.href = `/booknow/${roomId}`;
        });
    });
})
</script>


