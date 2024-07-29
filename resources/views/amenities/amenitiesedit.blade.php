@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Edit Amenities</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('amenities/update', $amenitiesList->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Amenities Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $amenitiesList->name }}">
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image"
                                                    onchange="previewImage(event, 'profilePicPreview')">
                                                <input type="hidden" class="form-control" name="hidden_fileupload">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="#">
                                                <img class="avatar-img squre" style="width:100px !important; height:100px !important;padding:20px" src="{{ URL::to('/assets/amenities/'.$amenitiesList->image) }}" alt="{{ $amenitiesList->image }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ $amenitiesList->description }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                <a href="{{ route('amenities/list') }}"  type="submit" class="btn btn-secondary  padding:10px" style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
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
