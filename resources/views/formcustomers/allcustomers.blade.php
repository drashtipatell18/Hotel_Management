@extends('layouts.master')
@section('content')
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Customers</h4> <a
                                href="{{ route('form/addcustomer/page') }}" class="btn btn-primary float-right veiwbutton"><i
                                    class="fas fa-plus mr-2"></i>Add Customers</a>
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
                                            <th>Customer Id</th>
                                            <th>Booking ID</th>
                                            <th>Profile Pic</th>
                                            <th>Name</th>
                                            <th>Ph.Number</th>
                                            <th>Birth Date</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allCustomers as $customers)
                                            <tr>
                                                {{-- <td hidden class="id">{{ $customers->id }}</td>
                                                    <td hidden class="fileupload">{{ $customers->fileupload }}</td> --}}
                                                <td>{{ $customers->id }}</td>
                                                <td>{{ $customers->bkg_customer_id }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="{{ URL::to('/assets/upload/' . $customers->fileupload) }}"
                                                                alt="{{ $customers->fileupload }}">
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td><span>{{ $customers->name }} {{ $customers->lname }}</span></td>
                                                <td>{{ $customers->ph_number }}</td>
                                                <td>{{ $customers->date }}</td>
                                                <td>{{ $customers->gender }}</td>
                                                <td>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm toggle-status {{ $customers->status == 'active' ? 'bg-success-light' : 'bg-danger-light' }} mr-2"
                                                        data-id="{{ $customers->id }}"
                                                        data-status="{{ $customers->status }}">
                                                        {{ $customers->status }}
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                    <a data-toggle="modal" data-target="#exampleModal{{ $customers->id }}"
                                                        class="view-customer"
                                                        style="font-size: 23px; padding: 5px; color: #009688; cursor:pointer">
                                                        <i class="fas fa-eye fa-xs"></i>
                                                    </a>
                                                    <a href="{{ url('form/customer/edit/' . $customers->id) }}"
                                                        style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-pencil-alt fa-xs"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                            <!-- View Modal -->
                                            <div class="modal fade" id="exampleModal{{ $customers->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document"
                                                    style="max-width: 990px; width: 990px; height: 500px;">
                                                    <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                        <div class="modal-header text-white"
                                                            style="background-color: #009688; color: white !important;">
                                                            <h5 class="modal-title" id="exampleModalLabel">Customer Details
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
                                                                        src="{{ URL::to('/assets/upload/' . $customers->fileupload) }}"
                                                                        alt="{{ $customers->fileupload }}"
                                                                        style="width: 180px; height: 200px; object-fit: cover;">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h6 class="text-muted">Customer Details</h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <p><strong>Name:</strong> <span
                                                                                    id="customer-name">{{ $customers->name }}
                                                                                    {{ $customers->lname }}</span></p>
                                                                            <p><strong>Email:</strong> <span
                                                                                    id="customer-email">{{ $customers->email }}</span>
                                                                            </p>
                                                                            <p><strong>Date:</strong> <span
                                                                                    id="customer-date">{{ $customers->date }}</span>
                                                                            </p>
                                                                            <p><strong>Gender:</strong> <span
                                                                                    id="customer-gender">{{ $customers->gender }}</span>
                                                                            </p>
                                                                            <p><strong>Room Type:</strong> <span
                                                                                    id="customer-room-type">{{ $customers->room_type }}</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p><strong>Total Number:</strong> <span
                                                                                    id="customer-total-number">{{ $customers->total_numbers }}</span>
                                                                            </p>
                                                                            <p><strong>Time:</strong> <span
                                                                                    id="customer-time">{{ $customers->time }}</span>
                                                                            </p>
                                                                            <p><strong>Arrival Date:</strong> <span
                                                                                    id="customer-arrival-date">{{ $customers->arrival_date }}</span>
                                                                            </p>
                                                                            <p><strong>Departure Date:</strong> <span
                                                                                    id="customer-departure-date">{{ $customers->depature_date }}</span>
                                                                            </p>
                                                                            <p><strong>Phone:</strong> <span
                                                                                    id="customer-phone">{{ $customers->ph_number }}</span>
                                                                            </p>
                                                                            <p><strong>Address:</strong> <span
                                                                                    id="customer-address">{{ $customers->address }}</span>
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
                var customerId = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus === 'active' ? 'inactive' : 'active';
                var button = $(this);

                $.ajax({
                    url: '{{ route('update.customer.status') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        customer_id: customerId,
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

            // Particular Customer Record

            $('.view-customer').click(function() {
                var customerId = $(this).data('id');

                $.ajax({
                    url: '{{ route('get.customer.details') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: customerId
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            var customer = response.customer;
                            $('#customer-name').text(customer.name + ' ' + customer.lname);
                            $('#customer-phone').text(customer.ph_number);
                            $('#customer-birthdate').text(customer.date);
                            $('#customer-gender').text(customer.gender);
                            $('#customer-status').text(customer.status);
                        }
                    }
                });
            });

        });
    </script>
@endsection

@endsection
