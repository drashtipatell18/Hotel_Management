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
                                                    <a class="dropdown-item-sm" style="font-size: 23px; padding: 5px; color: #009688;"  href="{{ url('halltype/edit/'.$halltype->id) }}"><i class="fas fa-pencil-alt fa-xs"></i></a>

                                                    <a href="{{ route('halltype.delete', ['id' => $halltype->id]) }}" onclick="return confirm('Are you sure you want to delete this Hall Type?');" style="font-size: 23px; padding: 5px; color: #009688;">
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
