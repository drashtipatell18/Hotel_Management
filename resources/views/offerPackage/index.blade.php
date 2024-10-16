@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Offer Package</h4>
                            <a href="{{ route('offer/package/add') }}" class="btn btn-primary float-right veiwbutton"><i class="fas fa-plus mr-2"></i>Add Offer Package</a>
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
                                            <th>Hotel</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Discount Type</th>
                                            <th>Discount Value</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Is Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offerPackages as $offerPackage)
                                            <tr>
                                                <td>{{ $offerPackage->id }}</td>
                                                <td>{{ $offerPackage->hotel_id }}</td>
                                                <td>{{ $offerPackage->title }}</td>
                                                <td>{{ $offerPackage->description }}</td>
                                                {{-- <td>{{ $offerPackage->image }}</td> --}}
                                                <td>{{ $offerPackage->discount_type }}</td>
                                                <td>{{ $offerPackage->discount_value }}</td>
                                                <td>{{ $offerPackage->start_date }}</td>
                                                <td>{{ $offerPackage->end_date }}</td>
                                                <td>{{ $offerPackage->is_active }}</td>
                                                <td>
                                                    <a href="{{ route('offer/package/edit', $offerPackage->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('offerPackage.delete', $offerPackage->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
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
