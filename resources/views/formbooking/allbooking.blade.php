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
                                            <th>Total Numbers</th>
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
                                                <div class="actions"> <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> </div>
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
                                            </td>

                                        </tr>
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
        });
    </script>
    @endsection
@endsection
