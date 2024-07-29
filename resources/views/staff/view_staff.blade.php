@extends('layouts.master')
@section('content')
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Staff</h4> <a
                                href="{{ route('staff/add') }}" class="btn btn-primary float-right veiwbutton"><i
                                    class="fas fa-plus mr-2"></i>Add Staff</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table class="table table-stripped table table-hover table-center mb-0" id="datatable1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Profile Pic</th>
                                            <th>Hotel Name</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Ph.Number</th>
                                            <th>Position Name</th>
                                            <th>Status</th>
                                             <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allStaff as $staff)
                                            <tr>
                                                <td>{{ $staff->id }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="{{ URL::to('/assets/upload/' . $staff->profile_pic) }}"
                                                                alt="{{ $staff->profile_pic }}">
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td>{{ $staff->hotel ? $staff->hotel->name : 'N/A' }}</td>
                                                <td>{{ $staff->first_name }} {{ $staff->last_name }}</td>
                                                <td>{{ $staff->email }}</td>
                                                <td>{{ $staff->phone }}</td>
                                                <td>{{ $staff->position  ? $staff->position->name : 'N/A' }}</td>
                                                <td>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm toggle-status {{ $staff->status == 'active' ? 'bg-success-light' : 'bg-danger-light' }} mr-2"
                                                        data-id="{{ $staff->id }}"
                                                        data-status="{{ $staff->status }}">
                                                        {{ $staff->status }}
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                    <a data-toggle="modal" data-target="#exampleModal{{ $staff->id }}"
                                                        class="view-customer"
                                                        style="font-size: 23px; padding: 5px; color: #009688; cursor:pointer">
                                                        <i class="fas fa-eye fa-xs"></i>
                                                    </a>
                                                    <a href="{{ url('staff/edit/' . $staff->id) }}"
                                                        style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-pencil-alt fa-xs"></i>
                                                    </a>
                                                    <a href="{{ route('staff.delete', ['id' => $staff->id]) }}" onclick="return confirm('Are you sure you want to delete this Staff?');" style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-trash fa-xs"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                            <!-- View Modal -->
                                            <div class="modal fade" id="exampleModal{{ $staff->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document"
                                                    style="max-width: 990px; width: 990px; height: 500px;">
                                                    <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                        <div class="modal-header text-white"
                                                            style="background-color: #009688; color: white !important;">
                                                            <h5 class="modal-title" id="exampleModalLabel">Staff Details
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
                                                                        src="{{ URL::to('/assets/upload/' . $staff->profile_pic) }}"
                                                                        alt="{{ $staff->profile_pic }}"
                                                                        style="width: 180px; height: 200px; object-fit: cover;">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h6 class="text-muted">Staff Details</h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <p><strong>Hotel Name:</strong> <span
                                                                                id="staff-hotelname">{{ $staff->hotel ? $staff->hotel->name : 'N/A' }}</span>
                                                                            </p>
                                                                            <p><strong>First Name:</strong> <span
                                                                                id="staff-name">{{ $staff->first_name }}</span>
                                                                            </p>
                                                                            <p><strong>Last Name:</strong> <span
                                                                                id="staff-lname">{{ $staff->last_name }}</span>
                                                                            </p>
                                                                            <p><strong>Email:</strong> <span
                                                                                id="staff-date">{{ $staff->email }}</span>
                                                                            </p>
                                                                            <p><strong>Gender:</strong> <span
                                                                                id="staff-gender">{{ $staff->gender }}</span>
                                                                            </p>
                                                                            <p><strong>Phone Number:</strong> <span
                                                                                id="staff-phone">{{ $staff->phone }}</span>
                                                                            </p>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p><strong>Birth Date:</strong> <span
                                                                                id="staff-birthdate">{{ $staff->birth_date }}</span>
                                                                            </p>
                                                                            <p><strong>Position Name:</strong> <span
                                                                                id="staff-positionname">{{ $staff->position  ? $staff->position->name : 'N/A' }}</span>
                                                                            </p>
                                                                            <p><strong>Salary:</strong> <span
                                                                                id="staff-salary">{{ $staff->salary }}</span>
                                                                            </p>
                                                                            <p><strong>Hire Date:</strong> <span
                                                                                id="staff-hiredate">{{ $staff->hire_date }}</span>
                                                                            </p>
                                                                            <p><strong>Address:</strong> <span
                                                                                id="staff-address">{{ $staff->address }}</span>
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
            // Status Change

            $('#datatable1').DataTable();

            $('.toggle-status').click(function() {
                var staffId = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus === 'active' ? 'inactive' : 'active';
                var button = $(this);

                $.ajax({
                    url: '{{ route('update.staff.status') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        staff_id: staffId,
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
