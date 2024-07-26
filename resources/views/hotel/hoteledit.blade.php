@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Edit Hotel</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('hotel/update', $hotelEdit->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control "name="id" value="{{ $hotelEdit->id }}" readonly>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"name="name" value="{{ $hotelEdit->name }}">
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"name="email" value="{{ $hotelEdit->email }}">
                                    @error('email')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $hotelEdit->phone }}">
                                    @error('phone')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stars</label>
                                    <input type="number" class="form-control @error('stars') is-invalid @enderror" name="stars" value="{{ $hotelEdit->stars  }}">
                                    @error('stars')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                                    rows="3">{{ old('address', $hotelEdit->address) }}</textarea>
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                <a href="{{ route('hotel/list') }}"  type="submit" class="btn btn-warning  padding:10px" style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
            </form>
        </div>
    </div>
    @section('script')

    @endsection

@endsection
