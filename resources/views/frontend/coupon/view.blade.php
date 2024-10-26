@extends('layouts.master')
@section('content')
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Coupons</h4>
                            <a href="{{ route('coupon/add') }}" class="btn btn-primary float-right veiwbutton"><i class="fas fa-plus mr-2"></i>Add Coupon</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table class="datatable1 table table-stripped table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Discount Amount</th>
                                            <th>Max Uses</th>
                                            <th>Starts At</th>
                                            <th>Expires At</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $coupon->code }}</td>
                                                <td>{{ $coupon->name }}</td>
                                                <td>{{ $coupon->description }}</td>
                                                <td>{{ $coupon->type }}</td>
                                                <td>{{ $coupon->discount_amount }}</td>
                                                <td>{{ $coupon->max_uses }}</td>
                                                <td>{{ $coupon->starts_at }}</td>
                                                <td>{{ $coupon->expires_at }}</td>
                                                <td class="text-right">
                                                    <a data-toggle="modal" data-target="#exampleModal{{ $coupon->id }}"
                                                        class="view-customer"
                                                        style="font-size: 23px; padding: 5px; color: #009688; cursor:pointer">
                                                        <i class="fas fa-eye fa-xs"></i>
                                                    </a>
                                                    <a href="{{ route('coupon/edit', $coupon->id) }}" style="font-size: 23px; padding: 5px; color: #009688;" class="dropdown-item-sm"><i class="fas fa-pencil-alt fa-xs"></i></a>
                                                    <a href="{{ route('coupon/delete', $coupon->id) }}" style="font-size: 23px; padding: 5px; color: #009688;" onclick="return confirm('Are you sure you want to delete this coupon?');"><i class="fas fa-trash fa-xs"></i></a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal{{ $coupon->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document"
                                                    style="max-width: 990px; width: 990px; height: 500px;">
                                                    <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                        <div class="modal-header text-white"
                                                            style="background-color: #009688; color: white !important;">
                                                            <h5 class="modal-title" id="exampleModalLabel">Coupon Details
                                                            </h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body mt-4"
                                                            style="padding: 20px; height: calc(100% - 120px); overflow-y: auto;">
                                                            {{-- <div class="row">
                                                                <div class="col-md-4 text-center">
                                                                    <img class="avatar-img rounded"
                                                                            src="{{ URL::to('/assets/spas/' . $firstImage) }}"
                                                                            alt="{{ $firstImage }}"
                                                                            style="width: 180px; height: 200px; object-fit: cover;"
                                                                            onerror="this.onerror=null; this.src='{{ URL::to('/assets/facilities/men.jpg') }}';">
                                                            </div> --}}
                                                            <div class="col-md-12" style="text-align: center;">
                                                                <p><strong>Code:</strong> <span
                                                                    id="facilities-lname">{{ $coupon->code }}</span>
                                                                </p>
                                                                <p><strong>Name:</strong> <span
                                                                    id="facilities-lname">{{ $coupon->name }}</span>
                                                                </p>
                                                                <p><strong>Description:</strong> <span
                                                                    id="facilities-lname">{{ $coupon->description }}</span>
                                                                </p>
                                                                <p><strong>Type:</strong> <span
                                                                    id="facilities-lname">{{ $coupon->type }}</span>
                                                                </p>
                                                                <p><strong>Discount Amount:</strong> <span
                                                                    id="facilities-lname">{{ $coupon->discount_amount }}</span>
                                                                </p>
                                                                <p><strong>Max Uses:</strong> <span
                                                                    id="facilities-lname">{{ $coupon->max_uses }}</span>
                                                                </p>
                                                                <p><strong>Starts At:</strong> <span
                                                                    id="facilities-lname">{{ $coupon->starts_at }}</span>
                                                                </p>
                                                                <p><strong>Expires At:</strong> <span
                                                                    id="facilities-lname">{{ $coupon->expires_at }}</span>
                                                                </p>
                                                                <p><strong>User:</strong> <span
                                                                    id="facilities-lname">{{ $coupon->user->name }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.datatable1').DataTable();
    });
</script>
@endsection

