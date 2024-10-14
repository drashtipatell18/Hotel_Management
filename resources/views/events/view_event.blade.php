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
                            <h4 class="card-title float-left mt-2">Events</h4> <a href="{{ route('event/add') }}"
                                class="btn btn-primary float-right veiwbutton"><i class="fas fa-plus mr-2"></i>Add Event</a>
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
                                            <th>Event Image</th>
                                            <th>Event Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Description</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event as $even)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="{{ URL::to('/assets/upload/' . $even->event_image) }}"
                                                                alt="{{ $even->event_image }}">
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td>{{ $even->event_name }}</td>
                                                <td>{{ $even->start_date }}</td>
                                                <td>{{ $even->end_date }}</td>
                                                <td>{{ implode(' ', array_slice(explode(' ', $even->description), 0, 10)) }}
                                                </td>
                                                <td class="text-right">
                                                    <a data-toggle="modal" data-target="#exampleModal{{ $even->id }}"
                                                        class="view-customer"
                                                        style="font-size: 23px; padding: 5px; color: #009688; cursor:pointer">
                                                        <i class="fas fa-eye fa-xs"></i>
                                                    </a>
                                                    <a class="dropdown-item-sm"
                                                        style="font-size: 23px; padding: 5px; color: #009688;"
                                                        href="{{ url('event/edit/' . $even->id) }}"><i
                                                            class="fas fa-pencil-alt fa-xs"></i></a>

                                                    <a href="{{ route('event.delete', ['id' => $even->id]) }}"
                                                        onclick="return confirm('Are you sure you want to delete this Event?');"
                                                        style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-trash fa-xs"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="exampleModal{{ $even->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document"
                                                    style="max-width: 990px; width: 990px; height: 500px;">
                                                    <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                        <div class="modal-header text-white"
                                                            style="background-color: #009688; color: white !important;">
                                                            <h5 class="modal-title" id="exampleModalLabel">Event
                                                                Details
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
                                                                    @php
                                                                        $images = explode(',', $even->event_image); // Split the comma-separated string into an array
                                                                        $event_image = $images[0] ?? null; // Get the first image, if it exists
                                                                    @endphp

                                                                    @if ($event_image)
                                                                        <!-- Check if there is a first image -->
                                                                        <div class="col-md-4 text-center">
                                                                            <img class="avatar-img rounded"
                                                                                src="{{ URL::to('/assets/upload/' . $event_image) }}"
                                                                                alt="{{ $event_image }}"
                                                                                style="width: 180px; height: 200px; object-fit: cover;"
                                                                                onerror="this.onerror=null; this.src='{{ URL::to('/assets/upload/men.jpg') }}';">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h6 class="text-muted">Event Details</h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <p><strong>Event Name:</strong> 
                                                                                <span>{{ $even->event_name }}</span>
                                                                            </p>
                                                                            <p><strong>Start Time:</strong> 
                                                                                <span>{{ $even->start_time }}</span>
                                                                            </p>
                                                                            <p><strong>End Time:</strong> 
                                                                                <span>{{ $even->end_time }}</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <p><strong>Start Date:</strong> 
                                                                                <span>{{ $even->start_date }}</span>
                                                                            </p>
                                                                            <p><strong>End Date:</strong> 
                                                                                <span>{{ $even->end_date }}</span>
                                                                            </p>
                                                                            <p><strong>Total Hours:</strong> 
                                                                                <span>{{ $even->total_hours }}</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <p><strong>Description:</strong> 
                                                                                <span>{{ $even->description }}</span>
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
