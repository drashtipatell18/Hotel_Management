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
                        <h3 class="page-title mt-5">{{ isset($staff) ? 'Edit Staff' : 'Add Staff' }}</h3>
                    </div>
                </div>
            </div>
                <form action="{{ isset($staff) ? '/staff/update/' . $staff->id : '/staff/store' }}" method="POST"
                    enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hotel Name</label>
                                    <select class="form-control @error('hotel_id') is-invalid @enderror" id="hotel_id" name="hotel_id">
                                        <option value="" selected disabled> --Select Hotel Name-- </option>
                                        @foreach ($hotels as $hotel)
                                            <option value="{{ $hotel->id }}" {{ old('hotel_id', $selectedHotelId) == $hotel->id ? 'selected' : '' }}>
                                                {{ $hotel->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('hotel_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text"  class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $staff->first_name ?? '') }}">
                                    @error('first_name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text"  class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $staff->last_name ?? '') }}">
                                    @error('last_name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email"  class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $staff->email ?? '') }}">
                                    @error('last_name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                                {{ old('gender', $staff->gender ?? '') == 'male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                                {{ old('gender', $staff->gender ?? '') == 'female' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="other" value="other"
                                                {{ old('gender', $staff->gender ?? '') == 'other' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                        @error('gender')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number"  class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $staff->phone ?? '') }}">
                                    @error('phone')
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
                                                <input type="file" class="custom-file-input" id="profile_pic" name="profile_pic" onchange="previewImage(event, 'profilePicPreview')">
                                                <input type="hidden" class="form-control" name="hidden_fileupload" >
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            @if(isset($staff))
                                                <a href="#">
                                                    <img id="profilePicPreview" class="avatar-img" style="width: 50px; height: 50px; object-fit: cover;" src="{{ URL::to('/assets/upload/'.$staff->profile_pic) }}" alt="{{ $staff->profile_pic }}">
                                                </a>
                                            @else
                                                <img id="profilePicPreview" class="avatar-img"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Birth Date</label>
                                    <div class="">
                                        <input type="date" id="birth_date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date', $staff->birth_date ?? '') }}">
                                    </div>
                                </div>
                                @error('birth_date')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Position Name</label>
                                    <select class="form-control @error('position_id') is-invalid @enderror" id="position_id " name="position_id">
                                        <option value="" selected disabled> --Select Position Name-- </option>
                                        @foreach ($positions as $position)
                                            <option value="{{ $position->id }}" {{ old('position_id', $selectedPositionId) == $position->id ? 'selected' : '' }}>
                                                {{ $position->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('position_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Salary</label>
                                    <input type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary', $staff->salary ?? '') }}">
                                </div>
                                @error('salary')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hire Date</label>
                                    <div class="">
                                        <input type="date" id="hire_date" class="form-control @error('hire_date') is-invalid @enderror" name="hire_date"  value="{{ old('hire_date', $staff->hire_date ?? '') }}">
                                    </div>
                                </div>
                                @error('hire_date')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address (Proof) - Aadharcard</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="aadharcard"
                                                    name="aadharcard"
                                                    onchange="previewImage(event, 'aadharcardPreview', '{{ isset($staff) ? URL::to('/assets/upload/'.$staff->aadharcard) : '' }}')">
                                                <label class="custom-file-label" for="aadharcard">Choose file</label>
                                                @error('aadharcard')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            @if(isset($staff))
                                                <a href="#">
                                                    <img id="aadharcardPreview" class="avatar-img" style="width: 50px; height: 50px; object-fit: cover;" src="{{ URL::to('/assets/upload/'.$staff->aadharcard) }}" alt="{{ $staff->aadharcard }}">
                                                </a>
                                            @else
                                                <img id="aadharcardPreview" class="avatar-img"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" rows="5" id="message" name="address"
                                   >{{ old('address', $staff->address ?? '') }}</textarea>
                                    @error('address')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary buttonedit1"> {{ isset($staff) ? 'Update' : 'Create New Staff' }}</button>
                @if (isset($staff))
                    <a href="{{ route('staff/list') }}"  type="submit" class="btn btn-secondary  padding:10px" style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
                @endif
            </form>
        </div>
    </div>
    @section('script')
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

    @endsection
@endsection
