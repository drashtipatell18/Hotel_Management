@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-title mt-5">{{ isset($event) ? 'Edit Event' : 'Add Event' }}</div>
                    </div>
                </div>
            </div>
            <form action="{{ isset($event) ? '/event/update/' . $event->id : '/event/store' }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hotel Name</label>
                                    <select class="form-control @error('hotel_id') is-invalid @enderror" id="hotel_id" name="hotel_id">
                                        <option selected disabled> --Select Hotel-- </option>
                                        @foreach ($hotels as $hotel)
                                            <option value="{{ $hotel->id }}" {{ isset($event) && $event->hotel_id == $hotel->id ? 'selected' : '' }}>
                                                {{ $hotel->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('hotel_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Event Name</label>
                                    <input type="text" class="form-control @error('event_name') is-invalid @enderror"name="event_name" value="{{ old('event_name', $event->event_name ?? '') }}">
                                    @error('event_name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Event Image</label>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="event_image" @error('event_image') is-invalid @enderror name="event_image" onchange="previewImage(event, 'profilePicPreview')">
                                                <input type="hidden" class="form-control" name="hidden_fileupload">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            @if(isset($event))
                                                <a href="#">
                                                    <img id="profilePicPreview" class="avatar-img" style="width: 50px; height: 50px; object-fit: cover;" src="{{ URL::to('/assets/upload/'.$event->event_image) }}" alt="{{ $event->event_image }}">
                                                </a>
                                            @else
                                                <img id="profilePicPreview" class="avatar-img"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date', $event->start_date ?? '') }}">
                                            @error('start_date')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4" style="margin-top: -32px">
                                            <label>Start Time</label>
                                            <input type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" id="start_time" value="{{ old('start_time', $event->start_time ?? '') }}">
                                            @error('start_time')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date', $event->end_date ?? '') }}">
                                            @error('end_date')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4" style="margin-top: -32px">
                                            <label>End Time</label>
                                            <input type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" id="end_time" value="{{ old('end_time', $event->end_time ?? '') }}">
                                            @error('end_time')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Hours</label>
                                    <input type="text" id="total_hours" name="total_hours" class="form-control" readonly value="{{ old('total_hours', $event->total_hours ?? '') }}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ old('description', $event->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">{{ isset($event) ? 'Update' : 'Create New Event' }}</button>
                @if (isset($floor))
                <a href="{{ route('floor/list') }}"  type="submit" class="btn btn-secondary  padding:10px" style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
                @endif
            </form>
        </div>
    </div>
@endsection
<script>
    function previewImage(event, previewElementId) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById(previewElementId);
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkInDate = document.getElementById('start_date');
        const checkInTime = document.getElementById('start_time');
        const checkOutDate = document.getElementById('end_date');
        const checkOutTime = document.getElementById('end_time');
        const totalHoursField = document.getElementById('total_hours');

        function calculateTotalHours() {
            if (checkInDate.value && checkInTime.value && checkOutDate.value && checkOutTime.value) {
                const checkInDateTime = new Date(`${checkInDate.value}T${checkInTime.value}`);
                const checkOutDateTime = new Date(`${checkOutDate.value}T${checkOutTime.value}`);
                const diffMs = checkOutDateTime - checkInDateTime;
                if (diffMs > 0) {
                    const diffHours = diffMs / (1000 * 60 * 60);
                    totalHoursField.value = diffHours.toFixed(2);
                } else {
                    totalHoursField.value = 'Invalid time range';
                }
            } else {
                totalHoursField.value = '';
            }
        }
        checkInDate.addEventListener('change', calculateTotalHours);
        checkInTime.addEventListener('change', calculateTotalHours);
        checkOutDate.addEventListener('change', calculateTotalHours);
        checkOutTime.addEventListener('change', calculateTotalHours);
    });
</script>

