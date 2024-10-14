@extends('frontend.layouts.main')
@section('title', 'Edit Profile')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="{{ url('frontend/js/jquery.nice-select.min.js') }}"></script>
<style>
    .d_box {
        position: relative;
        overflow: hidden; /* Ensures that anything outside the box is hidden */
    }
    .d_night {
        position: relative;
        z-index: 0; /* Ensures the ribbon stays above the price */
    }
</style>

<section class="d_p-25 d_room">
    <div class="container">
        <div class="row  d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="section-title">
                    <h5 class="text-center ">My profile</h5>
                </div>
            </div>
        </div>
        <div class="container mb-4">
            <div class="row my_profile_card">
                <div class="col-lg-2">
                    <div class="profile_img">
                        <img src="{{ $user->profile ? asset('assets/img/' . $user->profile) : asset('assets/img/men.jpg') }}" style="width: 300px;height: 178px;object-fit: fill;"  class="rounded-circle"  alt="logo">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="profile_detail">
                        <h5 class="text-dark mb-2">Personal information</h5>
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-1">First Name</p>
                                <h5 class="mb-2">{{ $user->name }} </h5>
                                <p class="mb-1">Email</p>
                                <h5 class="mb-2">{{ $user->email }}</h5>
                                <p class="mb-1">Date of Birth</p>
                                <h5 class="mb-2">{{ $user->dob }} </h5>
                            </div>
                            <div class="col-6">
                                <p class="mb-1">Last Name</p>
                                <h5 class="mb-2">{{ $user->lname }} </h5>
                                <p class="mb-1">Phone</p>
                                <h5 class="mb-2">{{$user->phone_number}}</h5>
                                <p class="mb-1">Address</p>
                                <h5 class="mb-2">{{ $user->address }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="edit_profile_btn pt-4">
                        <a href="{{route('editProfile')}}" class="Custom_btn text-decoration-none">Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="row my_profile_card">
                <div class="col-lg-2">
                    <div class="profile_img">

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="profile_detail">
                        <h5 class="text-dark mb-2 pt-3">Address</h5>
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-1">City</p>
                                    <h5 class="mb-2"> {{ $customer->city ?? 'N/A' }} </h5>
                                
                                <p class="mb-1">Country</p>
                                <h5 id="countrySpan" class="mb-2"> {{ $customer->country ?? 'N/A' }}</h5>
                            </div>
                            <div class="col-6">
                                <p class="mb-1">State</p>
                                <h5 id="stateSpan" class="mb-2">{{$customer->state ?? 'N/A' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const countrySelect = document.getElementById('country');
    const stateSelect = document.getElementById('state');
    const citySelect = document.getElementById('city');

    // Fetch countries on page load
    document.addEventListener('DOMContentLoaded', async () => {
        const selectedCountry = "{{ $customer->country ?? '' }}";
        const selectedState = "{{ $customer->state ?? '' }}";
        const selectedCity = "{{ $customer->city ?? '' }}";

        try {
            const countries = await fetchCountries();

            if (document.getElementById('countrySpan').innerHTML) {
                countries.forEach(country => {
                    if (country.iso2 == document.getElementById('countrySpan').innerText) {
                        document.getElementById('countrySpan').innerHTML = country.name
                    }
                });
            }

            populateCountries(countries, selectedCountry);

            if (selectedCountry) {
                const states = await fetchStates(selectedCountry);

                if (document.getElementById('stateSpan').innerHTML) {
                    states.forEach(state => {
                        if (state.iso2 == document.getElementById('stateSpan').innerText) {
                            document.getElementById('stateSpan').innerHTML = state.name
                        }
                    });
                }
               
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

