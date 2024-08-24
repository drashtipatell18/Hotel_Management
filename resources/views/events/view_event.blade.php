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
                            <h4 class="card-title float-left mt-2">Events</h4> <a href="{{ route('event/add') }}" class="btn btn-primary float-right veiwbutton"><i
                                class="fas fa-plus mr-2"></i>Add Event</a> </div>
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
                                            @foreach ($event as $even )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/upload/'.$even->event_image) }}" alt="{{ $even->event_image }}">
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td>{{ $even->event_name }}</td>
                                                <td>{{ $even->start_date }}</td>
                                                <td>{{ $even->end_date }}</td>
                                                <td>{{ $even->description }}</td>
                                                <td class="text-right">
                                                    <a class="dropdown-item-sm" style="font-size: 23px; padding: 5px; color: #009688;"  href="{{ url('event/edit/'.$even->id) }}"><i class="fas fa-pencil-alt fa-xs"></i></a>

                                                    <a href="{{ route('event.delete', ['id' => $even->id]) }}" onclick="return confirm('Are you sure you want to delete this Event?');" style="font-size: 23px; padding: 5px; color: #009688;">
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
