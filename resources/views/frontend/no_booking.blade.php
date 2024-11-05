@extends('frontend.layouts.main')
@section('title', 'Hotel Management: No Booking')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<section class="d_p-25 d_room">
    <div class="d_container mb-4">
        <div class="row  d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="section-title">
                    <h5 class="text-center ">My Bookings</h5>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
            <div>
                <div class="image-container">
                    <img src="{{ url('frontend/img/no_booking.png') }}" alt="No Bookings Available">
                </div>
                <h2 class="no_booking_h2 text-center">No Bookings Available</h2>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('index')}}" class="Custom_btn text-decoration-none">Back to Home</a>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush