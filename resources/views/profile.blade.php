@extends('layouts.master')
@section('content')
<style>
    .profile-header img {
        height: 120px;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mt-5">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#"> <img class="rounded-circle" alt="User Image"
                                    src="{{ Auth::user()->profile ? asset('assets/img/' . Auth::user()->profile) : asset('assets/img/men.jpg') }}">
                            </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-3">{{ Auth::user()->name }}</h4>
                            <h6 class="text-muted mt-1">
                                @if(Auth::user()->role_id == 0)
                                    Admin
                                @elseif(Auth::user()->role_id == 1)
                                    Staff
                                @elseif(Auth::user()->role_id == 2)
                                    Account
                                @elseif(Auth::user()->role_id == 3)
                                    Customer
                                @endif
                            </h6>
                            <div class="user-Location mt-1"><i class="fas fa-map-marker-alt"></i> Florida, United States
                            </div>
                          
                            @if($staff)
                                <div class="about-text">{{ $staff->position->name }}</div>
                            @else
                                <div class="about-text"></div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab"
                                href="#per_details_tab">About</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                        </li>
                    </ul>
                </div> --}}
                <div class="tab-content profile-tab-cont">
                    <div class="tab-pane fade show active" id="per_details_tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Personal Details</span>
                                            <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i
                                                    class="fa fa-edit mr-1"></i>Edit</a>
                                        </h5>
                                        <div class="row mt-5">
                                            <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-9">{{Auth::user()->name}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                            <p class="col-sm-9">{{Auth::user()->dob}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Email ID </p>
                                            <p class="col-sm-9"><a href="#">{{Auth::user()->email}}</a></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Mobile</p>
                                            <p class="col-sm-9">{{Auth::user()->phone_number}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-sm-right mb-0">Address</p>
                                            <p class="col-sm-9 mb-0">
                                                @if($staff && $staff->address)
                                                    {{ $staff->address }},
                                                    <br> {{  $staff->state }},
                                                    {{   $staff->country }}.
                                                @else
                                                    <em>No address available</em>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Personal Details</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('profile.update') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row form-row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    value="{{ Auth()->user()->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" name="lname" class="form-control"
                                                                    value="{{Auth()->user()->lname}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="dob">Date of Birth</label>
                                                                <div class="cal-icon">
                                                                    <input type="date" name="dob" id="dob"
                                                                        class="form-control"
                                                                        value="{{Auth::user()->dob}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Email ID</label>
                                                                <input type="email" class="form-control" name="email"
                                                                    value="{{Auth::user()->email}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Mobile</label>
                                                                <input type="text" name="phone_number"
                                                                    class="form-control"
                                                                    value="{{Auth::user()->phone_number}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <h5 class="form-title"><span>Address</span></h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <textarea class="form-control" name="address"
                                                                    rows="3">{{ $staff->address ?? '' }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <select id="country" onchange="getStates()"
                                                                    name="country" class="form-control">
                                                                    <option value="">Select Country</option>
                                                                </select>
                                                                @error('country')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>State</label>
                                                                <select name="state" onchange="getCities()" id="state"
                                                                    class="form-control">
                                                                    <option value="">Select State</option>
                                                                </select>
                                                                @error('state')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror

                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <select id="city" class="form-control" name="city">
                                                                    <option value="">Select a city</option>
                                                                </select>
                                                            </div>
                                                        </div>




                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block">Save
                                                        Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Profile Pic</span>
                                        </h5>
                                        <div class="row">
                                            <div class="col-md-10 col-lg-12">
                                                <form action="{{ route('profilepic.updates') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Profile Pic</label>
                                                        <input type="file" name="profile" class="form-control">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update Profile
                                                        Pic</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Get All Country => State => City -->
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
            console.log(option.textContent);
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