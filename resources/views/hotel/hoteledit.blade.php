@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Edit Hotel</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('hotel/update', $hotelEdit->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control "name="id" value="{{ $hotelEdit->id }}" readonly>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"name="name" value="{{ $hotelEdit->name }}">
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"name="email" value="{{ $hotelEdit->email }}">
                                    @error('email')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $hotelEdit->phone }}">
                                    @error('phone')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stars</label>
                                    <input type="number" class="form-control @error('stars') is-invalid @enderror" name="stars" value="{{ $hotelEdit->stars  }}">
                                    @error('stars')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                                    rows="3">{{ old('address', $hotelEdit->address) }}</textarea>
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

                                <div class="row" id="imagePreview">
                                    @foreach($hotelEdit->images as $image)
                                        <div class="col-md-2 mb-3" id="image-{{ $image->id }}">
                                            <div class="text-center">
                                                <img src="{{ URL::to('/assets/hotel/'.$image->hotel_image) }}" alt="Hotel Image" class="img-fluid rounded mb-2" style="width: 100%; height: 100px; object-fit: cover;">
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-2" onclick="deleteImage('{{ $image->id }}')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>




                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                <a href="{{ route('hotel/list') }}"  type="submit" class="btn btn-secondary  padding:10px" style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
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
        function deleteImage(imageId) {
            if (confirm('Are you sure you want to delete this image?')) {
                $.ajax({
                    url: '/hotel/image/delete/' + imageId, // Replace with your actual delete route
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
