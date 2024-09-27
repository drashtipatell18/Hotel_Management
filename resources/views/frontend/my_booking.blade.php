@extends('frontend.layouts.main')
@section('title', 'My Booking')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<section class=" d_room spad2">
    <div class="d_container mb-4">
        <div class="row  d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="section-title">
                    <h5 class="text-center ">My Bookings</h5>
                </div>
            </div>
        </div>
        <div class="d_container">
            <div class="row">
                <div class="col-lg-6 col-md-12 pt-3">
                    <div class="booking_row">
                        <div class="booking_box">
                            <div class="booking_image">
                                <img src="{{ url('frontend/img/my_book1.png') }}" alt="Room Image">
                            </div>
                            <div class="booking_details">
                                <h2 class="booking_title">1 King Bed, Forest View, Loft Guest Room</h2>
                                <div class="booking_info">
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon1.png') }}" alt="Size Icon">
                                        <span>80m2</span>
                                    </div>
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon2.png') }}" alt="Guests Icon">
                                        <span>2 Guests</span>
                                    </div>
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon3.png') }}" alt="Bed Icon">
                                        <span>Double Bed</span>
                                    </div>
                                </div>
                                <div class="booking_text">
                                    <p><strong>Check in :</strong> 07/08/24</p>
                                    <p><strong>Check out :</strong> 08/08/24 (1 Night)</p>
                                    <p><strong>Guests :</strong> 1 Adult</p>
                                    <p><strong>Rooms :</strong> 1 Room</p>
                                    <p><strong>Status :</strong> <span class="status_confirmed">Confirmed</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 pt-3">
                    <div class="booking_row">
                        <div class="booking_box">
                            <div class="booking_image">
                                <img src="{{ url('frontend/img/my_book2.png') }}" alt="Room Image">
                            </div>
                            <div class="booking_details">
                                <h2 class="booking_title">1 King Bed, Forest View, Loft Guest Room</h2>
                                <div class="booking_info">
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon1.png') }}" alt="Size Icon">
                                        <span>80m2</span>
                                    </div>
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon2.png') }}" alt="Guests Icon">
                                        <span>2 Guests</span>
                                    </div>
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon3.png') }}" alt="Bed Icon">
                                        <span>Double Bed</span>
                                    </div>
                                </div>
                                <div class="booking_text">
                                    <p><strong>Check in :</strong> 07/08/24</p>
                                    <p><strong>Check out :</strong> 08/08/24 (1 Night)</p>
                                    <p><strong>Guests :</strong> 1 Adult</p>
                                    <p><strong>Rooms :</strong> 1 Room</p>
                                    <p><strong>Status :</strong> <span
                                            class="status_confirmed text-danger">Cancelled</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 col-md-12 pt-3">
                    <div class="booking_row">
                        <div class="booking_box">
                            <div class="booking_image">
                                <img src="{{ url('frontend/img/my_book2.png') }}" alt="Room Image">
                            </div>
                            <div class="booking_details">
                                <h2 class="booking_title">1 King Bed, Forest View, Loft Guest Room</h2>
                                <div class="booking_info">
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon1.png') }}" alt="Size Icon">
                                        <span>80m2</span>
                                    </div>
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon2.png') }}" alt="Guests Icon">
                                        <span>2 Guests</span>
                                    </div>
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon3.png') }}" alt="Bed Icon">
                                        <span>Double Bed</span>
                                    </div>
                                </div>
                                <div class="booking_text">
                                    <p><strong>Check in :</strong> 07/08/24</p>
                                    <p><strong>Check out :</strong> 08/08/24 (1 Night)</p>
                                    <p><strong>Guests :</strong> 1 Adult</p>
                                    <p><strong>Rooms :</strong> 1 Room</p>
                                    <p><strong>Status :</strong> <span
                                            class="status_confirmed text-danger">Cancelled</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 pt-3">
                    <div class="booking_row">
                        <div class="booking_box">
                            <div class="booking_image">
                                <img src="{{ url('frontend/img/my_book1.png') }}" alt="Room Image">
                            </div>
                            <div class="booking_details">
                                <h2 class="booking_title">1 King Bed, Forest View, Loft Guest Room</h2>
                                <div class="booking_info">
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon1.png') }}" alt="Size Icon">
                                        <span>80m2</span>
                                    </div>
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon2.png') }}" alt="Guests Icon">
                                        <span>2 Guests</span>
                                    </div>
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon3.png') }}" alt="Bed Icon">
                                        <span>Double Bed</span>
                                    </div>
                                </div>
                                <div class="booking_text">
                                    <p><strong>Check in :</strong> 07/08/24</p>
                                    <p><strong>Check out :</strong> 08/08/24 (1 Night)</p>
                                    <p><strong>Guests :</strong> 1 Adult</p>
                                    <p><strong>Rooms :</strong> 1 Room</p>
                                    <p><strong>Status :</strong> <span class="status_confirmed">Confirmed</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush