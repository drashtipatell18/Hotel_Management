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
    <style>
        #clock-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }
        
        #clock {
            width: 85px; /* Compact size */
            height: 85px;
            border: 3px solid #009688; /* Main border color */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle, rgba(0, 150, 136, 0.9) 0%, rgba(0, 150, 136, 0.5) 70%);
            color: rgba(255, 255, 255, 0.836);
            font-size: 16px; /* Smaller font size for digits */
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4); /* Subtle text shadow */
            box-shadow: 0 0 10px rgba(0, 150, 136, 0.8); /* Glow effect */
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out, background 0.3s ease-in-out;
            position: relative; /* For positioning pseudo-element */
        }
        
        #clock:hover {
            transform: scale(1.05); /* Slight zoom on hover */
            box-shadow: 0 0 20px rgba(0, 150, 136, 1); /* Enhanced glow effect on hover */
            background: radial-gradient(circle, rgba(0, 150, 136, 1) 0%, rgba(0, 150, 136, 0.6) 70%); /* Darker gradient on hover */
        }
        
        #clock:before {
            content: "";
            position: absolute;
            width: 100%; /* Full size to remove the border effect */
            height: 100%;
            border-radius: 50%;
            border: none; /* Remove the inner border */
            box-shadow: inset 0 0 0 rgba(255, 255, 255, 0); /* Remove the inner glow */
        }
        
        
        
        </style>
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Edit Customer</h3> </div>
                </div>
            </div>
            <form action="{{ route('form/customer/update', $customerEdit->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ $customerEdit->name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="lname" value="{{ $customerEdit->lname }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $customerEdit->email }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Birth Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="date" value="{{ $customerEdit->date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                            {{ $customerEdit->gender == 'male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                            {{ $customerEdit->gender == 'female' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="other" value="other"
                                            {{ $customerEdit->gender == 'other' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $customerEdit->ph_number }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Profile Pic</label>
<<<<<<< Updated upstream
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="fileupload">
                                                <input type="hidden" class="form-control" name="hidden_fileupload" value="{{ $customerEdit->fileupload }}">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#">
                                                <img class="avatar-img rounded-circle" style="width:100px !important; height:100px !important;margin-top:-23px" src="{{ URL::to('/assets/upload/'.$customerEdit->fileupload) }}" alt="{{ $customerEdit->fileupload }}">
                                            </a>
                                        </div>
=======
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="fileupload" onchange="previewImage(event, 'profilePicPreview')">
                                        <input type="hidden" class="form-control" name="hidden_fileupload" value="{{ $customerEdit->fileupload }}">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
>>>>>>> Stashed changes
                                    </div>

                                </div>
                            </div>
                            
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label></label>
                                    <div class="">
                                        <a href="" class="avatar avatar-sm mr-2">
                                            <img id="profilePicPreview" class="avatar-img rounded" src="{{ URL::to('/assets/upload/' . $customerEdit->fileupload) }}" alt="{{ $customerEdit->fileupload }}" style="width: 70px; height: 70px; object-fit: cover;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Address (Proof) - Aadharcard</label>
<<<<<<< Updated upstream
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="aadharcard" name="aadharcard">
                                                <input type="hidden" class="form-control" name="hidden_fileupload" value="{{ $customerEdit->aadharcard }}">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#">
                                                <img class="avatar-img rounded-circle" style="width:100px !important; height:100px !important;margin-top:-23px" src="{{ URL::to('/assets/upload/'.$customerEdit->aadharcard) }}" alt="{{ $customerEdit->aadharcard }}">
                                            </a>
                                        </div>
=======
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="aadharcard" name="aadharcard" onchange="previewImage(event, 'profileaadharcard')">
                                        <input type="hidden" class="form-control" name="hidden_fileupload" value="{{ $customerEdit->aadharcard }}">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
>>>>>>> Stashed changes
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label></label>
                                    <div class="">
                                        <a href="" class="avatar avatar-sm mr-2">
                                            <img id="profileaadharcard" class="avatar-img rounded" src="{{ URL::to('/assets/upload/' . $customerEdit->aadharcard) }}" alt="{{ $customerEdit->aadharcard }}" style="width: 70px; height: 70px; object-fit: cover;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select class="form-control" id="sel2" name="room_type">
                                        @foreach($roomTypes as $roomType)
                                            <option value="{{ $roomType->room_name }}" {{ $customerEdit->room_type == $roomType->room_name ? 'selected' : '' }}>
                                                {{ $roomType->room_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Members</label>
                                    <input class="form-control" type="number" name="total_numbers" value="{{ $customerEdit->total_numbers }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Time</label>
                                    <div class="time-icon">
                                        <input type="text" class="form-control" id="datetimepicker3" name="time" value="{{ $customerEdit->time }}">
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
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="arrival_date" value="{{ $customerEdit->arrival_date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Depature Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="depature_date" value="{{ $customerEdit->depature_date }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" rows="5" id="address" name="address">{{ $customerEdit->address }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit">Update</button>
            </form>
        </div>
    </div>
    @section('script')
    <script>
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });
        </script>
      <script>
        function previewImage(event, previewElementId) {
            const reader = new FileReader();
            reader.onload = function(){
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
    
    @endsection
@endsection
