@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-title mt-5">{{ isset($smoking) ? 'Edit Smoking Prefrence' : 'Add Smoking Prefrence' }}</div>
                    </div>
                </div>
            </div>
           
            <form action="{{ isset($smoking) ? '/smoking/update/' . $smoking->id : '/filter/storeSmoking' }}" method="POST"
            enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"name="name" value="{{ old('name', $smoking->name ?? '') }}">
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image"
                                                    name="image"
                                                    onchange="previewImage(event, 'profilePicPreview')">
                                                <input type="hidden" class="form-control" name="hidden_fileupload">
                                                <label class="custom-file-label" for="customFile">Choose
                                                    file</label>
                                                    @error('image')
                                                        <div class="error text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="#">
                                                <img id="profilePicPreview" class="avatar-img"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="roomType_image">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image[]" multiple onchange="previewImages(event)">
                                <label class="custom-file-label" for="room_image">Choose files</label>
                                @error('image')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label>Image Preview</label>
                            <div id="imagePreview" class="row">
                                <!-- Show existing images if editing -->
                                @if(isset($smoking->image) && $smoking->image)
                                    @php
                                        $imageFiles = explode(',', $smoking->image);
                                    @endphp
                                    @foreach($imageFiles as $imageFile)
                                        @php
                                            $imagePath = 'assets/upload/' . trim($imageFile); // Path relative to public
                                        @endphp
                                        <div class="col-md-2 mb-3">
                                            <div class="text-center">
                                                <img src="{{ asset($imagePath) }}" class="img-fluid rounded mb-2" style="width: 100%; height: 100px; object-fit: cover;">
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-2" onclick="deleteImage('{{ $smoking->id }}', '{{ trim($imageFile) }}')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>

                    
                
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1"> {{ isset($smoking) ? 'Update' : 'Create New Smoking' }}</button>
            </form>
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
  function deleteImage(smokingId, imageFileName) {
    if (confirm('Are you sure you want to delete this image?')) {
        $.ajax({
            url: '{{ url('smoking/image/delete') }}/' + smokingId, // Append the smokingId to the URL
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
