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
                                                <td>{{ $spa->category }}</td>
                                                <td>{{ $spa->description }}</td>
                                                <td>{{ $spa->price }}</td>
                                                <td><img src="{{ asset($spa->image) }}" style="width: 100px; height: auto;" class="avatar-img rounded-circle"></td>

                                                <td class="text-right">
                                                    <a class="dropdown-item-sm" style="font-size: 23px; padding: 5px; color: #009688;"  href="{{ url('spa/edit/'.$spa->id) }}"><i class="fas fa-pencil-alt fa-xs"></i></a>
                                                    <a href="{{ route('spa.delete', ['id' => $spa->id]) }}" onclick="return confirm('Are you sure you want to delete this Spa?');" style="font-size: 23px; padding: 5px; color: #009688;">
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
@endsection
