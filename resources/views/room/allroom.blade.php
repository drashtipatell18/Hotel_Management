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
                            <h4 class="card-title float-left mt-2">All Rooms</h4>
                            <a href="{{ route('form/addroom/page') }}" class="btn btn-primary float-right veiwbutton"><i class="fas fa-plus mr-2"></i>Add Room</a>
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
                                            <th>Booking ID</th>
                                            <th>Room Image</th>
                                            <th>Floor Name</th>
                                            <th>Room Number</th>
                                            <th>Room Type</th>
                                            <th>Bed Count</th>
                                            <th>Rent</th>
                                            <th>Ph.Number</th>
                                            <th>Status</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allRooms as $rooms )
                                        <tr>
                                            {{-- <td hidden class="id">{{ $rooms->room_number }}</td>
                                            <td hidden class="image">{{ $rooms->image }}</td> --}}
                                            <td>{{ $rooms->id }}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"  src="{{ file_exists(public_path('assets/upload/'.$rooms->image)) && $rooms->image ? URL::to('/assets/upload/'.$rooms->image) : URL::to('/assets/upload/imagen para todo.jpg') }}" 
                                                        alt="{{ $rooms->image ?? 'Default Image' }}">
                                                    </a>
                                                </h2>
                                            </td>
                                            <td>{{ $rooms->floor->floor_name }}</td>
                                            <td>{{ $rooms->room_number }}</td>
                                            <td>{{ $rooms->roomType ? $rooms->roomType->room_name : 'N/A' }}</td>
                                            <td>{{ $rooms->bed_count }}</td>
                                            <td>{{ $rooms->rent }}</td>
                                            <td>{{ $rooms->phone_number }}</td>
                                            <td>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-sm toggle-status {{ $rooms->status == 'active' ? 'bg-success-light' : 'bg-danger-light' }} mr-2"
                                                    data-id="{{ $rooms->id }}"
                                                    data-status="{{ $rooms->status }}">
                                                    {{ $rooms->status == 'active' ? 'Available' : 'Not Available' }}
                                                </a>
                                            </td>

                                            <td class="text-right">
                                                <a data-toggle="modal" data-target="#exampleModal{{ $rooms->id }}"
                                                    class="view-customer"
                                                    style="font-size: 23px; padding: 5px; color: #009688;cursor:pointer">
                                                    <i class="fas fa-eye fa-xs"></i>
                                                </a>
                                                <a href="{{ url('form/room/edit/' . $rooms->id) }}"
                                                    style="font-size: 23px; padding: 5px; color: #009688;">
                                                    <i class="fas fa-pencil-alt fa-xs"></i>
                                                </a>
                                                <a href="{{ route('form/room/delete', ['id' => $rooms->id]) }}" onclick="return confirm('Are you sure you want to delete this Room?');" style="font-size: 23px; padding: 5px; color: #009688;">
                                                    <i class="fas fa-trash fa-xs"></i>
                                                </a>
                                            </td>
                                        </tr>

                                         <!-- View Modal -->
                                         <div class="modal fade" id="exampleModal{{ $rooms->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document"
                                                style="max-width: 990px; width: 990px; height: 500px;">
                                                <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                    <div class="modal-header text-white"
                                                        style="background-color: #009688; color: white !important;">
                                                        <h5 class="modal-title" id="exampleModalLabel">Room Details
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
                                                                <img class="avatar-img rounded"
                                                                    src="{{ URL::to('/assets/upload/' . $rooms->image) }}"
                                                                    alt="{{ $rooms->image }}"
                                                                    style="width: 180px; height: 200px; object-fit: cover;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h6 class="text-muted">Room Details</h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p><strong>Floor Name:</strong> <span
                                                                                id="floor-floor_name">{{  $rooms->floor->floor_name  }}</span></p>
                                                                        <p><strong>Room Number:</strong> <span
                                                                                id="floor-room_number">{{ $rooms->room_number }}</span>
                                                                        </p>
                                                                        <p><strong>Room Type:</strong> <span
                                                                                id="floor-room_type">{{ $rooms->roomType ? $rooms->roomType->room_name : 'N/A' }}</span>
                                                                        </p>
                                                                        <p><strong>Ac/Non Ac:</strong> <span
                                                                                id="floor-ac_non_ac ">{{ $rooms->ac_non_ac }}</span>
                                                                        </p>
                                                                        <p><strong>Food:</strong> <span
                                                                                id="floor-food">{{ $rooms->food->food_name }}</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p><strong>Bed Count:</strong> <span
                                                                                id="floor-total-number">{{ $rooms->bed_count }}</span>
                                                                        </p>
                                                                        <p><strong>Rent:</strong> <span
                                                                                id="floor-time">{{ $rooms->rent }}</span>
                                                                        </p>
                                                                        <p><strong>Phone Number:</strong> <span
                                                                                id="floor-arrival-date">{{ $rooms->phone_number }}</span>
                                                                        </p>
                                                                        <p><strong>Room Size:</strong> <span
                                                                            id="floor-arrival-date">{{ $rooms->room_size }}</span>
                                                                        </p>
                                                                        <p><strong>Meassage:</strong> <span
                                                                                id="floor-departure-date">{{ $rooms->message }}</span>
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



                                        {{-- End Model --}}


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

            $(document).on('click', '.toggle-status', function() {
                var roomId = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus === 'active' ? 'inactive' : 'active';
                var button = $(this);

                $.ajax({
                    url: '{{ route('update.room.status') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        room_id: roomId,
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            // Update the status data attribute
                            button.data('status', response.new_status);

                            // Update button text based on the new status
                            var displayText = response.new_status === 'active' ? 'Available' : 'Not Available';
                            button.text(displayText);

                            // Update button classes based on the new status
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
