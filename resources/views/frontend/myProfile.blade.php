@extends('frontend.layouts.main')
@section('title', 'Edit Profile')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .d_box {
        position: relative;
        overflow: hidden; /* Ensures that anything outside the box is hidden */
    }
    .d_night {
        position: relative;
        z-index: 0; /* Ensures the ribbon stays above the price */
    }
</style>

<section class="d_p-25 d_room">
    <div class="container">
        <div class="row  d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="section-title">
                    <h5 class="text-center ">My profile</h5>
                </div>
            </div>
        </div>
        <div class="container mb-4">
            <div class="row my_profile_card">
                <div class="col-lg-2">
                    <div class="profile_img">
                        <img src="{{ $user->profile ? asset('assets/img/' . $user->profile) : asset('assets/img/men.jpg') }}" style="width: 300px;height: 178px;object-fit: fill;"  class="rounded-circle"  alt="logo">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="profile_detail">
                        <h5 class="text-dark mb-2">Personal information</h5>
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-1">First Name</p>
                                <h5 class="mb-2">{{ $user->name }} </h5>
                                <p class="mb-1">Email</p>
                                <h5 class="mb-2">{{ $user->email }}</h5>
                                <p class="mb-1">Date of Birth</p>
                                <h5 class="mb-2">{{ $user->dob }} </h5>
                            </div>
                            <div class="col-6">
                                <p class="mb-1">Last Name</p>
                                <h5 class="mb-2">{{ $user->lname }} </h5>
                                <p class="mb-1">Phone</p>
                                <h5 class="mb-2">{{$user->phone_number}}</h5>
                                <p class="mb-1">Nationality</p>
                                <h5 class="mb-2">United States</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="edit_profile_btn pt-4">
                        <a href="{{route('editProfile')}}" class="Custom_btn text-decoration-none">Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="row my_profile_card">
                <div class="col-lg-2">
                    <div class="profile_img">

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="profile_detail">
                        <h5 class="text-dark mb-2 pt-3">Address</h5>
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-1">City</p>
                                <h5 class="mb-2">United States </h5>
                                <p class="mb-1">Country</p>
                                <h5 class="mb-2">United States</h5>
                            </div>
                            <div class="col-6">
                                <p class="mb-1">State</p>
                                <h5 class="mb-2">United States</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>