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
                                    <label>Room Name</label>
                                    <input type="text" class="form-control @error('room_name') is-invalid @enderror" id="room_name" name="room_name" value="{{ $roomEdit->room_name }}">
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
                                    <label>Bed Type</label>
                                    <input type="text" class="form-control @error('bed_type') is-invalid @enderror" id="bed_type" name="bed_type" value="{{ $roomEdit->bed_type }}">
                                    @error('bed_type')
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
                                    <label>Room Size</label>
                                    <input type="text" class="form-control @error('room_size') is-invalid @enderror" id="room_size" name="room_size" value="{{$roomEdit->room_size}}">
                                    @error('room_size')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Check In</label>
                                    <div class="">
                                        <input type="date" id="from_date" class="form-control" name="from_date" value="{{ $roomEdit->from_date }}">
                                        @error('from_date')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Check Out</label>
                                    <div class="">
                                        <input type="date" id="to_date" class="form-control" name="to_date" value="{{ $roomEdit->to_date }}">
                                        @error('to_date')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                            </div>

                           

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Toal Member Capacity</label>
                                    <input type="number" class="form-control @error('total_member_capacity') is-invalid @enderror" id="total_member_capacity" name="total_member_capacity" value="{{$roomEdit->total_member_capacity}}">
                                    @error('total_member_capacity')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Smoking Prefrence</label>
                                    <select class="form-control @error('smoking_id') is-invalid @enderror" id="smoking_id" name="smoking_id">
                                        <option selected disabled> --Select Smoking Prefrence-- </option>
                                            @foreach ($smokingPrefrences as $smoking )
                                                <option value="{{ $smoking->id }}" {{ $smoking->id == $roomEdit->smoking_id ? 'selected' : '' }}>{{ $smoking->name }}</option>
                                            @endforeach
                                    </select>
                                    @error('smoking_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Additiooanl Prefrence</label>
                                    <select class="form-control @error('view_id') is-invalid @enderror" id="view_id" name="view_id">
                                        <option selected disabled> --Select Additional Prefrence-- </option>
                                            @foreach ($additionalPrefrence as $additional )
                                                <option value="{{ $additional->id }}" {{ $additional->id == $roomEdit->view_id ? 'selected' : '' }}>{{ $additional->name }}</option>
                                            @endforeach
                                    </select>
                                    @error('view_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Offer Packages</label>
                                    <select class="form-control @error('offer_id') is-invalid @enderror" id="offer_id" name="offer_id">
                                        <option selected disabled> --Select Offer Packages-- </option>
                                            @foreach ($offerPackages as $packages )
                                                <option value="{{ $packages->id }}" {{ $packages->id == $roomEdit->offer_id ? 'selected' : '' }}>{{ $packages->title }}</option>
                                            @endforeach
                                    </select>
                                    @error('offer_id')
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

                                <div class="row" id="imagePreview">
                                    @foreach($roomEdit->images as $image)
                                        <div class="col-md-2 mb-3" id="image-{{ $image->id }}">
                                            <div class="text-center">
                                                <img src="{{ URL::to('/assets/upload/'.$image->image) }}" alt="Hotel Image" class="img-fluid rounded mb-2" style="width: 100%; height: 100px; object-fit: cover;">
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-2" onclick="deleteImage('{{ $image->id }}')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Includes In This Suites</label>
                                    <textarea class="form-control" id="editor" name="include_suites">{{ old('include_suites', $roomEdit->include_suites ?? '') }}</textarea>
                                    @error('include_suites')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
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
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
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
        function deleteImage(imageId) {
            if (confirm('Are you sure you want to delete this image?')) {
                $.ajax({
                    url: '/room/image/delete/' + imageId, // Replace with your actual delete route
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload(); // Optionally reload the page or remove the image element
                        } else {
                            alert('Failed to delete the image');
                        }
                    }
                });
            }
        }
    </script>

    @endsection
@endsection
