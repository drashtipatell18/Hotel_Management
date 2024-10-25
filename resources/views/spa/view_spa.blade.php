@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Spa</h4>
                            <a href="{{ route('spa/add') }}" class="btn btn-primary float-right veiwbutton"><i class="fas fa-plus mr-2"></i>Add Spa</a>
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
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($spas as $spa)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$spa->name}}</td>
                                                <td>{{ $spa->category }}</td>
                                                <td>{{ $spa->description }}</td>
                                                <td>{{ $spa->price }}</td>
                                                <td>
                                                    @php
                                                        $images = explode(',', $spa->image); // Split images by comma
                                                        $firstImage = $images[0]; // Get the first image
                                                    @endphp 
                                                    <img src="{{ asset('assets/spa/'.$firstImage) }}" style="width: 40px; height: 40px;" class="avatar-img rounded-circle">
                                                </td>

                                                <td class="text-right">
                                                    <a data-toggle="modal" data-target="#exampleModal{{ $spa->id }}"
                                                        class="view-customer"
                                                        style="font-size: 23px; padding: 5px; color: #009688; cursor:pointer">
                                                        <i class="fas fa-eye fa-xs"></i>
                                                    </a>
                                                    <a class="dropdown-item-sm" style="font-size: 23px; padding: 5px; color: #009688;"  href="{{ url('spa/edit/'.$spa->id) }}"><i class="fas fa-pencil-alt fa-xs"></i></a>
                                                    <a href="{{ route('spa.delete', ['id' => $spa->id]) }}" onclick="return confirm('Are you sure you want to delete this Spa?');" style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-trash fa-xs"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal{{ $spa->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document"
                                                    style="max-width: 990px; width: 990px; height: 500px;">
                                                    <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                        <div class="modal-header text-white"
                                                            style="background-color: #009688; color: white !important;">
                                                            <h5 class="modal-title" id="exampleModalLabel">Spa Details
                                                            </h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body mt-4"
                                                            style="padding: 20px; height: calc(100% - 120px); overflow-y: auto;">
                                                            <div class="row">
                                                                <div class="col-md-4 text-center">
                                                                    @php
                                                                    $images = explode(',', $spa->image); // Split the comma-separated string into an array
                                                                    $firstImage = $images[0] ?? null; // Get the first image, if it exists
                                                                @endphp

                                                                @if($firstImage) <!-- Check if there is a first image -->
                                                                    <div class="col-md-4 text-center">
                                                                        <img class="avatar-img rounded"
                                                                            src="{{ URL::to('/assets/spas/' . $firstImage) }}"
                                                                            alt="{{ $firstImage }}"
                                                                            style="width: 180px; height: 200px; object-fit: cover;"
                                                                            onerror="this.onerror=null; this.src='{{ URL::to('/assets/facilities/men.jpg') }}';">
                                                                    </div>
                                                                @endif
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h6 class="text-muted">Spas Details</h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-10">

                                                                            <p><strong>Category:</strong> <span
                                                                                id="facilities-lname">{{ $spa->category }}</span>
                                                                            </p>
                                                                            <p><strong>Description:</strong> <span
                                                                                id="facilities-date">{{ $spa->description }}</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer bg-light mb-1" style="height: 60px;">
                                                            <button type="button" class="btn btn-info hover-btn"
                                                                data-dismiss="modal">Close</button>
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
