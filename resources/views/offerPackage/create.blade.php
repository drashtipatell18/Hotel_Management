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
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image">
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
