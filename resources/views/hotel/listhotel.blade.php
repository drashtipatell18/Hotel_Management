@extends('layouts.master')
@section('content')
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {

            border: #009688;
            background-color: #009688;
            color: white !important;

        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #009688 !important;
        }
        .fa-star {
            font-size: 1.2rem; /* Adjust size as needed */
        }
        .text-warning {
            color: #ffd700; /* Gold color for filled stars */
        }
        .text-muted {
            color: #e0e0e0; /* Gray color for empty stars */
        }
    </style>
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Hotels</h4> <a href="{{ route('hotel/add') }}" class="btn btn-primary float-right veiwbutton"><i
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
                                                <th>No</th>
                                                <th>Hotel Image</th>
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
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($hotelList->images->isNotEmpty())
                                                        <a href="{{ URL::to('/assets/hotel/'.$hotelList->images->first()->hotel_image) }}" data-lightbox="hotel-{{ $hotelList->id }}" data-title="{{ $hotelList->name }}" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/hotel/'.$hotelList->images->first()->hotel_image) }}" alt="{{ $hotelList->name }}" width="80px">
                                                        </a>
                                                        @foreach ($hotelList->images->slice(1) as $image)
                                                            <a href="{{ URL::to('/assets/hotel/'.$image->hotel_image) }}" data-lightbox="hotel-{{ $hotelList->id }}" data-title="{{ $hotelList->name }}" style="display: none;">
                                                                <img src="{{ URL::to('/assets/hotel/'.$image->hotel_image) }}" alt="{{ $hotelList->name }}">
                                                            </a>
                                                        @endforeach
                                                    @else
                                                    <a class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/upload/imagen para todo.jpg') }}" alt="Default Image" width="80px">
                                                    </a>
                                                    @endif
                                                </td>
                                                <td>{{ $hotelList->name }}</td>
                                                <td>{{ $hotelList->email }}</td>
                                                <td>{{ $hotelList->phone }}</td>
                                                <td>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="fas fa-star {{ $hotelList->stars >= $i ? 'text-warning' : 'text-muted' }}"></i>
                                                    @endfor
                                                </td>
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
                                                    <a class="dropdown-item-sm"
                                                        style="font-size: 23px; padding: 5px; color: #009688;"
                                                        href="{{ url('hotel/edit/' . $hotelList->id) }}"><i
                                                            class="fas fa-pencil-alt fa-xs"></i</a>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('script')
    <script>
        $(document).ready(function() {
            $('.datatable1').DataTable();
            $(document).on('click', '.toggle-status', function() {
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
                                button.removeClass('bg-danger-light').addClass(
                                    'bg-success-light');
                            } else {
                                button.removeClass('bg-success-light').addClass(
                                    'bg-danger-light');
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
