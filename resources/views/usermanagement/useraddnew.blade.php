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
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control"
                                    name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control"
                                    name="phone_number" value="{{ old('phone_number') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control"
                                    name="position" value="{{ old('position') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Department</label>
                                <input type="text" class="form-control"
                                    name="department" value="{{ old('department') }}">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                </div>
                            </div>

                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Role Name</label>
                                    <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                                        <option value="">Select Role</option>
                                        <option value="1" {{ old('role_id') == 'staff' ? 'selected' : '' }}>Staff</option>
                                        <option value="2" {{ old('role_id') == 'accountant' ? 'selected' : '' }}>Accountant</option>
                                        <option value="3" {{ old('role_id') == 'customer' ? 'selected' : '' }}>Customer</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control "
                                    name="password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password"
                                    class="form-control"
                                    name="password_confirmation">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Profile Image</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input"
                                        id="customFile" name="profile" value="{{ old('profile') }}">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Profile Image</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input @error('profile') is-invalid @enderror" id="customFile" name="profile" value="{{ old('profile') }}">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
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
@section('script')

@endsection

@endsection
