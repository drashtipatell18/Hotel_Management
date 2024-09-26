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
                            <h4 class="card-title float-left mt-2">Additional Prefrence</h4> <a href="{{ route('additional/filter') }}" class="btn btn-primary float-right veiwbutton"><i
                                class="fas fa-plus mr-2"></i>Add Additional Prefrence</a> </div>
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
                                                <th>Additional Prefrence</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listAllAdditionalPrefrence as $additional )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @php
                                                        $images = explode(',', $additional->image);
                                                        $firstImage = $images[0]; // Get the first image
                                                    @endphp
                                                    <a href="{{ URL::to('/assets/upload/'.$firstImage) }}" data-lightbox="additional-group-{{ $additional->id }}" data-title="{{ $additional->name }}" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/upload/'.$firstImage) }}" alt="{{ $firstImage }}" width="80px">
                                                    </a>
                                                    @foreach($images as $index => $image)
                                                        @if($index != 0)
                                                            <a href="{{ URL::to('/assets/upload/'.$image) }}" data-lightbox="additional-group-{{ $additional->id }}" data-title="{{ $additional->name }}" style="display: none;"></a>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $additional->name }}</td>
                                                <td class="text-right">
                                                        <a href="{{ url('additional/edit/'.$additional->id) }}"  style="font-size: 23px; padding: 5px; color: #009688;">
                                                            <i class="fas fa-pencil-alt fa-xs"></i>
                                                        </a>
                                                        <a href="{{ route('additional.delete', ['id' => $additional->id]) }}" onclick="return confirm('Are you sure you want to delete this Add?');" style="font-size: 23px; padding: 5px; color: #009688;">
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
