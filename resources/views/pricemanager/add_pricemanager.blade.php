@extends('layouts.master')

@section('content')
<style>
    .avatar {
        background-color: #aaa;
        border-radius: 50%;
        color: #fff;
        display: inline-block;
        font-weight: 500;
        height: 38px;
        line-height: 38px;
        margin: -38px 10px 0 0;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        vertical-align: middle;
        width: 38px;
        position: relative;
        white-space: nowrap;
        z-index: 2;
    }

    .day-price-grid {
        margin-top: 20px;
    }

    .day-price-grid .col-md-4 {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
    }
</style>

{{-- message --}}
{!! Toastr::message() !!}

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-title mt-5">{{ isset($priceManager) ? 'Edit Price Manager' : 'Add Price Manager' }}</div>
                </div>
            </div>
        </div>

        <!-- Form Row -->
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ url('pricemanager/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($priceManager))
                        <input type="hidden" name="id" value="{{ $priceManager->id }}">
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Room Type</label>
                                <select class="form-control @error('room_type_id') is-invalid @enderror" id="room_type_id" name="room_type_id">
                                    <option selected disabled> --Select Room Type-- </option>
                                    @foreach ($roomtypes as $roomtype)
                                        <option value="{{ $roomtype->id }}" {{ (isset($priceManager) && $priceManager->room_type_id == $roomtype->id) ? 'selected' : '' }}>
                                            {{ $roomtype->room_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('room_type_id')
                                <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="day-price-grid">
                                <label>Prices for Each Day of the Week</label>
                                <div class="row" id="day-prices">
                                    <!-- Columns will be inserted here by JavaScript -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary buttonedit1">{{ isset($priceManager) ? 'Update' : 'Create New Price Manager' }}</button>
                    @if (isset($priceManager))
                    <a href="{{ route('pricemanager/add') }}"  type="submit" class="btn btn-secondary  padding:10px" style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
                @endif
                </form>
            </div>
        </div><br/>

        <!-- Data Table Row -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body booking_card">
                        <div class="table-responsive">
                            <table class="datatable1 table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Room Type Name</th>
                                        <th>Monday</th>
                                        <th>Tuesday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                        <th>Saturday</th>
                                        <th>Sunday</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($priceManagers as $price)
                                        <tr>
                                            <td>{{ $price->id }}</td>
                                            <td>{{ $price->roomType ? $price->roomType->room_name : 'N/A' }}</td>
                                            <td>{{ $price->monday_price }}</td>
                                            <td>{{ $price->tuesday_price }}</td>
                                            <td>{{ $price->wednesday_price }}</td>
                                            <td>{{ $price->thursday_price }}</td>
                                            <td>{{ $price->friday_price }}</td>
                                            <td>{{ $price->saturday_price }}</td>
                                            <td>{{ $price->sunday_price }}</td>
                                            <td class="text-right">
                                                <a class="dropdown-item-sm" style="font-size: 23px; padding: 5px; color: #009688;" href="{{ url('pricemanager/edit/'.$price->id) }}"><i class="fas fa-pencil-alt fa-xs"></i></a>
                                                <a href="{{ route('pricemanager.delete', ['id' => $price->id]) }}" onclick="return confirm('Are you sure you want to delete this Position?');" style="font-size: 23px; padding: 5px; color: #009688;">
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

        // Define the days of the week
        const daysOfWeek = [
            { name: 'monday', label: 'Monday' },
            { name: 'tuesday', label: 'Tuesday' },
            { name: 'wednesday', label: 'Wednesday' },
            { name: 'thursday', label: 'Thursday' },
            { name: 'friday', label: 'Friday' },
            { name: 'saturday', label: 'Saturday' },
            { name: 'sunday', label: 'Sunday' }
        ];

        // Get the container where the fields will be appended
        const container = $('#day-prices');
        const preSetValues = @json(isset($priceManager) ? $priceManager->toArray() : []);

        daysOfWeek.forEach((day, index) => {
            const colSize = 2;
            const value = preSetValues[day.name + '_price'] || '';
            const column = `
                <div class="col-md-${colSize}">
                    <div class="form-group">
                        <label for="${day.name}_price">${day.label}</label>
                        <input type="number" name="${day.name}_price" id="${day.name}_price" class="form-control" value="${value}">
                    </div>
                </div>
            `;
            container.append(column);
            if ((index + 1) % 6 === 0) {
                container.append('</div><div class="row">');
            }
        });
        if (container.children().last().is('div.row')) {
            container.append('</div>');
        }
    });
</script>

@endsection
@endsection
