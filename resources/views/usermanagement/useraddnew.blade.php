@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5">Add New Admin</h3>
                </div>
            </div>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('users.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="row formtype">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control  @error('lname') is-invalid @enderror"
                                    name="lname" value="{{ old('lname') }}">
                                @error('lname')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control  @error('phone_number') is-invalid @enderror"
                                    name="phone_number" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password">
                                @error('password')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Profile Image</label>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('profile') is-invalid @enderror"
                                                id="profile" name="profile"
                                                onchange="previewImage(event, 'profilePicPreview')">
                                            <input type="hidden" class="form-control" name="hidden_fileupload">
                                            <label class="custom-file-label" for="customFile">Choose
                                                file</label>
                                            @error('image')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="#">
                                            <img id="profilePicPreview" class="avatar-img"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary buttonedit1">Create New User</button>
        </form>
    </div>
</div>
@endsection

<script>
    function previewImage(event, previewElementId) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById(previewElementId);
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>