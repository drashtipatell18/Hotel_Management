@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Edit Coupon</h4>
                            <a href="{{ route('coupon/list') }}" class="btn btn-primary float-right veiwbutton"><i class="fas fa-plus mr-2"></i>View Coupon</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <form action="{{ route('coupon/update', $coupon->id) }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="code">Code</label>
                                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ $coupon->code }}">
                                        @error('code')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $coupon->name }}">
                                        @error('name')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description">{{ $coupon->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                            <option value="">Select Type</option>
                                            <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                            <option value="percentage" {{ $coupon->type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                        </select>
                                        @error('type')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="discount_amount">Discount Amount</label>
                                        <input type="number" class="form-control @error('discount_amount') is-invalid @enderror" id="discount_amount" name="discount_amount" value="{{ $coupon->discount_amount }}">
                                        @error('discount_amount')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="max_uses">Max Uses</label>
                                        <input type="number" class="form-control @error('max_uses') is-invalid @enderror" id="max_uses" name="max_uses" value="{{ $coupon->max_uses }}">
                                        @error('max_uses')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="starts_at">Starts At</label>
                                        <input type="date" class="form-control @error('starts_at') is-invalid @enderror" id="starts_at" name="starts_at" value="{{ $coupon->starts_at }}">
                                        @error('starts_at')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="expires_at">Expires At</label>
                                        <input type="date" class="form-control @error('expires_at') is-invalid @enderror" id="expires_at" name="expires_at" value="{{ $coupon->expires_at }}">
                                        @error('expires_at')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Profile Image</label>
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="custom-file">
                                                    <input type="file"
                                                        class="custom-file-input @error('image') is-invalid @enderror"
                                                        id="image" name="image"
                                                        onchange="previewImage(event, 'imagePreview')">
                                                    <input type="hidden" class="form-control" name="hidden_fileupload">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                    @error('image')
                                                        <div class="error text-danger">{{ $message }}</div>
                                                    @enderror 
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="#">
                                                    <img id="imagePreview" class="avatar-img"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function previewImage(event, previewElementId) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById(previewElementId);
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
