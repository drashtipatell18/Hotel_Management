@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Location</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('location.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Map Link --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Map Link</label>
                                    <input type="text" class="form-control @error('map_link') is-invalid @enderror" name="map_link" id="map_link" value="{{ old('map_link') }}">
                                    @error('map_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            {{-- Address --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Latitude --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" id="latitude" value="{{ old('latitude') }}">
                                    @error('latitude')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Longitude --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" id="longitude" value="{{ old('longitude') }}">
                                    @error('longitude')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary buttonedit1">Create Location</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
