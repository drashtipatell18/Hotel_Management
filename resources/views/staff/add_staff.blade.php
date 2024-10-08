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
</style>
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5">{{ isset($staff) ? 'Edit Staff' : 'Add Staff' }}</h3>
                </div>
            </div>
        </div>
        <form action="{{ isset($staff) ? '/staff/update/' . $staff->id : '/staff/store' }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="row formtype">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hotel Name</label>
                                <select class="form-control @error('hotel_id') is-invalid @enderror" id="hotel_id"
                                    name="hotel_id">
                                    <option value="" selected disabled> --Select Hotel Name-- </option>
                                    @foreach ($hotels as $hotel)
                                        <option value="{{ $hotel->id }}" {{ old('hotel_id', $selectedHotelId) == $hotel->id ? 'selected' : '' }}>
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
                                <label>First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    id="first_name" name="first_name"
                                    value="{{ old('first_name', $staff->first_name ?? '') }}">
                                @error('first_name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    id="last_name" name="last_name"
                                    value="{{ old('last_name', $staff->last_name ?? '') }}">
                                @error('last_name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email', $staff->email ?? '') }}">
                                @error('last_name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if(!isset($staff))
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation">
                                </div>
                            </div>
                        @endif

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Country</label>
                                <!-- <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country', $staff->country ?? '') }}"> -->
                                <select id="country" onchange="getStates()" name="country" class="form-control">
                                    <option value="">Select Country</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>State</label>
                                <!-- <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state', $staff->state ?? '') }}"> -->
                                <select name="state" onchange="getCities()" id="state" class="form-control">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City</label>
                                <!-- <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', $staff->city ?? '') }}"> -->
                                <select name="city" id="city" class="form-control">
                                    <option value="">Select a city</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Gender</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male"
                                            value="male" {{ old('gender', $staff->gender ?? '') == 'male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female"
                                            value="female" {{ old('gender', $staff->gender ?? '') == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="other"
                                            value="other" {{ old('gender', $staff->gender ?? '') == 'other' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                    @error('gender')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone', $staff->phone ?? '') }}">
                                @error('phone')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Profile Pic</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="profile_pic"
                                                name="profile_pic" onchange="previewImage(event, 'profilePicPreview')">
                                            <input type="hidden" class="form-control" name="hidden_fileupload">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        @if(isset($staff))
                                            <a href="#">
                                                <img id="profilePicPreview" class="avatar-img"
                                                    style="width: 50px; height: 50px; object-fit: cover;"
                                                    src="{{ URL::to('/assets/img/' . $staff->profile_pic) }}"
                                                    alt="{{ $staff->profile_pic }}"
                                                    onerror="this.onerror=null; this.src='{{ URL::to('/assets/img/men.jpg') }}';">
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
                                <label>Birth Date</label>
                                <div class="">
                                    <input type="date" id="birth_date"
                                        class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                                        value="{{ old('birth_date', $staff->birth_date ?? '') }}">
                                </div>
                            </div>
                            @error('birth_date')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Position Name</label>
                                <select class="form-control @error('position_id') is-invalid @enderror"
                                    id="position_id " name="position_id">
                                    <option value="" selected disabled> --Select Position Name-- </option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}" {{ old('position_id', $selectedPositionId) == $position->id ? 'selected' : '' }}>
                                            {{ $position->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('position_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="number" class="form-control @error('salary') is-invalid @enderror"
                                    name="salary" value="{{ old('salary', $staff->salary ?? '') }}">
                            </div>
                            @error('salary')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hire Date</label>
                                <div class="">
                                    <input type="date" id="hire_date"
                                        class="form-control @error('hire_date') is-invalid @enderror" name="hire_date"
                                        value="{{ old('hire_date', $staff->hire_date ?? '') }}">
                                </div>
                            </div>
                            @error('hire_date')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address (Proof) - Aadharcard</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="aadharcard"
                                                name="aadharcard"
                                                onchange="previewImage(event, 'aadharcardPreview', '{{ isset($staff) ? URL::to('/assets/upload/' . $staff->aadharcard) : '' }}')">
                                            <label class="custom-file-label" for="aadharcard">Choose file</label>
                                            @error('aadharcard')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        @if(isset($staff))
                                            <a href="#">
                                                <img id="aadharcardPreview" class="avatar-img"
                                                    style="width: 50px; height: 50px; object-fit: cover;"
                                                    src="{{ URL::to('/assets/upload/' . $staff->aadharcard) }}"
                                                    alt="{{ $staff->aadharcard }}"
                                                    onerror="this.onerror=null; this.src='{{ URL::to('/assets/upload/imagen para todo.jpg') }}';">
                                            </a>
                                        @else
                                            <img id="aadharcardPreview" class="avatar-img"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" rows="5"
                                    id="message" name="address">{{ old('address', $staff->address ?? '') }}</textarea>
                                @error('address')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary buttonedit1">
                {{ isset($staff) ? 'Update' : 'Create New Staff' }}</button>
            @if (isset($staff))
                <a href="{{ route('staff/list') }}" type="submit" class="btn btn-secondary  padding:10px"
                    style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
            @endif
        </form>
    </div>
</div>
@section('script')
<script>
    function previewImage(event, previewElementId) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById(previewElementId);
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<!-- Get All Country => States => City -->
<script>
    const countrySelect = document.getElementById('country');
    const stateSelect = document.getElementById('state');
    const citySelect = document.getElementById('city');

    // Fetch countries on page load
    document.addEventListener('DOMContentLoaded', async () => {
        const selectedCountry = "{{ $staff->country ?? '' }}"; // Replace with your backend data
        const selectedState = "{{ $staff->state ?? '' }}"; // Replace with your backend data
        const selectedCity = "{{ $staff->city ?? '' }}"; // Replace with your backend data

        try {
            const countries = await fetchCountries();
            populateCountries(countries, selectedCountry);

            if (selectedCountry) {
                const states = await fetchStates(selectedCountry);
                populateStates(states, selectedState);

                if (selectedState) {
                    const cities = await fetchCities(selectedCountry, selectedState);
                    populateCities(cities, selectedCity);
                }
            }
        } catch (error) {
            console.error("Error fetching data:", error);
        }
    });

    async function fetchCountries() {
        const response = await fetch('https://api.countrystatecity.in/v1/countries', {
            headers: {
                'X-CSCAPI-KEY': 'd2dtRzM0UmlYQWVDTmFGZ3pFVHB2anVISlJjWDM3ZHRuMGxQZ1FDag==' // Replace with your actual API key
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        return data; // The API returns an array of country objects
    }

    function populateCountries(countries, selectedCountry = '') {
        countries.forEach(country => {
            const option = document.createElement('option');
            option.value = country.iso2;
            option.textContent = country.name;
            if (country.iso2 === selectedCountry) {
                option.selected = true;
            }
            countrySelect.appendChild(option);
        });
    }

    // Event listener for country selection
    countrySelect.addEventListener('change', getStates);

    async function getStates() {
        const countryCode = countrySelect.value;
        if (countryCode) {
            try {
                const states = await fetchStates(countryCode);
                populateStates(states);
                stateSelect.disabled = false;
            } catch (error) {
                console.error("Error fetching states:", error);
            }
        } else {
            resetStateAndCitySelects();
        }
    }

    async function fetchStates(countryCode) {
        const response = await fetch(`https://api.countrystatecity.in/v1/countries/${countryCode}/states`, {
            headers: {
                'X-CSCAPI-KEY': 'd2dtRzM0UmlYQWVDTmFGZ3pFVHB2anVISlJjWDM3ZHRuMGxQZ1FDag==' // Replace with your actual API key
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        return data; // Adjust this based on the API response structure
    }


    function populateStates(states, selectedState = '') {
        stateSelect.innerHTML = '<option value="">Select State</option>';
        states.forEach(state => {
            const option = document.createElement('option');
            option.value = state.iso2;
            option.textContent = state.name;
            if (state.iso2 === selectedState) {
                option.selected = true;
            }
            stateSelect.appendChild(option);
        });
        resetCitySelect();
    }

    // Event listener for state selection
    stateSelect.addEventListener('change', getCities); // Uncomment this line

    async function getCities() {
        const stateCode = stateSelect.value;
        const countryCode = countrySelect.value;
        resetCitySelect();
        if (stateCode && countryCode) {
            try {
                const cities = await fetchCities(countryCode, stateCode);
                populateCities(cities);
                citySelect.disabled = false;
            } catch (error) {
                console.error("Error fetching cities:", error);
            }
        }
    }

    async function fetchCities(countryCode, stateCode) {
        const response = await fetch(`https://api.countrystatecity.in/v1/countries/${countryCode}/states/${stateCode}/cities`, {
            headers: {
                'X-CSCAPI-KEY': 'd2dtRzM0UmlYQWVDTmFGZ3pFVHB2anVISlJjWDM3ZHRuMGxQZ1FDag==' // Replace with your actual API key
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        return data; // Adjust this based on the API response structure
    }

    function populateCities(cities, selectedCity = '') {
        citySelect.innerHTML = '<option value="">Select City</option>';
        cities.forEach(city => {
            const option = document.createElement('option');
            option.value = city.name;
            option.textContent = city.name;
            if (city.name === selectedCity) {
                option.selected = true;
            }
            citySelect.appendChild(option);
        });
    }

    function resetStateAndCitySelects() {
        stateSelect.innerHTML = '<option value="">Select State</option>';
        resetCitySelect();
        stateSelect.disabled = true;
    }

    function resetCitySelect() {
        citySelect.innerHTML = '<option value="">Select City</option>';
        citySelect.disabled = true; // Disable city dropdown until a state is selected
    }

</script>

@endsection
@endsection