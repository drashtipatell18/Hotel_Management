@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Facilities</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('facilities/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Facilities Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
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

                                <div class="form-group mt-3">
                                    <label>Image Preview</label>
                                    <div id="imagePreview" class="row">
                                        <!-- Image previews will be appended here -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"name="title" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Create New Facilities</button>
            </form>
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
