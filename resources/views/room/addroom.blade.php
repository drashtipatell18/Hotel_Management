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
    .ck-editor__editable {
        min-height: 400px; /* Adjust to the desired height */
    }
</style>
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5"> Add Room</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/room/save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Floor Name</label>
                                    <select class="form-control @error('floor_id') is-invalid @enderror" id="floor_id " name="floor_id">
                                        <option selected disabled> --Select Floor Name-- </option>
                                        @foreach ($floors as $floor )
                                        <option value="{{ $floor->id }}">{{ $floor->floor_name }}</option>
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
                                    <input type="number" class="form-control @error('room_number') is-invalid @enderror" id="room_number" name="room_number" value="{{ old('room_number') }}">
                                    @error('room_number')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Name</label>
                                    <input type="text" class="form-control @error('room_name') is-invalid @enderror" id="room_name" name="room_name" value="{{ old('room_name') }}">
                                    @error('room_name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select class="form-control @error('room_type_id') is-invalid @enderror" id="room_type_id" name="room_type_id">
                                        <option selected disabled> --Select Room Type-- </option>
                                            @foreach ($room_types as $room_type )
                                                <option value="{{ $room_type->id }}">{{ $room_type->room_name }}</option>
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
                                        <option disabled selected>--Select--</option>
                                        <option value="AC">AC</option>
                                        <option value="NON-AC">NON-AC</option>
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
                                                <option value="{{ $food->id }}">{{ $food->food_name }}</option>
                                            @endforeach
                                    </select>
                                    @error('food_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                      

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bed Type</label>
                                    <input type="text" class="form-control @error('bed_type') is-invalid @enderror" id="bed_type" name="bed_type" value="{{ old('bed_type') }}">
                                    @error('bed_type')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Rent</label>
                                    <input type="text" class="form-control @error('rent') is-invalid @enderror" id="rent" name="rent" value="{{ old('rent') }}">
                                    @error('rent')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Image</label>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" @error('image') is-invalid @enderror name="image" onchange="previewImage(event, 'profilePicPreview')">
                                                <input type="hidden" class="form-control" name="hidden_fileupload">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img id="profilePicPreview" class="avatar-img" style="width: 50px; height: 50px; object-fit: cover;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Size</label>
                                    <input type="text" class="form-control @error('room_size') is-invalid @enderror" id="room_size" name="room_size" value="{{ old('room_size') }}">
                                    @error('room_size')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Check In Date</label>
                                        <div class="">
                                            <input type="date" id="from_date" class="form-control @error('from_date') is-invalid @enderror" name="from_date" value="{{ old('from_date') }}">
                                        </div>
                                        @error('from_date')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Check Out Date</label>
                                        <div class="">
                                            <input type="date" id="to_date" class="form-control @error('to_date') is-invalid @enderror" name="to_date" value="{{ old('to_date') }}">
                                        </div>
                                        @error('to_date')
                                                <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Toal Member Capacity</label>
                                    <input type="number" class="form-control @error('total_member_capacity') is-invalid @enderror" id="total_member_capacity" name="total_member_capacity" value="{{ old('total_member_capacity') }}">
                                    @error('total_member_capacity')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Smoking Preference</label>
                                    <select class="form-control @error('smoking_id') is-invalid @enderror" id="smoking_id" name="smoking_id">
                                        <option disabled selected>--Select Smoking Prefrence--</option>
                                        @foreach($smokingPrefrences as $preference)
                                            <option value="{{ $preference->id }}">{{ $preference->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('smoking_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Additional Preference</label>
                                    <select class="form-control @error('view_id') is-invalid @enderror" id="view_id" name="view_id">
                                        <option disabled selected>--Select Additional Prefrence--</option>
                                        @foreach($additionalPrefrence as $preference)
                                            <option value="{{ $preference->id }}">{{ $preference->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('smoking_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Offer & Packages</label>
                                    <select class="form-control @error('offer_id') is-invalid @enderror" id="offer_id" name="offer_id">
                                        <option disabled selected>--Select Offer & Packages--</option>
                                        @foreach($offerPackages as $packages)
                                            <option value="{{ $packages->id }}">{{ $packages->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('smoking_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">Room Images</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image[]" multiple onchange="previewImages(event)">
                                        <label class="custom-file-label" for="image">Choose files</label>
                                        @error('image')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label>Image Preview</label>
                                    <div id="imagePreview" class="row">
                                        <!-- Image previews will be appended here -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Includes In This Suites</label>
                                    <textarea class="form-control" id="editor" name="include_suites">{{ old('include_suites') }}</textarea>
                                    @error('include_suites')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" rows="5" id="message" name="message" value="{{ old('message') }}"></textarea>
                                    @error('message')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit ml-2">Add Room</button>

            </form>
        </div>
    </div>

    <!-- Ck Editor -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: {
                items: [
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo'
                ]
            },
            // Adjusting editor height
            height: 400 // You can change the value as per your requirement
        })
        .then(editor => {
            editor.ui.view.editable.element.style.height = '400px'; // Set height here
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script>
        function previewImages(event) {
        const previewContainer = document.getElementById('imagePreview');
        const files = event.target.files;

        for (const file of files) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-fluid rounded mb-2';
                img.style.width = '100%';
                img.style.height = '100px';
                img.style.objectFit = 'cover';

                const div = document.createElement('div');
                div.className = 'col-md-2 mb-3';
                div.innerHTML = `
                    <div class="text-center">
                        ${img.outerHTML}
                        <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-2" onclick="removePreview(this)">
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>
                    </div>
                `;

                previewContainer.appendChild(div);
            };
            reader.readAsDataURL(file);
        }
    }

    function removePreview(element) {
        element.parentElement.parentElement.remove();
    }
</script>

@endsection


