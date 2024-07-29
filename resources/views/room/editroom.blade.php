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
                        <h3 class="page-title mt-5">Edit Room</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/room/update', $roomEdit->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Floor Name</label>
                                    <select class="form-control @error('floor_id') is-invalid @enderror" id="floor_id" name="floor_id">
                                        <option selected disabled> --Select Floor Name-- </option>
                                        @foreach ($floors as $floor)
                                            <option value="{{ $floor->id }}" {{ $floor->id == $roomEdit->floor_id ? 'selected' : '' }}>
                                                {{ $floor->floor_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('floor_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room number</label>
                                    <input type="text" class="form-control @error('room_number') is-invalid @enderror" id="room_number" name="room_number" value="{{ $roomEdit->room_number }}">
                                    @error('room_number')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select class="form-control @error('room_type_id') is-invalid @enderror" id="room_type_id" name="room_type_id">
                                        <option selected disabled> --Select Room Type-- </option>
                                        @foreach ($room_types as $room_type)
                                            <option value="{{ $room_type->id }}" {{ $room_type->id == $roomEdit->room_type_id ? 'selected' : '' }}>
                                                {{ $room_type->room_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('room_type_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AC/NON-AC</label>
                                    <select class="form-control @error('ac_non_ac') is-invalid @enderror" id="ac_non_ac" name="ac_non_ac">
                                        <option disabled {{ empty($roomEdit->ac_non_ac) ? 'selected' : '' }}> --Select AC/NON-AC-- </option>
                                        <option value="AC" {{ $roomEdit->ac_non_ac == 'AC' ? 'selected' : '' }}>AC</option>
                                        <option value="NON-AC" {{ $roomEdit->ac_non_ac == 'NON-AC' ? 'selected' : '' }}>NON-AC</option>
                                    </select>
                                    @error('ac_non_ac')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Food</label>
                                    <select class="form-control @error('food_id') is-invalid @enderror" id="food_id" name="food_id">
                                        <option selected disabled> --Select Food-- </option>
                                            @foreach ($foods as $food )
                                                <option value="{{ $food->id }}" {{ $food->id == $roomEdit->food_id ? 'selected' : '' }}>{{ $food->food_name }}</option>
                                            @endforeach
                                    </select>
                                    @error('food_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bed Count</label>
                                    <select class="form-control @error('bed_count') is-invalid @enderror" id="bed_count" name="bed_count">
                                        <option disabled {{ empty($roomEdit->bed_count) ? 'selected' : '' }}> --Select Bed Count-- </option>
                                        <option value="1" {{ $roomEdit->bed_count == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $roomEdit->bed_count == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $roomEdit->bed_count == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $roomEdit->bed_count == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $roomEdit->bed_count == '5' ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ $roomEdit->bed_count == '6' ? 'selected' : '' }}>6</option>
                                    </select>
                                    @error('bed_count')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Rent</label>
                                    <input type="text" class="form-control @error('rent') is-invalid @enderror" id="rent" name="rent"  value="{{ $roomEdit->rent }}">
                                    @error('rent')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{$roomEdit->phone_number}}">
                                    @error('phone_number')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Image</label>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image" onchange="previewImage(event, 'profilePicPreview')">
                                                <input type="hidden" class="form-control" name="hidden_fileupload" value="{{ $roomEdit->image }}">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img id="profilePicPreview" class="avatar-img" style="width: 50px; height: 50px; object-fit: cover;" src="{{ URL::to('/assets/upload/'.$roomEdit->image) }}" alt="{{ $roomEdit->image }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="5" id="message" name="message">{{ $roomEdit->message }}</textarea>
                                    @error('message')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit">Update</button>
                <a href="{{ route('form/allrooms/page') }}"  type="submit" class="btn btn-secondary  padding:10px" style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
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
                    reader.onload = function() {
                        const output = document.getElementById(previewElementId);
                        output.src = reader.result;
                    }
                    reader.readAsDataURL(event.target.files[0]);
                }
        </script>

    @endsection
@endsection
