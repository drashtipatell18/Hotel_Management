@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">Edit Spa</h4>
                        <a href="{{ route('spa/list') }}" class="btn btn-primary float-right veiwbutton"><i
                                class="fas fa-plus mr-2"></i>View Spa</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body booking_card">
                        <form action="{{ route('spa/update', $spa->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <input type="text" class="form-control" id="category" name="category"
                                        value="{{ $spa->category }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{ $spa->description }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="roomType_image">Image</label>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('image') is-invalid @enderror" id="image"
                                            name="image[]" multiple onchange="previewImages(event)">
                                        <label class="custom-file-label" for="room_image">Choose files</label>
                                        @error('image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label>Image Preview</label>
                                <div id="imagePreview" class="row">
                                        @if(isset($spa->image) && $spa->image)
                                            @php
                                                $imageFiles = explode(',', $spa->image);
                                            @endphp
                                            @foreach($imageFiles as $imageFile)
                                                @php
                                                    $imagePath = 'assets/spa/' . trim($imageFile); // Path relative to public
                                                @endphp
                                                <div class="col-md-2 mb-3">
                                                    <div class="text-center">
                                                        <img src="{{ asset($imagePath) }}"
                                                            class="img-fluid rounded mb-2"
                                                            style="width: 100%; height: 100px; object-fit: cover;">
                                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-2" 
                                                            onclick="deleteImage('{{ $spa->id }}', '{{ trim($imageFile) }}')">
                                                                <i class="fas fa-trash-alt"></i> Delete
                                                            </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                <input type="hidden" name="remove_images[]" id="remove_images" value="">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="{{ $spa->price }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script>
    // Image Preview
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
    function deleteImage(spaId, imageFileName) {
        if (confirm('Are you sure you want to delete this image?')) {
            $.ajax({
                url: '{{ url('spa/image/delete') }}/' + spaId, // Append the smokingId to the URL
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    image_file_name: imageFileName
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