@extends('frontend.layouts.main')
@section('title', 'Hotel Management: My Booking')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .booking_image{
        display: flex;
    }
</style>
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
                @foreach ($checkouts as $checkout)
                <div class="col-lg-6 col-md-12 pt-3">
                    <div class="booking_row">
                        <div class="booking_box">
                            <div class="booking_image">
                                @if($checkout->room)
                                @if($checkout->room->images && count($checkout->room->images) > 0)
                                <img src="{{ asset('assets/upload/'.$checkout->room->images[0]->image) }}"
                                    alt="Room Image">
                                @else
                                <p>No images available for this room.</p>
                                @endif
                                @else
                                <p>No room details available.</p>
                                @endif
                            </div>
                            <div class="booking_details">
                                <h2 class="booking_title">{{ $checkout->room ? $checkout->room->room_name : 'No room name available' }}</h2>
                                <div class="booking_info">
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon1.png') }}" alt="Size Icon">
                                        <span>{{ $checkout->room ? $checkout->room->room_size : 'No size available' }}</span>
                                    </div>
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon2.png') }}" alt="Guests Icon">
                                        <span>{{ $checkout->booking ? $checkout->booking->member_count : 'No guest count available' }}</span>
                                    </div>
                                    <div class="info_item">
                                        <img src="{{ url('frontend/img/book_icon3.png') }}" alt="Bed Icon">
                                        <span>{{ $checkout->room ? $checkout->room->bed_type : 'No bed type available' }}</span>
                                    </div>
                                </div>
                                <div class="booking_text">
                                    @if($checkout->booking)
                                        <p><strong>Check in :</strong> {{ $checkout->booking->check_in_date }}</p>
                                        <p><strong>Check out :</strong> {{ $checkout->booking->check_out_date }}</p>
                                        <p><strong>Members :</strong> {{ $checkout->booking->member_count }}</p>
                                        <p><strong>Rooms :</strong> {{ $checkout->booking->room_count }}</p>
                                        <p><strong>Status :</strong> <span class="status_confirmed">{{ $checkout->status }}</span></p>
                                    @else
                                        <p>No booking details available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
