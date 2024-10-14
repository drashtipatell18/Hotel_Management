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
                            <h4 class="card-title float-left mt-2">Foods</h4> <a href="{{ route('food/add') }}" class="btn btn-primary float-right veiwbutton"><i
                                class="fas fa-plus mr-2"></i>Add Food</a> </div>
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
                                                <th>Food Image</th>
                                                <th>Food Name</th>
                                                <th>Description</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($foods as $food )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td> +
                                                <td>
                                                    <a href="{{ URL::to('/assets/upload/'.$food->food_image) }}" data-lightbox="food" data-title="{{ $food->name }}" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/upload/'.$food->food_image) }}" alt="{{ $food->food_image }}" width="80px">
                                                    </a>
                                                </td>
                                                <td>{{ $food->food_name }}</td>
                                                <td>{{ implode(' ', array_slice(explode(' ', $food->description), 0, 10)) }}
                                                <td class="text-right">
                                                    <a class="dropdown-item-sm" style="font-size: 23px; padding: 5px; color: #009688;"  href="{{ url('food/edit/'.$food->id) }}"><i class="fas fa-pencil-alt fa-xs"></i></a>

                                                    <a href="{{ route('food.delete', ['id' => $food->id]) }}" onclick="return confirm('Are you sure you want to delete this Food?');" style="font-size: 23px; padding: 5px; color: #009688;">
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
