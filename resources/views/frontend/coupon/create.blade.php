@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title float-left mt-2">Add Coupon</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <form action="{{ route('coupon/store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code">
                                    @error('code')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                        <option value="">Select Type</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percentage">Percentage</option>
                                    </select>
                                    @error('type')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="discount_amount">Discount Amount</label>
                                    <input type="number" class="form-control @error('discount_amount') is-invalid @enderror" id="discount_amount" name="discount_amount">
                                    @error('discount_amount')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="max_uses">Max Uses</label>
                                    <input type="number" class="form-control @error('max_uses') is-invalid @enderror" id="max_uses" name="max_uses">
                                    @error('max_uses')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="starts_at">Starts At</label>
                                    <input type="date" class="form-control @error('starts_at') is-invalid @enderror" id="starts_at" name="starts_at">
                                    @error('starts_at')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="expires_at">Expires At</label>
                                    <input type="date" class="form-control @error('expires_at') is-invalid @enderror" id="expires_at" name="expires_at">
                                    @error('expires_at')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Add Coupon</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
