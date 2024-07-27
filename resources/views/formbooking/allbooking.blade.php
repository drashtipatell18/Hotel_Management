@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Reservation</h4>
                            <a href="{{ route('form/booking/add') }}" class="btn btn-primary float-right veiwbutton ">Add Booking</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table class="datatable1 table table-stripped table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Customer Name</th>
                                            <th>Customer Phone</th>
                                            <th>Room Number</th>
                                            <th>Rent</th>
                                            <th>Total Members</th>
                                            <th>Booking Date</th>
                                            <th>Check in date</th>
                                            <th>Check out date</th>
                                            <th>Status</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allBookings as $bookings )
                                        <tr>
                                            <td>{{ $bookings->id }}</td>
                                            <td>{{ $bookings->customer_id }}</td>
                                            <td>{{ $bookings->phone_number }}</td>
                                            <td>{{ $bookings->room_number }}</td>
                                            <td>{{ $bookings->rent }}</td>
                                            <td>{{ $bookings->total_numbers }}</td>
                                            <td>{{ $bookings->booking_date }}</td>
                                            <td>{{ $bookings->check_in_date }}</td>
                                            <td>{{ $bookings->check_out_date }}</td>
                                            <td>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-sm toggle-status {{ $bookings->status == 'confirmed' ? 'bg-success-light' : 'bg-danger-light' }} mr-2"
                                                    data-id="{{ $bookings->id }}"
                                                    data-status="{{ $bookings->status }}">
                                                    {{ $bookings->status }}
                                                </a>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ url('form/booking/edit/' . $bookings->id) }}"
                                                    style="font-size: 23px; padding: 5px; color: #009688;">
                                                    <i class="fas fa-pencil-alt fa-xs"></i>
                                                </a>
                                                <a data-toggle="modal" data-target="#exampleModal{{ $bookings->id }}"
                                                    class="view-customer"
                                                    style="font-size: 23px; padding: 5px; color: #009688;">
                                                    <i class="fas fa-eye fa-xs"></i>
                                                </a>
                                                <a href="{{ route('booking.delete', ['id' => $bookings->id]) }}" onclick="return confirm('Are you sure you want to delete this Booking?');" style="font-size: 23px; padding: 5px; color: #009688;">
                                                    <i class="fas fa-trash fa-xs"></i>
                                                </a>
                                            </td>
                                        </tr>

                                          <!-- View Modal -->
                                          <div class="modal fade" id="exampleModal{{ $bookings->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document"
                                                style="max-width: 990px; width: 990px; height: 500px;">
                                                <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                    <div class="modal-header text-white"
                                                        style="background-color: #009688; color: white !important;">
                                                        <h5 class="modal-title" id="exampleModalLabel">Booking Details
                                                        </h5>
                                                        <button type="button" class="close text-white"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mt-4"
                                                        style="padding: 20px; height: calc(100% - 120px); overflow-y: auto;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6 class="text-muted">Booking Details</h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <p><strong>Name:</strong> <span
                                                                                id="customer-name">{{ $bookings->customer_id }}
                                                                        </span></p>
                                                                        <p><strong>Email:</strong> <span
                                                                                id="email">{{ $bookings->email }}</span>
                                                                        </p>
                                                                        <p><strong>Phone Number:</strong> <span
                                                                                id="phone">{{ $bookings->phone_number }}</span>
                                                                        </p>
                                                                        <p><strong>Room Type:</strong> <span
                                                                            id="floor-room_type">{{ $bookings->roomType->room_name }}</span>
                                                                        </p>
                                                                        <p><strong>Room Number:</strong> <span
                                                                            id="room_number">{{ $bookings->room_number }}</span>
                                                                        </p>
                                                                        <p><strong>Floor:</strong> <span
                                                                            id="floor">{{ $bookings->floor->floor_name }}</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <p><strong>Ac/Non Ac:</strong> <span
                                                                            id="rent">{{ $bookings->ac_non_ac }}</span>
                                                                        </p>
                                                                        <p><strong>Bed Count:</strong> <span
                                                                            id="total_numbers">{{ $bookings->bed_count }}</span>
                                                                        </p>
                                                                        <p><strong>Rent:</strong> <span
                                                                            id="time">{{ $bookings->rent }}</span>
                                                                        </p>
                                                                        <p><strong>Total Members:</strong> <span
                                                                            id="time">{{ $bookings->total_numbers }}</span>
                                                                        </p>
                                                                        <p><strong>Booking Date:</strong> <span
                                                                            id="time">{{ $bookings->booking_date }}</span>
                                                                        </p>
                                                                        <p><strong>Booking Time:</strong> <span
                                                                            id="time">{{ $bookings->time }}</span>
                                                                        </p>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <p><strong>Check in Date:</strong> <span
                                                                            id="rent">{{ $bookings->check_in_date }}</span>
                                                                        </p>
                                                                        <p><strong>Check out Date:</strong> <span
                                                                            id="total_numbers">{{ $bookings->check_out_date }}</span>
                                                                        </p>
                                                                        <p><strong>Message:</strong> <span
                                                                            id="time">{{ $bookings->message }}</span>
                                                                        </p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-light mb-1" style="height: 60px;">
                                                        <button type="button" class="btn btn-info"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Model --}}

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script>
            $(document).ready(function() {
                $('.datatable1').DataTable();
                $('.toggle-status').click(function() {
                    var bookingId = $(this).data('id');
                    var currentStatus = $(this).data('status');
                    var newStatus = currentStatus === 'confirmed' ? 'cancelled' : 'confirmed';
                    var button = $(this);

                    $.ajax({
                        url: '{{ route('update.booking.status') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            booking_id: bookingId,
                            status: newStatus
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                button.data('status', response.new_status);
                                button.text(response.new_status);

                                // Update button classes
                                if (response.new_status === 'confirmed') {
                                    button.removeClass('bg-danger-light').addClass(
                                        'bg-success-light');
                                } else {
                                    button.removeClass('bg-success-light').addClass(
                                        'bg-danger-light');
                                }
                            }
                        }
                    });
                });
            });
        </script>
    @endsection
@endsection
