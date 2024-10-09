@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Edit Admin</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('users/update', ['id' => $userData->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control "name="user_id" value="{{ $userData->user_id }}" readonly>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"name="name" value="{{ $userData->name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control @error('lname') is-invalid @enderror"name="lname" value="{{ $userData->lname }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"name="email" value="{{ $userData->email }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $userData->phone_number }}">
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ $userData->position }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Department</label>
                                    <input type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ $userData->department }}">
                                </div>
                            </div> -->

                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Profile Image</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input @error('profile') is-invalid @enderror" id="customFile" name="profile" value="{{ old('profile') }}">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div> -->


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Profile Image</label>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('profile') is-invalid @enderror" id="profile" name="profile"
                                                    onchange="previewImage(event, 'profilePicPreview')">
                                                <input type="hidden" class="form-control" name="hidden_fileupload">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="#">
                                                <img id="profilePicPreview" class="avatar-img square" style="width:100px; height:100px; padding:20px;" src="{{ URL::to('/assets/img/'.$userData->profile) }}" alt="{{ $userData->profile }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Update</button>
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