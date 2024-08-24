@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Hotel</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('hotel/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hotel Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stars</label>
                                    <input type="number" class="form-control @error('stars') is-invalid @enderror" name="stars" value="{{ old('stars') }}">
                                    @error('stars')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="4">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="hotel_image">Hotel Images</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('hotel_image') is-invalid @enderror" id="hotel_image" name="hotel_image[]" multiple onchange="previewImages(event)">
                                        <label class="custom-file-label" for="hotel_image">Choose files</label>
                                        @error('hotel_image')
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

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Create New Hotel</button>
            </form>
        </div>
    </div>
    @section('script')
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
@endsection
