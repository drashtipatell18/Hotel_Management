@extends('frontend.layouts.main')
@section('title', 'SpaBook Know')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
        .over {
            padding: 50px !important;
        }
    </style>

    <!-- Image section start -->

    <div class="owl-carousel owl-theme" id="d_test2">
        <div class="item">
            <div class="d_img">
                <img src="/img/d_img/spasilder1.png" alt="">
            </div>
        </div>
        <div class="item">
            <div class="d_img">
                <img src="/img/d_img/spasilder1.png" alt="">
            </div>
        </div>
        <div class="item">
            <div class="d_img">
                <img src="/img/d_img/spasilder1.png" alt="">
            </div>
        </div>
        <div class="item">
            <div class="d_img">
                <img src="/img/d_img/spasilder1.png" alt="">
            </div>
        </div>

    </div>


    <!-- Detail section start -->

    <section class="d_p-25 d_detail d_spa">
        <div class="d_container">
            <div class="row g-3">
                <div class="col-12 col-lg-4">
                    <div class="d_item">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Book</h5>
                            <h6>From ${{ $spas->price }}/person</h6>
                        </div>
                        <div class="row g-3 mt-1">
                        <div class="col-12">
                                    <div class="d_filed d-flex justify-content-between align-items-center">
                                        <div class="d_formsubtitle">Check in</div>
                                        <div class="d-flex align-items-center d_cal">
                                            <input type="datetime-local" class="ds" id="checkIn"
                                                name="check_in_datetime"
                                                style="color: black; background-color: white; padding-left: 7px; width:185px">
                                        </div>
                                    </div>

                                </div>
                            <div class="col-12">
                                <div
                                    class="d_filed d_select d-flex justify-content-between align-items-center position-relative">
                                    <div class="d_formsubtitle">Time</div>
                                    <div class="custom-select-wrapper">
                                        <div class="custom-select">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="custom-select-trigger">
                                                    <span class="d_time">09:00 am - 10:40 am</span>
                                                    <!-- <span class="d_price">$120</span> -->
                                                </div>
                                                <i class="fa-solid fa-angle-down"></i>
                                            </div>
                                            <div class="custom-options py-3">
                                                <div class="custom-option d-flex justify-content-between align-items-center"
                                                    data-time="09:00 am - 10:40 am" data-price="120">
                                                    <div class="d_time">09:00 am - 10:40 am</div>
                                                    <div class="d_price">${{ $spas->price }}</div>
                                                </div>
                                                <div class="custom-option d-flex justify-content-between align-items-center"
                                                    data-time="10:00 am - 11:40 am" data-price="140">
                                                    <div class="d_time">10:00 am - 11:40 am</div>
                                                    <div class="d_price">${{ $spas->price }}</div>
                                                </div>
                                                <div class="custom-option d-flex justify-content-between align-items-center"
                                                    data-time="11:00 am - 12:40 pm" data-price="150">
                                                    <div class="d_time">11:00 am - 12:40 pm</div>
                                                    <div class="d_price">${{ $spas->price }}</div>
                                                </div>
                                                <div class="custom-option d-flex justify-content-between align-items-center"
                                                    data-time="12:00 pm - 01:40 pm" data-price="150">
                                                    <div class="d_time">12:00 pm - 01:40 pm</div>
                                                    <div class="d_price">${{ $spas->price }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div
                                    class="d_filed d_select1 d-flex justify-content-between align-items-center position-relative">
                                    <div class="d_formsubtitle">Technician</div>
                                    <div class="custom-select-wrapper ">
                                        <div class="custom-select1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="custom-select-trigger1">Any Technician</div>
                                                <i class="fa-solid fa-angle-down"></i>
                                            </div>
                                            <div class="custom-options1 py-3">
                                                <div class="custom-option1" data-value="Any Technician">Any Technician
                                                </div>
                                                <div class="custom-option1" data-value="Female">Female</div>
                                                <div class="custom-option1" data-value="Male">Male</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d_filed d-flex justify-content-between align-items-center">
                                    <div class="d_formsubtitle">Person</div>
                                    <div class="d-flex d_btn">
                                        <button class="btn-decrement" data-target="room"><i
                                                class="fa-solid fa-minus"></i></button>
                                        <span id="room-count" class="mx-2">1</span>
                                        <button class="btn-increment" data-target="room"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="m-0 p-0">
                    <div class="d_item d_itme1">
                        <div class="d_total mt-3">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2>Total Cost</h2>
                                        <h5 id="total-cost">$0</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d_cta mt-3 text-center">
                                <a href="{{ route('spacheckout') }}" class="d-block d-sm-inline-block text-center">Book Treatment</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 ps-lg-5">
                    <div class="d_right">
                        <div class="d-sm-flex d-inline-block justify-content-between align-items-center mb-3">
                            <h2 class=" d_spatext">Custom Massage (100 min)</h2>
                            <h2 class="d_spatext">Starting from $120</h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                            ridiculus mus. </p>
                        <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                            quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim
                            justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis
                            pretium. Integer tincidunt. </p>
                        <div class="d_suite mt-xl-3 mt-3">
                            <h5>Remarks</h5>
                            <div class="mt-3">
                                <ul class="px-4">
                                    <li>*Price increases on weekends & holidays</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Detail section end -->
    <script>

        // select functionality

        document.addEventListener('DOMContentLoaded', function () {
            var customSelects = document.querySelectorAll('.custom-select');

            customSelects.forEach(function (customSelect) {
                var selectTrigger = customSelect.querySelector('.custom-select-trigger');
                var customOptions = customSelect.querySelector('.custom-options');
                var customOptionItems = customSelect.querySelectorAll('.custom-option');

                // Toggle the dropdown when the custom-select is clicked
                customSelect.addEventListener('click', function (event) {
                    // Prevent click event from bubbling up to the document
                    event.stopPropagation();
                    customSelect.classList.toggle('open');
                });

                // Update the trigger text and close the dropdown when an option is clicked
                customOptionItems.forEach(function (option) {
                    option.addEventListener('click', function (event) {
                        selectTrigger.textContent = this.textContent;
                        customSelect.classList.remove('open');
                        event.stopPropagation(); // Prevent click event from bubbling up
                    });
                });
            });

            // Close the dropdown if clicking outside of the custom-select
            document.addEventListener('click', function (event) {
                customSelects.forEach(function (customSelect) {
                    if (!event.target.closest('.custom-select')) {
                        customSelect.classList.remove('open');
                    }
                });
            });
        });
    </script>

    <script>

        // select functionality

        document.addEventListener('DOMContentLoaded', function () {
            var customSelects = document.querySelectorAll('.custom-select1');

            customSelects.forEach(function (customSelect) {
                var selectTrigger = customSelect.querySelector('.custom-select-trigger1');
                var customOptions = customSelect.querySelector('.custom-options1');
                var customOptionItems = customSelect.querySelectorAll('.custom-option1');

                // Toggle the dropdown when the custom-select is clicked
                customSelect.addEventListener('click', function (event) {
                    // Prevent click event from bubbling up to the document
                    event.stopPropagation();
                    customSelect.classList.toggle('open1');
                });

                // Update the trigger text and close the dropdown when an option is clicked
                customOptionItems.forEach(function (option) {
                    option.addEventListener('click', function (event) {
                        selectTrigger.textContent = this.textContent;
                        customSelect.classList.remove('open1');
                        event.stopPropagation(); // Prevent click event from bubbling up
                    });
                });
            });

            // Close the dropdown if clicking outside of the custom-select
            document.addEventListener('click', function (event) {
                customSelects.forEach(function (customSelect) {
                    if (!event.target.closest('.custom-select1')) {
                        customSelect.classList.remove('open1');
                    }
                });
            });
        });

    </script>


     <!-- // total price functionality -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const timeSelect = document.querySelector('.d_select .custom-select');
            const timeOptions = document.querySelectorAll('.d_select .custom-option');
            const personCount = document.getElementById('room-count');
            const decrementBtn = document.querySelector('.btn-decrement');
            const incrementBtn = document.querySelector('.btn-increment');
            const totalCostElement = document.getElementById('total-cost');
            const customSelectTrigger = document.querySelector('.custom-select-trigger');

            let selectedPrice = 0; // Default price
            let persons = 1; // Default number of persons

            // Time selection functionality
            timeSelect.addEventListener('click', function () {
                this.querySelector('.custom-options').classList.toggle('open');
            });

            timeOptions.forEach(option => {
                option.addEventListener('click', function () {
                    const selectedTime = this.querySelector('.d_time').textContent;
                    const selectedPriceText = this.querySelector('.d_price').textContent;
                    selectedPrice = parseInt(selectedPriceText.replace('$', ''));

                    customSelectTrigger.innerHTML = `
                        <span class="d_time">${selectedTime}</span>
                        <span class="d_price">$${selectedPrice}</span>
                    `;

                    updateTotalCost();
                });
            });

            // Person increment/decrement functionality
            decrementBtn.addEventListener('click', function () {
                if (persons > 1) {
                    persons--;
                    updatePersonCount();
                }
            });

            incrementBtn.addEventListener('click', function () {
                persons++;
                updatePersonCount();
            });

            function updatePersonCount() {
                personCount.textContent = persons;
                updateTotalCost();
            }

            // Update total cost
            function updateTotalCost() {
                const total = selectedPrice * persons;
                totalCostElement.textContent = `$${total}`;
            }

            // Initial total cost calculation
            updateTotalCost();

            // Close the time options dropdown when clicking outside
            document.addEventListener('click', function (event) {
                if (!timeSelect.contains(event.target)) {
                    timeSelect.querySelector('.custom-options').classList.remove('open');
                }
            });
        });
    </script>

    <!-- select 1  -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const customSelect = document.querySelector('.custom-select');
            const customSelectTrigger = document.querySelector('.custom-select-trigger');
            const customOptions = document.querySelectorAll('.custom-option');
            const totalCostElement = document.getElementById('total-cost');

            customSelectTrigger.addEventListener('click', function () {
                customSelect.classList.toggle('open');
            });

            customOptions.forEach(option => {
                option.addEventListener('click', function () {
                    const selectedTime = this.getAttribute('data-time');
                    const selectedPrice = this.getAttribute('data-price');

                    customSelectTrigger.querySelector('.d_time').textContent = selectedTime;

                    customOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');

                    customSelect.classList.remove('open');

                    // Update total cost
                    totalCostElement.textContent = `$${selectedPrice}`;
                });
            });

            document.addEventListener('click', function (e) {
                if (!customSelect.contains(e.target)) {
                    customSelect.classList.remove('open');
                }
            });
        });
    </script>
    
@endsection


