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
                            <h4 class="card-title float-left mt-2">All RoomType</h4> <a href="{{ route('roomtype/add') }}" class="btn btn-primary float-right veiwbutton">Add Room Type</a> </div>
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
                                                <th>RoomType Name</th>
                                                <th>Capacity</th>
                                                <th>Extra Bed</th>
                                                <th>Extra Bed Quantity</th>
                                                <th>Base Price</th>
                                                <th>Description</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roomTypes as $roomType)
                                                <tr>
                                                    <td>{{ $roomType->room_name }}</td>
                                                    <td>{{ $roomType->capacity }}</td>
                                                    <td>{{ $roomType->extra_bed ? 'Yes' : 'No' }}</td>
                                                    <td>{{ $roomType->extra_bed_quantity }}</td>
                                                    <td>{{ $roomType->base_price }}</td>
                                                    <td>{{ $roomType->description }}</td>
                                                    <td class="text-right">
                                                        <a href="{{ url('roomtype/edit/'.$roomType->id) }}" style=" font-size: 23px; padding: 5px;">
                                                            <i class="fas fa-pencil-alt fa-xs"></i>
                                                        </a>
                                                        <a href="{{ route('roomtype.delete', ['id' => $roomType->id]) }}" onclick="return confirm('Are you sure you want to delete this Amenities?');" style="font-size: 23px; padding: 5px; color: red;">
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


