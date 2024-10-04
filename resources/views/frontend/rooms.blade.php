@extends('frontend.layouts.main')
@section('title', 'Rooms')
@section('main-container')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row m-0">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h1>Rooms</h1>
                    <div class="breadcrumb__links">
                        <a href="{{ route('index') }}">Home</a>
                        <span>Rooms </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<section class="roomsTitle spad2">
    <div class="container">
        <div class="row m-0  d-flex justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="section-title">
                    <h5 class="text-center">Over View</h5>
                    <p class="text-dark text-center">Lorem ipsum
                        dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore
                        et dolore magna
                        laboris nisi ut aliquip ex</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- section1 start -->
<!-- <section class="about_sec1 roomsSec1">
    <img class="pattern3" src="img/rooms/patern1.png" alt>
    <div class="roomsPosition">
        <div class="row m-0 pb-5">
            <div class="col-lg-7">
                <img src="{{ url('frontend/img/rooms/roomSec1.png') }}" alt="">
            </div>
        </div>
        <div class="static_box">
            <h1>Classic Room</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna
                laboris nisi ut aliquip exLorem ipsum dolor sit amet, </p>
        </div>
    </div>

</section> -->
<!-- section1 end -->


<!-- section2 start -->
<!-- <section class="about_sec1 roomsSec1 ">
    <img class="pattern4" src="{{ url('frontend/img/rooms/patern2.png') }}" alt>
    <div class="roomsPosition">
        <div class="row m-0 d-flex justify-content-end pb-5">
            <div class="col-lg-7">
                <img class="roomssection2_img" src="{{ url('frontend/img/rooms/roomSec2.png') }}" alt="">
            </div>
        </div>
        <div class="static_box2">
            <h1>Classic Room</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna
                laboris nisi ut aliquip exLorem ipsum dolor sit amet, </p>
        </div>
    </div>
</section> -->


<section class="about_sec1 roomsSec1">
    @foreach($roomTypesRooms as $index => $roomType)
        <div class="roomsPosition">
            @if($index % 2 === 0)
                <img class="pattern3" src="{{ url('frontend/img/rooms/patern1.png') }}" alt="">
                <div class="row m-0 pb-5">
                    <div class="col-lg-7">
                        @if($roomType->images->isNotEmpty())
                            <a href="{{ URL::to('/assets/upload/'.$roomType->images->first()->room_image) }}" data-title="{{ $roomType->room_name }}">
                                <img  style="height: 650px; width: 100%; object-fit: fill;" class=""  src="{{ URL::to('/assets/upload/'.$roomType->images->first()->room_image) }}" alt="{{ $roomType->room_name }}">
                            </a>
                        @else
                            <a class="avatar avatar-sm mr-2">
                                <img style="height: 650px; width: 100%; object-fit: fill;"  src="{{ URL::to('/assets/upload/imagen para todo.jpg') }}" alt="Default Image">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="static_box">
                    <h1>{{ $roomType->name }}</h1>
                    <p>{{ $roomType->description }}</p>
                </div>
            @else
                <img class="pattern4" src="img/rooms/patern1.png" alt="">
                <div class="row m-0 d-flex justify-content-end pb-5">
                    <div class="col-lg-7">
                        @if($roomType->images->isNotEmpty())
                            <a href="{{ URL::to('/assets/upload/'.$roomType->images->first()->room_image) }}" data-title="{{ $roomType->room_name }}">
                                <img style="height: 650px; width: 100%; object-fit: fill;"  class="roomssection2_img"  src="{{ URL::to('/assets/upload/'.$roomType->images->first()->room_image) }}" alt="{{ $roomType->room_name }}">
                            </a>
                        @else
                            <a class="avatar avatar-sm mr-2">
                                <img style="height: 650px; width: 100%; object-fit: fill;" src="{{ URL::to('/assets/upload/imagen para todo.jpg') }}" alt="Default Image">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="static_box2">
                    <h1>{{ $roomType->name }}</h1>
                    <p>{{ $roomType->description }}</p>
                </div>
            @endif
        </div>
    @endforeach
</section>



<!-- section2 end -->

<!-- section3 start -->
<!-- <section class="about_sec1 roomsSec1 ">
    <img class="pattern3" src="{{ url('frontend/img/rooms/patern1.png') }}" alt>
    <div class="roomsPosition">
        <div class="row m-0 pb-5">
            <div class="col-lg-7">
                <img src="{{ url('frontend/img/rooms/roomSec1.png') }}" alt="">
            </div>
        </div>
        <div class="static_box">
            <h1>Classic Room</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna
                laboris nisi ut aliquip exLorem ipsum dolor sit amet, </p>
        </div>
    </div>

</section> -->
<!-- section3 end -->

<!-- section4 start -->
<!-- <section class="about_sec1 roomsSec1 ">
    <img class="pattern4" src="{{ url('frontend/img/rooms/patern2.png') }}" alt>
    <div class="roomsPosition">
        <div class="row m-0 d-flex justify-content-end pb-5">
            <div class="col-lg-7">
                <img class="roomssection2_img" src="{{ url('frontend/img/rooms/roomSec4.png') }}" alt="">
            </div>
        </div>
        <div class="static_box2">
            <h1>Classic Room</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna
                laboris nisi ut aliquip exLorem ipsum dolor sit amet, </p>
        </div>
    </div>
</section> -->
<!-- section4 end -->



<!-- section5 start -->
<!-- <section class="about_sec1 roomsSec1 ">
    <img class="pattern3" src="{{ url('frontend/img/rooms/patern1.png') }}" alt>
    <div class="roomsPosition">
        <div class="row m-0 pb-5">
            <div class="col-lg-7">
                <img src="{{ url('frontend/img/rooms/roomSec1.png') }}" alt="">
            </div>
        </div>
        <div class="static_box">
            <h1>Classic Room</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna
                laboris nisi ut aliquip exLorem ipsum dolor sit amet, </p>
        </div>
    </div>

</section> -->
<!-- section5 end -->


<!-- section6 start -->
<!-- <section class="about_sec1 roomsSec1 ">
    <img class="pattern4" src="{{ url('frontend/img/rooms/patern2.png') }}" alt>
    <div class="roomsPosition">
        <div class="row m-0 d-flex justify-content-end pb-5">
            <div class="col-lg-7">
                <img class="roomssection2_img" src="{{ url('frontend/img/rooms/roomSec6.png') }}" alt="">
            </div>


        </div>
        <div class="static_box2">
            <h1>Classic Room</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna
                laboris nisi ut aliquip exLorem ipsum dolor sit amet, </p>
        </div>
    </div>
</section> -->
<!-- section6 end -->
@endsection