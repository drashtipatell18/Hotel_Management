@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5">Add New Admin</h3>
                </div>
            </div>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('users.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="row formtype">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control  @error('lname') is-invalid @enderror"
                                    name="lname" value="{{ old('lname') }}">
                                @error('lname')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control  @error('phone_number') is-invalid @enderror"
                                    name="phone_number" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password">
                                @error('password')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

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
                                <label>Profile Image</label>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('profile') is-invalid @enderror"
                                                id="profile" name="profile"
                                                onchange="previewImage(event, 'profilePicPreview')">
                                            <input type="hidden" class="form-control" name="hidden_fileupload">
                                            <label class="custom-file-label" for="customFile">Choose
                                                file</label>
                                            @error('image')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="#">
                                            <img id="profilePicPreview" class="avatar-img"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary buttonedit1">Create New User</button>
        </form>
    </div>
</div>
<script>
    function previewImage(event, previewElementId) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById(previewElementId);
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

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

