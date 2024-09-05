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
                            <h4 class="card-title float-left mt-2">Contact List</h4></div>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact )
                                                <tr>
                                                    <td>{{ $contact->id }}</td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->subject }}</td>
                                                    <td class="text-right">
                                                        <a data-toggle="modal" data-target="#exampleModal{{ $contact->id }}"
                                                            class="view-customer"
                                                            style="font-size: 23px; padding: 5px; color: #009688; cursor:pointer">
                                                            <i class="fas fa-eye fa-xs"></i>
                                                        </a>
                                                        <a href="{{ route('contact.delete', ['id' => $contact->id]) }}" onclick="return confirm('Are you sure you want to delete this Contact?');" style="font-size: 23px; padding: 5px; color: #009688;">
                                                            <i class="fas fa-trash fa-xs"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <!-- View Modal -->
                                            <div class="modal fade" id="exampleModal{{ $contact->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document"
                                                    style="max-width: 990px; width: 990px; height: 500px;">
                                                    <div class="modal-content" style="border-radius: 10px; height: 100%;">
                                                        <div class="modal-header text-white"
                                                            style="background-color: #009688; color: white !important;">
                                                            <h5 class="modal-title" id="exampleModalLabel">Contact Details
                                                            </h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body mt-4"
                                                            style="padding: 20px; height: calc(100% - 120px); overflow-y: auto;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h6 class="text-muted">Contact Details</h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <p><strong>Name:</strong> <span
                                                                                    id="contact-name">{{ $contact->name }}
                                                                            </span></p>
                                                                            <p><strong>Email:</strong> <span
                                                                                    id="email">{{ $contact->email }}</span>
                                                                            </p>
                                                                            <p><strong>Subject:</strong> <span
                                                                                    id="subject">{{ $contact->subject }}</span>
                                                                            </p>
                                                                            <p><strong>Message:</strong> <span
                                                                                id="floor-room_type">{{ $contact->message }}</span>
                                                                            </p>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer bg-light mb-1" style="height: 60px;">
                                                            <button type="button" class="btn btn-info  hover-btn"
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
        @section('script')
        <script>
            $(document).ready(function() {
                $('.datatable1').DataTable();
            });
        </script>
        @endsection
@endsection
