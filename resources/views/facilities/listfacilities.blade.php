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
                                                        <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/facilities/'.$firstImage) }}" alt="{{ $firstImage }}" width="80px" onerror="this.onerror=null; this.src='{{ URL::to('/assets/upload/imagen para todo.jpg') }}';">
                                                    </a>
                                                    @foreach($images as $index => $image)
                                                        @if($index != 0)
                                                            <a href="{{ URL::to('/assets/facilities/'.$image) }}" data-lightbox="facilities-group-{{ $facilities->id }}" data-title="{{ $facilities->name }}" style="display: none;"></a>
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <td>{{ $facilities->name }}</td>
                                                <td>{{ $facilities->title }}</td>
                                                <td>{{ $facilities->description }}</td>
                                                <td class="text-right">
                                                    <a href="{{ url('facilities/edit/'.$facilities->id) }}" style="font-size: 23px; padding: 5px; color: #009688;">
                                                        <i class="fas fa-pencil-alt fa-xs"></i>
                                                    </a>
                                                    <a href="{{ route('facilities.delete', ['id' => $facilities->id]) }}" onclick="return confirm('Are you sure you want to delete this Facilities?');" style="font-size: 23px; padding: 5px; color: #009688;">
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
