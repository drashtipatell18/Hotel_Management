@extends('layouts.master')
@section('content')

    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-c
                enter">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="
                            card-title float-left mt-2">Floors</h4> <a href="{{ route('floor/add') }}"
                                class="btn btn-primary float-right veiwbutton"><i class="fas fa-plus mr-2"></i>Add Floor</a>
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
                                            <th>Floor Name</th>
                                            <th>Description</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($floors as $floor)
                                            <tr>

                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $floor->floor_name }}</td>
                                                <td>{{ $floor->description }}</td>
                                                <td class="text-right">
                                                    <a class="dropdown-item-sm"
                                                        style="font-size: 23px; padding: 5px; color: #009688;"
                                                        href="{{ url('floor/edit/' . $floor->id) }}"><i
                                                            class="f
                                                            as fa-pencil-alt fa-xs"></i></a>

                                                    <a href="{{ route('floor.delete', ['id' => $floor->id]) }}"
                                                        onclick="retu
                                                        
                                                        
                                                        rn confirm('Are you sure you want to delete this Floor?');"
                                                        style="font-size: 23px; padding: 5px; color: #009688;">
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
