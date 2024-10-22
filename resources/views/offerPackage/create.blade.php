@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">Add Offer Package</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <form action="{{ route('offer/package/store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hotel_id">Hotel ID</label>
                                        <select class="form-control @error('hotel_id') is-invalid @enderror" id="hotel_id" name="hotel_id">
                                            <option value="">Select Hotel</option>
                                            @foreach ($hotels as $key => $hotel)
                                                <option value="{{ $key }}">{{ $hotel }}</option>
                                            @endforeach
                                        </select>
                                        @error('hotel_id')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                                        @error('title')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">Images</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image[]" multiple onchange="previewImages(event)">
                                            <label class="custom-file-label" for="image">Choose files</label>
                                            @error('image')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-3">
                                        <label>Image Preview</label>
                                        <div id="imagePreview" class="row">
                                            <!-- Image previews will be appended here -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="discount_type">Discount Type</label>
                                        <input type="text" class="form-control @error('discount_type') is-invalid @enderror" id="discount_type" name="discount_type">
                                        @error('discount_type')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="discount_value">Discount Value</label>
                                        <input type="text" class="form-control @error('discount_value') is-invalid @enderror" id="discount_value" name="discount_value">
                                        @error('discount_value')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date">
                                        @error('start_date')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date">
                                        @error('end_date')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="is_active">Is Active</label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active">
                                            <label class="custom-control-label @error('is_active') is-invalid @enderror" for="is_active">Active</label>
                                        </div>
                                        @error('is_active')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
