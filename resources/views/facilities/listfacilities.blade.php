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
    </style>    
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">  
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Facilities</h4> <a href="{{ route('facilities/add') }}" class="btn btn-primary float-right veiwbutton"><i
                                class="fas fa-plus mr-2"></i>Add Facilities</a> </div>
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
                                                <th>Image</th>
                                                <th>Facilities Name</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allFacilitiesList as $facilities )
                                            <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @php
                                                            $images = explode(',', $facilities->image);
                                                            $firstImage = $images[0]; // Get the first image
                                                        @endphp
                                                        <a href="{{ URL::to('/assets/facilities/'.$firstImage) }}" data-lightbox="facilities-group-{{ $facilities->id }}" data-title="{{ $facilities->name }}" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/facilities  /'.$firstImage) }}" alt="{{ $firstImage }}" width="80px" onerror="this.onerror=null; this.src='{{ URL::to('/assets/upload/imagen para todo.jpg') }}';">
                                                        </a>
                                                        @foreach($images as $index => $image)
                                                            @if($index != 0)
                                                                <a href="{{ URL::to('/assets/facilities/'.$image) }}" data-lightbox="facilities-group-{{ $facilities->id }}" data-title="{{ $facilities->name }}" style="display: none;"></a>
                                                            @endif
                                                        @endforeach
                                                    </td>

                                                <td>{{ $facilities->name }}</td>
                                                <td>{{ $facilities->title }}</td>
                                                <td>{{ implode(' ', array_slice(explode(' ', $facilities->description), 0, 10)) }}</td>

                                                <td class="text-right">
                                                    <a data-toggle="modal" data-target="#exampleModal{{ $facilities->id }}"
                                                        class="view-customer"
                                                        style="font-size: 23px; padding: 5px; color: #009688; cursor:pointer">
                                                        <i class="fas fa-eye fa-xs"></i>
                                                    </a>
                                                    <a href="{{ url('facilities/edit/'.$facilities->id) }}" style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-pencil-alt fa-xs"></i>
                                                    </a>
                                                    <a href="{{ route('facilities.delete', ['id' => $facilities->id]) }}" onclick="return confirm('Are you sure you want to delete this Facilities?');" style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-trash fa-xs"></i>
                                                    </a>
                                                </td>
                                            </tr>


                                            <div class="modal fade" id="exampleModal{{ $facilities->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document"
                                                    style="max-width: 990px; width: 990px; height: 500px;">
                                                    <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                        <div class="modal-header text-white"
                                                            style="background-color: #009688; color: white !important;">
                                                            <h5 class="modal-title" id="exampleModalLabel">facilities Details
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
                                                                    $images = explode(',', $facilities->image); // Split the comma-separated string into an array
                                                                    $firstImage = $images[0] ?? null; // Get the first image, if it exists
                                                                @endphp
                                                            
                                                                @if($firstImage) <!-- Check if there is a first image -->
                                                                    <div class="col-md-4 text-center">
                                                                        <img class="avatar-img rounded"
                                                                            src="{{ URL::to('/assets/facilities/' . $firstImage) }}"
                                                                            alt="{{ $firstImage }}"
                                                                            style="width: 180px; height: 200px; object-fit: cover;" 
                                                                            onerror="this.onerror=null; this.src='{{ URL::to('/assets/facilities/men.jpg') }}';">
                                                                    </div>
                                                                @endif
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h6 class="text-muted">Facilities Details</h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                          
                                                                            <p><strong>Name:</strong> <span
                                                                                id="facilities-name">{{ $facilities->name }}</span>
                                                                            </p>
                                                                            <p><strong>title</strong> <span
                                                                                id="facilities-lname">{{ $facilities->title }}</span>
                                                                            </p>
                                                                            <p><strong>Description:</strong> <span
                                                                                id="facilities-date">{{ $facilities->description }}</span>
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
