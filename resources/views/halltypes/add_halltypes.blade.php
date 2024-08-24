@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-title mt-5">{{ isset($halltype) ? 'Edit Hall Type' : 'Add Hall Type' }}</div>
                    </div>
                </div>
            </div>
            <form action="{{ isset($halltype) ? '/halltype/update/' . $halltype->id : '/halltype/store' }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hall Type Name</label>
                                    <input type="text" class="form-control @error('halltype_name') is-invalid @enderror"name="halltype_name" value="{{ old('halltype_name', $halltype->halltype_name ?? '') }}">
                                    @error('halltype_name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hall Type Image</label>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="halltype_image" @error('halltype_image') is-invalid @enderror name="halltype_image" onchange="previewImage(event, 'profilePicPreview')">
                                                <input type="hidden" class="form-control" name="hidden_fileupload">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            @if(isset($halltype))
                                                <a href="#">
                                                    <img id="profilePicPreview" class="avatar-img" style="width: 50px; height: 50px; object-fit: cover;" src="{{ URL::to('/assets/upload/'.$halltype->halltype_image) }}" alt="{{ $halltype->halltype_image }}">
                                                </a>
                                            @else
                                                <img id="profilePicPreview" class="avatar-img"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hall Type Capacity</label>
                                    <input type="number" class="form-control @error('halltype_capacity') is-invalid @enderror"name="halltype_capacity" value="{{ old('halltype_capacity', $halltype->halltype_capacity ?? '') }}">
                                    @error('halltype_capacity')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Base Price</label>
                                    <input type="number" class="form-control @error('base_price') is-invalid @enderror"name="base_price" value="{{ old('base_price', $halltype->base_price ?? '') }}">
                                    @error('base_price')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ old('description', $halltype->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">{{ isset($halltype) ? 'Update' : 'Create New Hall Type' }}</button>
                @if (isset($halltype))
                <a href="{{ route('halltype/list') }}"  type="submit" class="btn btn-secondary  padding:10px" style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
                @endif
            </form>
        </div>
    </div>
@endsection
<script>
    function previewImage(event, previewElementId) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById(previewElementId);
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>


