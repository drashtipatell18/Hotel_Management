@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-title mt-5">{{ isset($position) ? 'Edit Position' : 'Add Position' }}</div>
                    </div>
                </div>
            </div>
            <form action="{{ isset($position) ? '/position/update/' . $position->id : '/position/store' }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Position Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"name="name" value="{{ old('name', $position->name ?? '') }}">
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ old('description', $position->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">{{ isset($position) ? 'Update' : 'Create New Position' }}</button>
                @if (isset($position))
                <a href="{{ route('position/list') }}"  type="submit" class="btn btn-warning  padding:10px" style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
                @endif
            </form>
        </div>
    </div>
@endsection

