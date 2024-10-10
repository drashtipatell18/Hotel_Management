@extends('layouts.master')
@section('content')
    <style>
        #clock-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        #clock {
            width: 85px;
            /* Compact size */
            height: 85px;
            border: 3px solid #009688;
            /* Main border color */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle, rgba(0, 150, 136, 0.9) 0%, rgba(0, 150, 136, 0.5) 70%);
            color: rgba(255, 255, 255, 0.836);
            font-size: 16px;
            /* Smaller font size for digits */
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
            /* Subtle text shadow */
            box-shadow: 0 0 10px rgba(0, 150, 136, 0.8);
            /* Glow effect */
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out, background 0.3s ease-in-out;
            position: relative;
            /* For positioning pseudo-element */
        }

        #clock:hover {
            transform: scale(1.05);
            /* Slight zoom on hover */
            box-shadow: 0 0 20px rgba(0, 150, 136, 1);
            /* Enhanced glow effect on hover */
            background: radial-gradient(circle, rgba(0, 150, 136, 1) 0%, rgba(0, 150, 136, 0.6) 70%);
            /* Darker gradient on hover */
        }

        #clock:before {
            content: "";
            position: absolute;
            width: 100%;
            /* Full size to remove the border effect */
            height: 100%;
            border-radius: 50%;
            border: none;
            /* Remove the inner border */
            box-shadow: inset 0 0 0 rgba(255, 255, 255, 0);
            /* Remove the inner glow */
        }
    </style>


    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Customer</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/addcustomer/save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>First Name</label>

                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror


                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Last Name</label>

                                            <input type="text" class="form-control @error('lname') is-invalid @enderror"
                                                name="lname" value="{{ old('lname') }}">
                                            @error('lname')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>

                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Birth Date</label>
                                            <div class="">

                                                <input type="date"
                                                    class="form-control @error('date') is-invalid @enderror"name="date"
                                                    value="{{ old('date') }}">
                                                @error('date')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="male" value="male"
                                                        {{ old('gender') == 'male' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="genderMale">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="female" value="female"
                                                        {{ old('gender') == 'female' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="genderFemale">Female</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="other" value="other"
                                                        {{ old('gender') == 'other' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="genderOther">Other</label>
                                                </div>
                                                @error('gender')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Phone</label>

                                            <input type="number"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                name="phone_number" value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Profile Pic</label>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="fileupload"
                                                            onchange="previewImage(event, 'profilePicPreview')">
                                                        <input type="hidden" class="form-control" name="hidden_fileupload">
                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                            @error('fileupload')
                                                                <div class="error text-danger">{{ $message }}</div>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="#">
                                                        <img id="profilePicPreview" class="avatar-img"
                                                            style="width: 50px; height: 50px; object-fit: cover;">

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Address (Proof) - Aadharcard</label>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="aadharcard"
                                                            name="aadharcard"
                                                            onchange="previewImage(event, 'aadharcardPreview')">
                                                        <input type="hidden" class="form-control"
                                                            name="hidden_fileupload">
                                                        <label class="custom-file-label" for="aadharcard">Choose
                                                            file</label>
                                                            @error('aadharcard')
                                                                <div class="error text-danger">{{ $message }}</div>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="#">
                                                        <img id="aadharcardPreview" class="avatar-img"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Room Type</label>
                                            <select class="form-control @error('room_type') is-invalid @enderror"
                                                id="sel2" name="room_type">
                                                <option selected disabled> --Select Room Type-- </option>
                                                @foreach ($data as $items)
                                                    <option value="{{ $items->room_name }}">{{ $items->room_name }}
                                                    </option>
                                                @endforeach
                                                @error('room_type')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Total Members</label>

                                            <input type="number"
                                                class="form-control @error('total_numbers') is-invalid @enderror"name="total_numbers"
                                                value="{{ old('total_numbers') }}">
                                            @error('total_numbers')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror


                                        </div>
                                    </div>



                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Time</label>
                                            <div class="time-icon">
                                                <input type="time"
                                                    class="form-control @error('time') is-invalid @enderror"
                                                    id="datetimepicker3" name="time" value="{{ old('time') }}">
                                                @error('time')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group">

                                            <div class="time-icon" id="clock-container">
                                                <div id="clock"></div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Arrival Date</label>
                                            <div class="">

                                                <input type="date"
                                                    class="form-control @error('arrival_date') is-invalid @enderror"
                                                    name="arrival_date" value="{{ old('arrival_date') }}">
                                                @error('arrival_date')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                @enderror


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Depature Date</label>
                                            <div class="">

                                                <input type="date"
                                                    class="form-control @error('depature_date') is-invalid @enderror"
                                                    name="depature_date" value="{{ old('depature_date') }}">
                                                @error('depature_date')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>

                                            <textarea class="form-control @error('address') is-invalid @enderror" rows="5" id="message" name="address"
                                                value="{{ old('address') }}"></textarea>
                                            @error('address')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Create Customer</button>
            </form>
        </div>
    </div>
@endsection
<script>
    function previewImage(event, previewElementId) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById(previewElementId);
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // Format the time as HH:MM:SS
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var currentTime = hours + ':' + minutes + ':' + seconds;

        // Update the clock div
        document.getElementById('clock').innerText = currentTime;
    }

    // Call the updateClock function every 1000ms (1 second)
    setInterval(updateClock, 1000);

    // Initial call to display the clock immediately
    updateClock();
</script>
