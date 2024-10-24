@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Booking</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/booking/save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id">
                                        <option selected disabled> --Select Customer Name-- </option>
                                        @foreach ($user as $users)
                                            <option value="{{ $users->name }} {{ $users->lname }}"
                                                    {{ old('customer_id') == $users->name . ' ' . $users->lname ? 'selected' : '' }}>
                                                {{ $users->name }} {{ $users->lname }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Customer Email</label>
                                    <input type="email" class="form-control" id="customer_email" name="email" readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Customer Phone</label>
                                    <input type="number" class="form-control" id="customer_phone" name="phone_number" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select class="form-control @error('room_type_id') is-invalid @enderror" id="room_type_id" name="room_type_id">
                                        <option selected disabled> --Select Room Type-- </option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->id }}">{{ $item->room_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('room_type_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Number</label>
                                    <select class="form-control @error('room_number') is-invalid @enderror" id="room_number" name="room_number">
                                        <option selected disabled> --Select Room Number-- </option>
                                        <!-- Options will be dynamically populated here -->
                                    </select>
                                    @error('room_number')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Floor</label>
                                    <select class="form-control" id="floor_id" name="floor_id">
                                        <option selected disabled> --Select Floor-- </option>
                                        <!-- Options will be dynamically populated here if needed -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Non-AC</label>
                                    <input type="text" class="form-control" id="non_ac" name="ac_non_ac" readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bed Count</label>
                                    <input type="text" class="form-control" id="bed_count" name="bed_count" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Rent</label>
                                    <input type="text" class="form-control" id="rent" name="rent" readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Members</label>
                                    <input type="number" class="form-control @error('total_numbers') is-invalid @enderror"name="total_numbers" value="{{ old('total_numbers') }}">
                                </div>
                                @error('total_numbers')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Booking Date</label>
                                    <div class="">
                                        <input type="date" id="booking_date" class="form-control @error('booking_date') is-invalid @enderror" name="booking_date" value="{{ old('booking_date') }}">
                                    </div>
                                </div>
                                @error('booking_date')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Booking Time</label>
                                    <div class="time-icon">
                                        <input type="time" class="form-control @error('time') is-invalid @enderror"  name="time" value="{{ old('time') }}">
                                    </div>
                                    @error('time')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror

                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Check In Date</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="">
                                                <input type="date" id="check_in_date" class="form-control @error('check_in_date') is-invalid @enderror" name="check_in_date" value="{{ old('check_in_date') }}">
                                            </div>
                                            @error('check_in_date')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4" style="margin-top: -32px">
                                            <label>Check In Time</label><input type="time" class="form-control @error('check_in_time') is-invalid @enderror"  name="check_in_time" id="check_in_time" value="{{ old('check_in_time') }}">
                                            @error('check_in_time')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Check Out Date</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="">
                                                <input type="date" id="check_out_date" class="form-control @error('check_out_date') is-invalid @enderror" name="check_out_date" value="{{ old('check_out_date') }}">
                                            </div>
                                            @error('check_out_date')
                                                    <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4" style="margin-top: -32px">
                                            <label>Check Out Time</label>
                                            <input type="time" class="form-control @error('check_out_time') is-invalid @enderror"  name="check_out_time" id="check_out_time" value="{{ old('check_out_time') }}">
                                            @error('check_out_time')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Hours</label>
                                    <input type="text" id="total_hours" name="total_hours" class="form-control" readonly>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" rows="5" id="message" name="message">{{ old('message') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Create Booking</button>
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

{{-- Auto Filed Display --}}
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
{{-- Calculate total Hours --}}
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkInDate = document.getElementById('check_in_date');
            const checkInTime = document.getElementById('check_in_time');
            const checkOutDate = document.getElementById('check_out_date');
            const checkOutTime = document.getElementById('check_out_time');
            const totalHoursField = document.getElementById('total_hours');

            function calculateTotalHours() {
                if (checkInDate.value && checkInTime.value && checkOutDate.value && checkOutTime.value) {
                    const checkInDateTime = new Date(`${checkInDate.value}T${checkInTime.value}`);
                    const checkOutDateTime = new Date(`${checkOutDate.value}T${checkOutTime.value}`);
                    const diffMs = checkOutDateTime - checkInDateTime;
                    if (diffMs > 0) {
                        const diffHours = diffMs / (1000 * 60 * 60);
                        totalHoursField.value = diffHours.toFixed(2);
                    } else {
                        totalHoursField.value = 'Invalid time range';
                    }
                } else {
                    totalHoursField.value = '';
                }
            }
            checkInDate.addEventListener('change', calculateTotalHours);
            checkInTime.addEventListener('change', calculateTotalHours);
            checkOutDate.addEventListener('change', calculateTotalHours);
            checkOutTime.addEventListener('change', calculateTotalHours);
        });
    </script>

    @endsection
@endsection
