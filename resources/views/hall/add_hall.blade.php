@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-title mt-5">{{ isset($hall) ? 'Edit Hall' : 'Add Hall' }}</div>
                    </div>
                </div>
            </div>
            <form action="{{ isset($hall) ? '/hall/update/' . $hall->id : '/hall/store' }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Floor Name</label>
                                    <select class="form-control @error('floor_id') is-invalid @enderror" id="floor_id"
                                        name="floor_id">
                                        <option selected disabled> --Select Floor Name-- </option>
                                        @foreach ($floors as $floor)
                                            <option value="{{ $floor->id }}"
                                                {{ (isset($hall) && $hall->floor_id == $floor->id) ? 'selected' : '' }}>
                                                {{ $floor->floor_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('floor_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hall Type Name</label>
                                    <select class="form-control @error('halltype_id') is-invalid @enderror" id="halltype_id"
                                        name="halltype_id">
                                        <option selected disabled> --Select Hall Type Name-- </option>
                                        @foreach ($halltypes as $halltype)
                                            <option value="{{ $halltype->id }}"  {{ (isset($hall) && $hall->halltype_id == $halltype->id) ? 'selected' : '' }}>{{ $halltype->halltype_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('halltype_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hall Number</label>
                                    <input type="number"
                                        class="form-control @error('hall_number') is-invalid @enderror"name="hall_number"
                                        value="{{ old('hall_number', $hall->hall_number ?? '') }}">
                                    @error('hall_number')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ old('description', $hall->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="btn btn-primary buttonedit1">{{ isset($hall) ? 'Update' : 'Create New Hall Type' }}</button>
                @if (isset($hall))
                    <a href="{{ route('hall/list') }}" type="submit" class="btn btn-secondary  padding:10px"
                        style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
                @endif
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
