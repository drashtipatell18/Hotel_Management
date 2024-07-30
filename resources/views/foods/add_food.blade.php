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
</style>
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-title mt-5">{{ isset($food) ? 'Edit Food' : 'Add Food' }}</div>
                    </div>
                </div>
            </div>
            <form action="{{ isset($food) ? '/food/update/' . $food->id : '/food/store' }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Food Name</label>
                                    <input type="text" class="form-control @error('food_name') is-invalid @enderror"name="food_name" value="{{ old('food_name', $food->food_name ?? '') }}">
                                    @error('food_name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ old('description', $food->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Food Image</label>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="food_image" name="food_image" onchange="previewImage(event, 'profilePicPreview')">
                                                <input type="hidden" class="form-control" name="hidden_fileupload" >
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            @if(isset($food))
                                                <a href="#">
                                                    <img id="profilePicPreview" class="avatar-img" style="width: 50px; height: 50px; object-fit: cover;" src="{{ URL::to('/assets/upload/'.$food->food_image) }}" alt="{{ $food->food_image }}">
                                                </a>
                                            @else
                                                <img id="profilePicPreview" class="avatar-img"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">{{ isset($food) ? 'Update' : 'Create New Food' }}</button>
                @if (isset($food))
                <a href="{{ route('food/list') }}"  type="submit" class="btn btn-secondary  padding:10px" style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
                @endif
            </form>
        </div>
    </div>
    @section('script')
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
    @endsection
@endsection

