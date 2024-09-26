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
                            <h4 class="card-title float-left mt-2">Smoking Prefrence</h4> <a href="{{ route('filter/smoking') }}" class="btn btn-primary float-right veiwbutton"><i
                                class="fas fa-plus mr-2"></i>Add Smpoking Prefrence</a> </div>
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
                                                <th>Smoking Prefrence</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listAllSmoking as $smoking )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @php
                                                        $images = explode(',', $smoking->image);
                                                        $firstImage = $images[0]; // Get the first image
                                                    @endphp
                                                    <a href="{{ URL::to('/assets/upload/'.$firstImage) }}" data-lightbox="smoking-group-{{ $smoking->id }}" data-title="{{ $smoking->name }}" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/upload/'.$firstImage) }}" alt="{{ $firstImage }}" width="80px" onerror="this.onerror=null; this.src='{{ URL::to('/assets/upload/imagen para todo.jpg') }}';">
                                                    </a>
                                                    @foreach($images as $index => $image)
                                                        @if($index != 0)
                                                            <a href="{{ URL::to('/assets/upload/'.$image) }}" data-lightbox="smoking-group-{{ $smoking->id }}" data-title="{{ $smoking->name }}" style="display: none;"></a>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $smoking->name }}</td>
                                                <td class="text-right">
                                                        <a href="{{ url('smoking/edit/'.$smoking->id) }}"  style="font-size: 23px; padding: 5px; color: #009688;">
                                                            <i class="fas fa-pencil-alt fa-xs"></i>
                                                        </a>
                                                        <a href="{{ route('smoking.delete', ['id' => $smoking->id]) }}" onclick="return confirm('Are you sure you want to delete this Smoking?');" style="font-size: 23px; padding: 5px; color: #009688;">
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
