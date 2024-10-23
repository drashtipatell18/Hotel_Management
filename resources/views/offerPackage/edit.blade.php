@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">Edit Offer Package</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <form action="{{ route('offer/package/update', $offerPackage->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hotel_id">Hotel ID</label>
                                        <select class="form-control" id="hotel_id" name="hotel_id">
                                            <option value="">Select Hotel</option>
                                            @foreach ($hotels as $key => $hotel)
                                                <option value="{{ $key }}" {{ $offerPackage->hotel_id == $key ? 'selected' : '' }}>{{ $hotel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $offerPackage->title }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description">{{ $offerPackage->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Offer Include</label>
                                        <textarea class="form-control" id="offer_include" name="offer_include">{{ $offerPackage->offer_include }}</textarea>
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
                                        @if(isset($offerPackage->image) && $offerPackage->image)
                                            @php
                                                $imageFiles = explode(',', $offerPackage->image);
                                            @endphp
                                            @foreach($imageFiles as $imageFile)
                                                @php
                                                    $imagePath = 'assets/offer/' . trim($imageFile); // Path relative to public
                                                @endphp
                                                <div class="col-md-2 mb-3">
                                                    <div class="text-center">
                                                        <img src="{{ asset($imagePath) }}"
                                                            class="img-fluid rounded mb-2"
                                                            style="width: 100%; height: 100px; object-fit: cover;">
                                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-2" 
                                                            onclick="deleteImage('{{ $offerPackage->id }}', '{{ trim($imageFile) }}')">
                                                                <i class="fas fa-trash-alt"></i> Delete
                                                            </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <input type="hidden" name="remove_images[]" id="remove_images">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="discount_type">Discount Type</label>
                                        <input type="text" class="form-control" id="discount_type" name="discount_type" value="{{ $offerPackage->discount_type }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="discount_value">Discount Value</label>
                                        <input type="text" class="form-control" id="discount_value" name="discount_value" value="{{ $offerPackage->discount_value }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $offerPackage->start_date }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $offerPackage->end_date }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="is_active">Is Active</label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{ $offerPackage->is_active ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="is_active">Active</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
  function deleteImage(offerId, imageFileName) {
    if (confirm('Are you sure you want to delete this image?')) {
        $.ajax({
            url: '{{ url('offer/image/delete') }}/' + offerId, // Append the smokingId to the URL
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

