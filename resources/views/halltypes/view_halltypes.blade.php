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
                            <h4 class="card-title float-left mt-2">Hall Types</h4> <a href="{{ route('halltype/add') }}" class="btn btn-primary float-right veiwbutton"><i
                                class="fas fa-plus mr-2"></i>Add Hall Type</a> </div>
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
                                                <th>Hall type Image</th>
                                                <th>Hall Type Name</th>
                                                <th>Hall Capacity</th>
                                                <th>Base Price</th>
                                                <th>Status</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($halltypes as $halltype )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/upload/'.$halltype->halltype_image) }}" alt="{{ $halltype->halltype_image }}">
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td>{{ $halltype->halltype_name }}</td>
                                                <td>{{ $halltype->halltype_capacity }}</td>
                                                <td>{{ $halltype->base_price }}</td>
                                                <td>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm toggle-status {{ $halltype->status == 'avaliable' ? 'bg-success-light' : 'bg-danger-light' }} mr-2"
                                                        data-id="{{ $halltype->id }}"
                                                        data-status="{{ $halltype->status }}">
                                                        {{ $halltype->status }}
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                    <a data-toggle="modal" data-target="#exampleModal{{ $halltype->id }}"
                                                        class="view-customer"
                                                        style="font-size: 23px; padding: 5px; color: #009688; cursor:pointer">
                                                        <i class="fas fa-eye fa-xs"></i>
                                                    </a>
                                                    <a class="dropdown-item-sm" style="font-size: 23px; padding: 5px; color: #009688;"  href="{{ url('halltype/edit/'.$halltype->id) }}"><i class="fas fa-pencil-alt fa-xs"></i></a>

                                                    <a href="{{ route('halltype.delete', ['id' => $halltype->id]) }}" onclick="return confirm('Are you sure you want to delete this Hall Type?');" style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-trash fa-xs"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="exampleModal{{ $halltype->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document"
                                                    style="max-width: 990px; width: 990px; height: 500px;">
                                                    <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                        <div class="modal-header text-white"
                                                            style="background-color: #009688; color: white !important;">
                                                            <h5 class="modal-title" id="exampleModalLabel">halltype Details
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
                                                                    $images = explode(',', $halltype->halltype_image); // Split the comma-separated string into an array
                                                                    $firstImage = $images[0] ?? null; // Get the first image, if it exists
                                                                @endphp
                                                            
                                                                @if($firstImage) <!-- Check if there is a first image -->
                                                                    <div class="col-md-4 text-center">
                                                                        <img class="avatar-img rounded"
                                                                            src="{{ URL::to('/assets/upload/' . $firstImage) }}"
                                                                            alt="{{ $firstImage }}"
                                                                            style="width: 180px; height: 200px; object-fit: cover;" 
                                                                            onerror="this.onerror=null; this.src='{{ URL::to('/assets/upload/men.jpg') }}';">
                                                                    </div>
                                                                @endif
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h6 class="text-muted">Halltype Details</h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                          
                                                                            <p><strong>Halltype Name:</strong> <span
                                                                                id="halltype-name">{{ $halltype->halltype_name }}</span>
                                                                            </p> 
                                                                            <p><strong>title:</strong> <span
                                                                                id="halltype-lname">{{ $halltype->title }}</span>
                                                                            </p>
                                                                            <p><strong>Halltype Capacity:</strong> <span
                                                                                id="halltype-date">{{ $halltype->halltype_capacity }}</span>
                                                                            </p>
                                                                            <p><strong>Base Price:</strong> <span
                                                                                id="halltype-date">{{ $halltype->base_price }}</span>
                                                                            </p>
                                                                            <p><strong>Description:</strong> <span
                                                                                id="halltype-date">{{ $halltype->description }}</span>
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
                            var halltypeId = $(this).data('id');
                            var currentStatus = $(this).data('status');
                            var newStatus = currentStatus === 'avaliable' ? 'notavaliable' : 'avaliable';
                            var button = $(this);

                            $.ajax({
                                url: '{{ route('update.halltype.status') }}',
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    halltype_id: halltypeId,
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
