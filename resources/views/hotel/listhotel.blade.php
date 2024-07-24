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
                            <h4 class="card-title float-left mt-2">Hotel</h4> <a href="{{ route('hotel/add') }}" class="btn btn-primary float-right veiwbutton"><i
                                class="fas fa-plus mr-2"></i>Add Hotel</a> </div>
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
                                                    <a href="javascript:void(0);"
                                                       class="btn btn-sm toggle-status {{ $hotelList->status == 'active' ? 'bg-success-light' : 'bg-danger-light' }} mr-2"
                                                       data-id="{{ $hotelList->id }}"
                                                       data-status="{{ $hotelList->status }}">
                                                        {{ $hotelList->status }}
                                                    </a>
                                                </td>

                                                <td class="text-right">
                                                            <a class="dropdown-item-sm" style="font-size: 23px; padding: 5px; color: #009688;"  href="{{ url('hotel/edit/'.$hotelList->id) }}"><i class="fas fa-pencil-alt fa-xs"></i</a>

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        @section('script')
        <script>
            $(document).ready(function() {
                $('.datatable1').DataTable();
                $('.toggle-status').click(function() {
                    var hotelId = $(this).data('id');
                    var currentStatus = $(this).data('status');
                    var newStatus = currentStatus === 'active' ? 'inactive' : 'active';
                    var button = $(this);

                    $.ajax({
                        url: '{{ route('update.hotel.status') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            hotel_id: hotelId,
                            status: newStatus
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                button.data('status', response.new_status);
                                button.text(response.new_status);

                                // Update button classes
                                if (response.new_status === 'active') {
                                    button.removeClass('bg-danger-light').addClass('bg-success-light');
                                } else {
                                    button.removeClass('bg-success-light').addClass('bg-danger-light');
                                }
                            }
                        }
                    });
                });
            });
            </script>
        @endsection

@endsection
