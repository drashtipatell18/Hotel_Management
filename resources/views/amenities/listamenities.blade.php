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
                            <h4 class="card-title float-left mt-2">Amenities</h4> <a href="{{ route('amenities/add') }}" class="btn btn-primary float-right veiwbutton"><i
                                class="fas fa-plus mr-2"></i>Add Amenities</a> </div>
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
                                                <th>Image</th>
                                                <th>Amenities Name</th>
                                                <th>Description</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allAmenitiesList as $amenities )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ URL::to('/assets/amenities/'.$amenities->image) }}" data-lightbox="amenities" data-title="{{ $amenities->name }}" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/amenities/'.$amenities->image) }}" alt="{{ $amenities->image }}" width="80px">
                                                    </a>
                                                </td>
                                                <td>{{ $amenities->name }}</td>
                                                <td>{{ $amenities->description }}</td>
                                                <td class="text-right">
                                                    <a href="{{ url('amenities/edit/'.$amenities->id) }}" style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-pencil-alt fa-xs"></i>
                                                    </a>
                                                    <a href="{{ route('amenities.delete', ['id' => $amenities->id]) }}" onclick="return confirm('Are you sure you want to delete this Amenities?');" style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-trash fa-xs"></i>
                                                    </a>
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
        @section('script')
        <script>
            $(document).ready(function() {
                $('.datatable1').DataTable();
            });
        </script>
        @endsection
@endsection
