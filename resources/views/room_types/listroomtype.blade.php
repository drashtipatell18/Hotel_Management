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
                            <h4 class="card-title float-left mt-2">Room Types</h4> <a href="{{ route('roomtype/add') }}" class="btn btn-primary float-right veiwbutton"><i
                                class="fas fa-plus mr-2"></i>Add Room Type</a> </div>
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
                                                <th>Member Capacity</th>
                                                <th>Base Price</th>
                                                <th>Extra Bed</th>
                                                <th>Per Extra Bed Price</th>
                                                <th>Extra Bed Quantity</th>
                                                <th>Base Price</th>
                                                <th>Status</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roomTypes as $roomType)
                                                <tr>
                                                    <td>{{ $roomType->room_name }}</td>
                                                    <td>{{ $roomType->capacity }}</td>
                                                    <td>{{ $roomType->base_price }}</td>
                                                    <td>{{ $roomType->extra_bed ? 'Yes' : 'No' }}</td>
                                                    <td>{{ $roomType->per_extra_bed_price }}</td>
                                                    <td>{{ $roomType->extra_bed_quantity }}</td>
                                                    <td>{{ $roomType->extra_bed_price }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-sm toggle-status {{ $roomType->status == 'active' ? 'bg-success-light' : 'bg-danger-light' }} mr-2"
                                                            data-id="{{ $roomType->id }}"
                                                            data-status="{{ $roomType->status }}">
                                                            {{ $roomType->status }}
                                                        </a>
                                                    </td>

                                                    <td class="text-right">
                                                        <a data-toggle="modal" data-target="#exampleModal{{ $roomType->id }}"
                                                            class="view-roomtype"
                                                            style="font-size: 23px; padding: 5px; color: #009688; cursor:pointer">
                                                            <i class="fas fa-eye fa-xs"></i>
                                                        </a>
                                                        <a href="{{ url('roomtype/edit/'.$roomType->id) }}"  style="font-size: 23px; padding: 5px; color: #009688;">
                                                            <i class="fas fa-pencil-alt fa-xs"></i>
                                                        </a>
                                                        <a href="{{ route('roomtype.delete', ['id' => $roomType->id]) }}" onclick="return confirm('Are you sure you want to delete this RoomType?');" style="font-size: 23px; padding: 5px; color: #009688;">
                                                            <i class="fas fa-trash fa-xs"></i>
                                                        </a>

                                                    </td>

                                                </tr>
                                                {{-- View Model  --}}

                                                <div class="modal fade" id="exampleModal{{ $roomType->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document"
                                                        style="max-width: 990px; width: 990px; height: 500px;">
                                                        <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                            <div class="modal-header text-white"
                                                                style="background-color: #009688; color: white !important;">
                                                                <h5 class="modal-title" id="exampleModalLabel">RoomType Details
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
                                                                            src="{{ URL::to('/assets/upload/' . $roomType->room_image) }}"
                                                                            alt="{{ $roomType->room_image }}"
                                                                            style="width: 180px; height: 200px; object-fit: cover;">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <h6 class="text-muted">Personal Information</h6>
                                                                        <hr>

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <p><strong>Room Name:</strong> <span
                                                                                        id="roomType-name">{{ $roomType->room_name }}
                                                                                        </span></p>
                                                                                <p><strong>Member Capacity:</strong> <span
                                                                                        id="roomType-capacity">{{ $roomType->capacity }}</span>
                                                                                </p>
                                                                                <p><strong>Base Price:</strong> <span
                                                                                    id="roomType-base_price">{{ $roomType->base_price }}</span>
                                                                                </p>
                                                                                <p><strong>Extra Bed:</strong> <span
                                                                                        id="roomType-extra_bed">{{ $roomType->extra_bed ? 'Yes' : 'No' }}</span>
                                                                                </p>
                                                                                <p><strong>Per Extra Bed Price:</strong> <span
                                                                                        id="roomType-per_extra_bed_price">{{ $roomType->per_extra_bed_price }}</span>
                                                                                </p>
                                                                                <p><strong>Extra Bed Quantity:</strong> <span
                                                                                        id="roomType-extra_bed_quantity">{{ $roomType->extra_bed_quantity }}</span>
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <p><strong>Extra Base Price :</strong> <span
                                                                                        id="roomType-extra_bed_price">{{ $roomType->extra_bed_price }}</span>
                                                                                </p>
                                                                                <p><strong>Amenities:</strong> <span id="roomType-amenities">
                                                                                    @foreach($amenities as $amenity)
                                                                                        @if(in_array($amenity->id, explode(',', $roomType->amenities_id)))
                                                                                            {{ $amenity->name }}
                                                                                            @if(!$loop->last), @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                </span></p>
                                                                                <p><strong>Description:</strong> <span
                                                                                        id="roomType-description">{{ $roomType->description }}</span>
                                                                                </p>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer bg-light mb-1" style="height: 60px;">
                                                                <button type="button" class="btn btn-info"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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
                        var roomtypeId = $(this).data('id');
                        var currentStatus = $(this).data('status');
                        var newStatus = currentStatus === 'active' ? 'inactive' : 'active';
                        var button = $(this);

                        $.ajax({
                            url: '{{ route('update.roomtype.status') }}',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                roomtype_id: roomtypeId,
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
@endsection


