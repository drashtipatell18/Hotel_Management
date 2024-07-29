@extends('layouts.master')
@section('content')
    <style>
        .avatar {
            background-color: #aaa;
            border-radius: 50%;
            color: #fff;
            display: inline-block;
            font-weight: 500;
            height: 38px;
            line-height: 38px;
            margin: -38px 10px 0 0;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            vertical-align: middle;
            width: 38px;
            position: relative;
            white-space: nowrap;
            z-index: 2;
        }
    </style>
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Edit Booking</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/booking/update',$bookingEdit->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id">
                                        <option selected disabled> --Select Customer Name-- </option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->name }}" {{ old('customer_id', $bookingEdit->customer_id) == $user->name ? 'selected' : '' }}>
                                            {{ $user->name }} {{ $user->lname }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Customer Email</label>
                                    <input type="email" class="form-control" id="customer_email" name="email" value="{{ $bookingEdit->email }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Customer Phone</label>
                                    <input type="tel" class="form-control" id="customer_phone" name="phone_number" value="{{ $bookingEdit->phone_number }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select class="form-control @error('room_type_id') is-invalid @enderror" id="room_type_id" name="room_type_id">
                                        <option selected disabled> --Select Room Type-- </option>
                                        @foreach ($roomTypes as $roomType)
                                            <option value="{{ $roomType->id }}" {{ old('room_type_id', $bookingEdit->room_type_id) == $roomType->id ? 'selected' : '' }}>
                                                {{ $roomType->room_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="room_number">Room Number</label>
                                    <select class="form-control @error('room_number') is-invalid @enderror" id="room_number" name="room_number">
                                        @foreach ($roomNumbers as $roomNumber)
                                            <option value="{{ $roomNumber }}"
                                                    {{ old('room_number', $bookingEdit->room_number) == $roomNumber ? 'selected' : '' }}>
                                                {{ $roomNumber }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('room_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="floor_id">Floor</label>
                                    <select class="form-control" id="floor_id" name="floor_id">
                                        <option value="" disabled> --Select Floor-- </option>
                                        @foreach($floors as $floorId => $floorName)
                                            <option value="{{ $floorId }}" {{ old('floor_id', $bookingEdit->floor_id) == $floorId ? 'selected' : '' }}>
                                                {{ $floorName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Non-AC</label>
                                    <input type="text" class="form-control" id="non_ac" name="ac_non_ac" value="{{ old('ac_non_ac', $bookingEdit->ac_non_ac) }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bed Count</label>
                                    <input type="text" class="form-control" id="bed_count" name="bed_count" value="{{ old('bed_count', $bookingEdit->bed_count) }}" readonly>
                                </div>
                            </div>

                           <div class="col-md-4">
                                <div class="form-group">
                                    <label>Rent</label>
                                    <input type="text" class="form-control" id="rent" name="rent" value="{{ old('rent', $bookingEdit->rent) }}" readonly>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Members</label>
                                    <input class="form-control" type="number" name="total_numbers" value="{{ $bookingEdit->total_numbers }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Booking Date</label>
                                    <div class="">
                                        <input type="date" id="booking_date" class="form-control" name="booking_date" value="{{ $bookingEdit->booking_date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Time</label>
                                    <div class="time-icon">
                                        <input type="text" class="form-control" id="datetimepicker3" name="time" value="{{ $bookingEdit->time }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Check In Date</label>
                                    <div class="">
                                        <input type="date" id="check_in_date" class="form-control" name="check_in_date" value="{{ $bookingEdit->check_in_date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Check out Date</label>
                                    <div class="">
                                        <input type="date" id="check_out_date" class="form-control" name="check_out_date" value="{{ $bookingEdit->check_out_date }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="5" id="message" name="message">{{ $bookingEdit->message }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit">Update</button>
                <a href="{{ route('form/allbooking') }}"  type="submit" class="btn btn-secondary  padding:10px" style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
            </form>
        </div>
    </div>
    @section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var currentDate = new Date();
            var formattedCurrentDate = currentDate.toISOString().split('T')[0];
            var selectElement = document.getElementById('booking_date');
            selectElement.setAttribute('min', formattedCurrentDate);
        });
        document.addEventListener('DOMContentLoaded', function() {
            var currentDate = new Date();
            var formattedCurrentDate = currentDate.toISOString().split('T')[0];
            var selectElement = document.getElementById('check_in_date');
            selectElement.setAttribute('min', formattedCurrentDate);
        });
        document.addEventListener('DOMContentLoaded', function() {
            var currentDate = new Date();
            var formattedCurrentDate = currentDate.toISOString().split('T')[0];
            var selectElement = document.getElementById('check_out_date');
            selectElement.setAttribute('min', formattedCurrentDate);
        });
    </script>
         <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('room_type_id').addEventListener('change', function () {
                    var roomTypeId = this.value;
                    var roomNumberSelect = document.getElementById('room_number');
                    var floorSelect = document.getElementById('floor_id');

                    if (roomTypeId) {
                        fetch(`/get-room-numbers/${roomTypeId}`)
                            .then(response => response.json())
                            .then(data => {
                                roomNumberSelect.innerHTML = '<option selected disabled> --Select Room Number-- </option>';

                                if (Object.keys(data).length > 0) {
                                    for (var id in data) {
                                        var option = document.createElement('option');
                                        option.value = id;
                                        option.textContent = data[id];
                                        roomNumberSelect.appendChild(option);
                                    }
                                } else {
                                    var option = document.createElement('option');
                                    option.textContent = 'No rooms available';
                                    roomNumberSelect.appendChild(option);
                                }
                            })
                            .catch(error => console.error('Error fetching room numbers:', error));
                    } else {
                        roomNumberSelect.innerHTML = '<option selected disabled> --Select Room Number-- </option>';
                    }
                });

                document.getElementById('room_number').addEventListener('change', function () {
                    var roomId = this.value;
                    var floorSelect = document.getElementById('floor_id');
                    var nonAcField = document.getElementById('non_ac');
                    var bedCountField = document.getElementById('bed_count');
                    var rentField = document.getElementById('rent');

                    if (roomId) {
                        fetch(`/get-room-details/${roomId}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.error) {
                                    console.error(data.error);
                                    return;
                                }

                                floorSelect.innerHTML = `<option value="${data.floor_id}">${data.floor_name}</option>`;
                                nonAcField.value = data.nonAc;
                                bedCountField.value = data.bed_count;
                                rentField.value = data.rent;
                            })
                            .catch(error => console.error('Error fetching room details:', error));
                    } else {
                        floorSelect.innerHTML = '<option selected disabled> --Select Floor-- </option>';
                        nonAcField.value = '';
                        bedCountField.value = '';
                        rentField.value = '';
                    }
                });

                document.getElementById('customer_id').addEventListener('change', function () {
                    var customerName = this.value;
                    var customerEmailField = document.getElementById('customer_email');
                    var customerPhoneField = document.getElementById('customer_phone');

                    if (customerName) {
                        fetch(`/get-customer-details/${customerName}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.error) {
                                    console.error(data.error);
                                    return;
                                }

                                customerEmailField.value = data.email;
                                customerPhoneField.value = data.phone_number;
                            })
                            .catch(error => console.error('Error fetching customer details:', error));
                    } else {
                        customerEmailField.value = '';
                        customerPhoneField.value = '';
                    }
                });
            });
            </script>
    @endsection
@endsection
