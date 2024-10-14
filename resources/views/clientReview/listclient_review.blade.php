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
            font-size: 1.2rem;
            /* Adjust size as needed */
        }

        .text-warning {
            color: #ffd700;
            /* Gold color for filled stars */
        }

        .text-muted {
            color: #e0e0e0;
            /* Gray color for empty stars */
        }



        /* Actions */
    </style>
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Client Review</h4> <a
                                href="{{ route('clientReview/add') }}" class="btn btn-primary float-right veiwbutton"><i
                                    class="fas fa-plus mr-2"></i>Add Client Review</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table
                                    class="datatable1 table-fixed table table-stripped table-hover table-center mb-0 w-100">
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
                                        @foreach ($allClientReviewList as $clientReview)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ URL::to('/assets/upload/' . $clientReview->image) }}"
                                                        data-lightbox="clientReview"
                                                        data-title="{{ $clientReview->client_name }}"
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{ URL::to('/assets/upload/' . $clientReview->image) }}"
                                                            alt="{{ $clientReview->image }}" width="80px">
                                                    </a>
                                                </td>
                                                <td>{{ $clientReview->client_name }}</td>
                                                <td>{{ implode(' ', array_slice(explode(' ', $clientReview->description), 0, 10)) }}
                                                </td>
                                                <td>{{ $clientReview->country }}</td>
                                                <td>{{ $clientReview->state }}</td>
                                                <td class="text-right">
                                                    <a data-toggle="modal"
                                                        data-target="#exampleModal{{ $clientReview->id }}"
                                                        class="view-customer"
                                                        style="font-size: 23px; padding: 5px; color: #009688; cursor:pointer">
                                                        <i class="fas fa-eye fa-xs"></i>
                                                    </a>
                                                    <a href="{{ url('clientReview/edit/' . $clientReview->id) }}"
                                                        style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-pencil-alt fa-xs"></i>
                                                    </a>
                                                    <a href="{{ route('clientReview.delete', ['id' => $clientReview->id]) }}"
                                                        onclick="return confirm('Are you sure you want to delete this Client Review?');"
                                                        style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-trash fa-xs"></i>
                                                    </a>
                                                </td>
                                            </tr>



                                            <div class="modal fade" id="exampleModal{{ $clientReview->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document"
                                                    style="max-width: 990px; width: 990px; height: 500px;">
                                                    <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                        <div class="modal-header text-white"
                                                            style="background-color: #009688; color: white !important;">
                                                            <h5 class="modal-title" id="exampleModalLabel">clientReview
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
                                                                        $images = explode(',', $clientReview->image); // Split the comma-separated string into an array
                                                                        $firstImage = $images[0] ?? null; // Get the first image, if it exists
                                                                    @endphp

                                                                    @if ($firstImage)
                                                                        <!-- Check if there is a first image -->
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
                                                                    <h6 class="text-muted">ClientReview Details</h6>
                                                                    <hr>    
                                                                    <div class="row">
                                                                        <div class="col-md-10">

                                                                            <p><strong>Client Name:</strong> <span
                                                                                    id="clientReview-name">{{ $clientReview->client_name }}</span>
                                                                            </p>
                                                                            <p><strong>Description:</strong> <span
                                                                                    id="clientReview-name">{{ $clientReview->description }}</span>
                                                                            </p>
                                                                            <p><strong>Country:</strong> <span
                                                                                    id="clientReview-name">{{ $clientReview->country }}</span>
                                                                            </p>
                                                                            <p><strong>State :</strong> <span
                                                                                    id="clientReview-name">{{ $clientReview->state }}</span>
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
    <script>
        $(document).ready(function() {
            $('.datatable1').DataTable({
                responsive: true, // Enable responsive feature
                autoWidth: false, // Prevent auto width calculations
                columnDefs: [{
                        width: '3%',
                        targets: 0
                    }, // For the first column (index 0)
                    {
                        width: '5%',
                        targets: 1
                    }, // For the second column (index 1)
                    {
                        width: '10%',
                        targets: 2
                    }, // For the third column (index 2)
                    {
                        width: '57%',
                        targets: 3
                    }, // For the fourth column (index 3)
                    {
                        width: '10%',
                        targets: 4
                    }, // For country (index 4)
                    {
                        width: '10%',
                        targets: 5
                    }, // For state (index 5)
                    {
                        width: '5%',
                        targets: 6
                    } // For actions (index 6)
                ]
            });
        });
    </script>
@endsection
