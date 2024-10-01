@extends('layouts.master')
@section('content')
<style>
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
            color: #009688 !important;
        }

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

        .table-fixed {
    table-layout: fixed; /* Use fixed table layout */
    width: 100%; /* Set table width */
}

.table-fixed th, .table-fixed td {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap; /* Prevents text from wrapping */
}

.table-fixed td {
    /* Set fixed widths for specific columns */
}

.table-fixed th:nth-child(1) { width: 3%; }  /* No */
.table-fixed th:nth-child(2) { width: 5%; } /* Image */
.table-fixed th:nth-child(3) { width: 10%; } /* Client Name */
.table-fixed th:nth-child(4) { width: 57%; } /* Description */
.table-fixed th:nth-child(5) { width: 10%; } /* Country */
.table-fixed th:nth-child(6) { width: 10%; } /* State */
.table-fixed th:nth-child(7) { width: 5%; }  /* Actions */


    </style>
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Client Review</h4> <a href="{{ route('clientReview/add') }}" class="btn btn-primary float-right veiwbutton"><i
                                class="fas fa-plus mr-2"></i>Add Client Review</a> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body booking_card">
                                <div class="table-responsive">
                                <table class="datatable1 table-fixed table table-stripped table-hover table-center mb-0 w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Client Name</th>
                                                <th>Description</th>
                                                <th>Countey</th>
                                                <th>State</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allClientReviewList as $clientReview )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ URL::to('/assets/upload/'.$clientReview->image) }}" data-lightbox="clientReview" data-title="{{ $clientReview->client_name }}" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/upload/'.$clientReview->image) }}" alt="{{ $clientReview->image }}" width="80px">
                                                    </a>
                                                </td>
                                                <td>{{ $clientReview->client_name }}</td>
                                                <td >{{ $clientReview->description }}</td>
                                                <td>{{ $clientReview->country }}</td>
                                                <td>{{ $clientReview->state }}</td>
                                                <td class="text-right">
                                                    <a href="{{ url('clientReview/edit/'.$clientReview->id) }}" style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-pencil-alt fa-xs"></i>
                                                    </a>
                                                    <a href="{{ route('clientReview.delete', ['id' => $clientReview->id]) }}" onclick="return confirm('Are you sure you want to delete this Client Review?');" style="font-size: 23px; padding: 5px; color: #009688;">
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
        <script>
            $(document).ready(function() {
                $('.datatable1').DataTable({
                    responsive: true, // Enable responsive feature
                    autoWidth: false, // Prevent auto width calculations
                    columnDefs: [
                        { width: '3%', targets: 0 }, // For the first column (index 0)
                        { width: '5%', targets: 1 }, // For the second column (index 1)
                        { width: '10%', targets: 2 }, // For the third column (index 2)
                        { width: '57%', targets: 3 }, // For the fourth column (index 3)
                        { width: '10%', targets: 4 }, // For country (index 4)
                        { width: '10%', targets: 5 }, // For state (index 5)
                        { width: '5%', targets: 6 }   // For actions (index 6)
                    ]
                });
            });
        </script>
       
@endsection
