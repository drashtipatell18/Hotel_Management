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
                            <h4 class="card-title float-left mt-2">Daily Price List</h4><a href="{{ route('roomtype/add') }}" class="btn btn-secondary float-right">
                                Back</a> </div>

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
                                                <th>Id</th>
                                                <th>Room Type Name</th>
                                                <th>Monday <br/>({{ $dates['Monday'] }})</th>
                                                <th>Tuesday  <br/>({{ $dates['Tuesday'] }})</th>
                                                <th>Wednesday  <br/>({{ $dates['Wednesday'] }})</th>
                                                <th>Thursday  <br/>({{ $dates['Thursday'] }})</th>
                                                <th>Friday  <br/>({{ $dates['Friday'] }})</th>
                                                <th>Saturday <br/>({{ $dates['Saturday'] }})</th>
                                                <th>Sunday  <br/>({{ $dates['Sunday'] }})</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($priceManagers as $price)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $price->roomType ? $price->roomType->room_name : 'N/A' }}</td>
                                                <td>{{ $price->monday_price }}</td>
                                                <td>{{ $price->tuesday_price }}</td>
                                                <td>{{ $price->wednesday_price }}</td>
                                                <td>{{ $price->thursday_price }}</td>
                                                <td>{{ $price->friday_price }}</td>
                                                <td>{{ $price->saturday_price }}</td>
                                                <td>{{ $price->sunday_price }}</td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('script')
    <script>
        $(document).ready(function() {
            $('.datatable1').DataTable();
        });
    </script>
@endsection
