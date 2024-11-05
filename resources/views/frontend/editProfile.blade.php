@extends('frontend.layouts.main')
@section('title', 'Hotel Management: Edit Profile')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .d_box {
        position: relative;
        overflow: hidden;
    }

    .d_night {
        position: relative;
        z-index: 0;
    }

    .custom-dropdown1 {
        position: relative;
        display: inline-block;
        width: 200px;
    }

    .y_select_btn {
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #fff;
        font-size: 16px;
        text-align: left;
        cursor: pointer;
        position: relative;
        z-index: 1000;
    }

    .dropdown-content{
        display: none;
        position: absolute;
        background-color: #1A2142;
        min-width: 100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        z-index: 1000;
    }

    .dropdown-content span {
        display: block;
        padding: 8px;
        color: #fff;
        text-decoration: none;
    }

    .dropdown-content span:hover {
        background-color: #1A2142;
    }

    .y_select_btn {
        background-color: #1A2142;
        color: white !important;
    }

    .nice-select {
        width: 100%;
        border: 1px solid;
        border-radius: 1px;

    }
    .dropdown-toggle::after {
        display: contents;
    }
    .edit_profile .profile-pic {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<section class="d_p-25 d_room">
    <div class="d_container mb-4">
        <div class="row  d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="section-title">
                    <h5 class="text-center ">Edit profile</h5>
                </div>
            </div>
        </div>
        <div class="container edit_profile">
            <form action="{{ route('updateprofiledata') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row edit_1row pb-3">
                    <div class="col-lg-3">
                        <div class="profile-pic">
                            <img src="{{ $user->profile ? asset('assets/img/' . $user->profile) : asset('assets/img/men.jpg') }}"
                                style="width: 193px;height: 192px;object-fit: fill;" class="rounded-circle" alt="logo">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="section">
                            <div class="personal-info">
                                <h2>Personal information</h2>
                                <div class="row">
                                    <div class="input-group">
                                        <label for="first-name">First Name</label>
                                        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                                    </div>
                                    <div class="input-group">
                                        <label for="last-name">Last Name</label>
                                        <input type="text" id="lname" name="lname" value="{{ $user->lname }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" value="{{ $user->email }}" required>
                                    </div>
                                    <div class="input-group">
                                        <label for="email">Phone</label>
                                        <input type="tel" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group">
                                        <label for="dob">Date of Birth (DD/MM/YYYY)</label>
                                        <input type="date" class="birthdate" id="dob" name="dob"
                                            value="{{ $user->dob }}">
                                        <div class="custom-date-icon">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <label for="profile_pic">Profile Picture</label>
                                        <input type="file" id="profile" name="profile" accept="image/*"
                                            style="width: 100%;">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group" style="width: 96%;">
                                        <label for="address">Address</label>
                                        <textarea id="address" name="address" class="input-group"
                                            style="width: 100%; border: 1px solid; border-radius: 4px; padding: 10px; resize: vertical;"
                                            placeholder="Enter your address here...">{{ $user->address }}</textarea>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-9">
                        <div class="section">
                            <h2>Address</h2>
                            <div class="row">
                                <div class="input-group" style="width:96%">
                                    <label for="state">Country</label>
                                    <select id="country" onchange="getStates()" name="country">
                                    <option value="">Select Country</option>
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group">
                                    <label for="city">State</label>
                                    <select name="state" onchange="getCities()" id="state" class="">
                                    <option value="">Select State</option>
                                </select>
                                </div>
                                <div class="input-group">
                                    <label for="city">City</label>
                                    <select name="city" id="city" class="">
                                        <option value="">Select a city</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="save-button">
                    <button type="submit" class="Custom_btn text-decoration-none" style="background-color:#1A2142;">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>  
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function initDropdown() {
            // Select the dropdown elements
            const dropdownButton = document.querySelector('.y_select_btn'); // Updated to match the new HTML class
            const dropdownContent = document.querySelector('.dropdown-content');
            const options = dropdownContent.querySelectorAll('span');

            // Toggle dropdown visibility on button click
            dropdownButton.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default anchor action (e.g., navigation)
                event.stopPropagation(); // Prevent click event from bubbling up
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
            });

            // Handle option selection
            options.forEach(option => {
                option.addEventListener('click', function (event) {
                    event.preventDefault(); // Prevent default action (e.g., navigation)
                    event.stopPropagation(); // Prevent click event from bubbling up

                    // Update button text with selected value
                    dropdownButton.textContent = this.textContent;

                    // Hide the dropdown content
                    dropdownContent.style.display = 'none';

                    // Handle the selected value
                    console.log('Selected value:', this.dataset.value);
                });
            });

            // Close the dropdown if clicked outside
            document.addEventListener('click', function (event) {
                if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
                    dropdownContent.style.display = 'none';
                }
            });
        }

        // Initialize the dropdown functionality
        initDropdown();
    });
</script>

<script>
    const countrySelect = document.getElementById('country');
    const stateSelect = document.getElementById('state');
    const citySelect = document.getElementById('city');

    
    // Fetch countries on page load
    document.addEventListener('DOMContentLoaded', async () => {
        const selectedCountry = "{{ $customerEdit->country ?? '' }}";
        const selectedState = "{{ $customerEdit->state ?? '' }}";
        const selectedCity = "{{ $customerEdit->city ?? '' }}";

     

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

