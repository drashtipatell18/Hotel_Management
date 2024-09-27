@extends('frontend.layouts.main')
@section('title', 'Edit Profile')
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

    .custom-dropdown {
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

    .dropdown-content {
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
            <form>
                <div class="row edit_1row pb-3">
                    <div class="col-lg-3">
                        <div class="profile-pic">
                            <img src="{{ url('frontend/img/my_profile.png') }}" alt="Profile Picture">
                            <button type="button" class="change-pic">Change</button>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="section">
                            <div class="personal-info">
                                <h2>Personal information</h2>
                                <div class="row">
                                    <div class="input-group">
                                        <label for="first-name">First Name</label>
                                        <input type="text" id="first-name" name="first-name" value="John">
                                    </div>
                                    <div class="input-group">
                                        <label for="last-name">Last Name</label>
                                        <input type="text" id="last-name" name="last-name" value="John">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" value="john123@gmail.com">
                                    </div>
                                    <div class="input-group">
                                        <label for="phone">Phone</label>
                                        <div class="phone-group y_select_drop">
                                            <div class="custom-dropdown w-auto" style="border-radius:0px;">
                                                <button class="text-decoration-none m-0 y_select_btn">+1

                                                </button>

                                                <div class="dropdown-content">
                                                    <span data-value="+1">+1</span>
                                                    <span data-value="+1">+1</span>
                                                    <span data-value="+44">+44</span>
                                                    <span data-value="+61">+61</span>
                                                    <!-- Add more options as needed -->
                                                </div>
                                            </div>
                                            <input class="select_drp" type="tel" id="phone" name="phone"
                                                value="234567891">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group">
                                        <label for="dob">Date of Birth (DD/MM/YYYY)</label>
                                        <input type="date" id="dob" name="dob" value="1977-08-07">
                                        <div class="custom-date-icon"></div>
                                    </div>
                                    <div class="input-group">
                                        <label for="nationality">Nationality</label>
                                        <input type="text" id="nationality" name="nationality" value="United States">
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
                                <div class="input-group">
                                    <label for="city">City</label>
                                    <input type="text" id="city" name="city" value="United States">
                                </div>
                                <div class="input-group">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" value="United States">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group">
                                    <label for="state">Country</label>
                                    <input type="text" id="state" name="state" value="United States">
                                </div>
                                <div class="input-group">
                                    <label for="postal-code">Postal Code</label>
                                    <input type="text" id="postal-code" name="postal-code" value="123456">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="save-button">
                    <a href="#" class="Custom_btn text-decoration-none">Save Changes</a>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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