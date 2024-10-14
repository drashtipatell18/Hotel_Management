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
                            <h4 class="card-title float-left mt-2">Halls</h4> <a href="{{ route('hall/add') }}"
                                class="btn btn-primary float-right veiwbutton"><i class="fas fa-plus mr-2"></i>Add Hall</a>
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
                                            <th>Hall Type Name</th>
                                            <th>Hall Number</th>
                                            <th>Status</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($halls as $hall)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $hall->floor ? $hall->floor->floor_name : 'N/A' }}</td>
                                                <td>{{ $hall->halltype ? $hall->halltype->halltype_name : 'N/A' }}</td>
                                                <td>{{ $hall->hall_number }}</td>
                                                <td>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm toggle-status {{ $hall->status == 'avaliable' ? 'bg-success-light' : 'bg-danger-light' }} mr-2"
                                                        data-id="{{ $hall->id }}" data-status="{{ $hall->status }}">
                                                        {{ $hall->status }}
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                    <a data-toggle="modal" data-target="#exampleModal{{ $hall->id }}"
                                                        class="view-customer"
                                                        style="font-size: 23px; padding: 5px; color: #009688; cursor:pointer">
                                                        <i class="fas fa-eye fa-xs"></i>
                                                    </a>
                                                    <a class="dropdown-item-sm"
                                                        style="font-size: 23px; padding: 5px; color: #009688;"
                                                        href="{{ url('hall/edit/' . $hall->id) }}"><i
                                                            class="fas fa-pencil-alt fa-xs"></i></a>

                                                    <a href="{{ route('hall.delete', ['id' => $hall->id]) }}"
                                                        onclick="return confirm('Are you sure you want to delete this Hall?');"
                                                        style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-trash fa-xs"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            
                                            <div class="modal fade" id="exampleModal{{ $hall->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document"
                                                    style="max-width: 990px; width: 990px; height: 500px;">
                                                    <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                        <div class="modal-header text-white"
                                                            style="background-color: #009688; color: white !important;">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hall Details
                                                            </h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body mt-4"
                                                            style="padding: 20px; height: calc(100% - 120px); overflow-y: auto;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h6 class="text-muted">Hall Details</h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-11">
                                                                            <p><strong>Hall Name:</strong> 
                                                                                <span>{{ $hall->hall_name }}</span>
                                                                            </p> 
                                                                            <p><strong>Hall Capacity:</strong> 
                                                                                <span>{{ $hall->hall_capacity }}</span>
                                                                            </p>
                                                                           
                                                                            <p><strong>Title:</strong> 
                                                                                <span>{{ $hall->title }}</span>
                                                                            </p>
                                                                            <p><strong>Base Price:</strong> 
                                                                                <span>{{ $hall->base_price }}</span>
                                                                            </p>
                                                                            <p><strong>Description:</strong> 
                                                                                <span>{{ $hall->description }}</span>
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
            $(document).on('click', '.toggle-status', function() {
                var hallId = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus === 'avaliable' ? 'notavaliable' : 'avaliable';
                var button = $(this);

                $.ajax({
                    url: '{{ route('update.hall.status') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        hall_id: hallId,
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            button.data('status', response.new_status);
                            button.text(response.new_status);

                            // Update button classes
                            if (response.new_status === 'avaliable') {
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
