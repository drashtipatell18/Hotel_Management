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
                            <h4 class="card-title float-left mt-2">Hotel</h4> <a href="{{ route('hotel/add') }}" class="btn btn-primary float-right veiwbutton">Add Hotel</a> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body booking_card">
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>email</th>
                                                <th>Phone</th>
                                                <th>Stars</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allHotelList as $hotelList )
                                            <tr>
                                                <td>{{ $hotelList->name }}</td>
                                                <td>{{ $hotelList->email }}</td>
                                                <td>{{ $hotelList->phone }}</td>
                                                <td>{{ $hotelList->stars }}</td>
                                                <td>{{ $hotelList->address }}</td>
                                                <td>
                                                    @if($hotelList->status == 'active')
                                                        <a class="btn btn-success">{{ $hotelList->status }}</a>
                                                    @else
                                                        <a class="btn btn-danger">{{ $hotelList->status }}</a>
                                                    @endif
                                                </td>

                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @if($hotelList->status == 'active')
                                                                <a class="dropdown-item" href="{{ url('hotel/edit/'.$hotelList->id) }}">
                                                                    <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                                                </a>
                                                            @endif
                                                            <a class="dropdown-item HotelDelete" data-toggle="modal" data-target="#delete_asset" data-id="{{ $hotelList->id }}">
                                                                <i class="fas fa-trash-alt m-r-5"></i> Delete
                                                            </a>
                                                        </div>
                                                    </div>
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

            {{-- delete model --}}
            <div id="delete_asset" class="modal fade delete-modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('hotel/delete') }}" method="POST">
                            @csrf
                            <div class="modal-body text-center"> <img src="{{ URL::to('assets/img/sent.png') }}" alt="" width="50" height="46">
                                <h3 class="delete_class">Are you sure want to delete this Asset?</h3>
                                <div class="m-t-20">
                                    <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                    <input class="form-control" type="hidden" id="e_id" name="id" value="">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- end delete model --}}
        </div>
        @section('script')
        {{-- delete model --}}
        <script>

        $(document).on('click','.HotelDelete',function()
        {
            $('#e_id').val($(this).data('id'));

        });

        </script>
        @endsection

@endsection
