@extends('frontend.layouts.main')
@section('title', 'SpaBook Know')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<style>
    .over {
        padding: 50px !important;
    }

    .bookButton {
        padding: 10px 93px;
        background-color: #fff;
        color: #1A2142;
        font-size: 16px;
        text-decoration: none;
        border-radius: 2px;
        font-weight: 600;
        transition: .3s all ease-in-out;
    }
    #d_test2 .owl-dots {
        text-align: center;
    }

    #d_test2 .owl-dots .owl-dot.active {
        width: 30px !important;
        background: #1A2142;
        height: 5px !important;
        border-radius: 7px;
        margin-left: 5px;
    }
    .owl-theme .owl-dots .owl-dot span{
        display: none;
    }
    .ms-2 {
        margin-left: -12px !important;
    }
</style>

<!-- Image section start -->

<div class="owl-carousel owl-theme" id="d_test2">
    @foreach($images as $image)
        <div class="item">
            <div class="d_img">
                <img src="{{ asset('assets/spa/' . $image) }}" alt="Spa Image">
            </div>
        </div>
    @endforeach
</div>


<!-- Detail section start -->

<section class="d_p-25 d_detail d_spa">
    <div class="d_container">
        <div class="row g-3">
            <div class="col-12 col-lg-4">
                <form action="{{ route('spabooknowstore', $spas->id) }}" method="post">
                    @csrf
                    <div class="d_item">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Book</h5>
                            <h6>From ${{ $spas->price }}/person</h6>
                        </div>
                        <div class="row g-3 mt-1">
                            <input type="hidden" name="price" value="{{ $spas->price }}">
                            <div class="col-12">
                                <div class="d_filed d-flex justify-content-between align-items-center">
                                    <div class="input-group d_formsubtitle">Check in</div>
                                    <div class="d-flex align-items-center d_cal">
                                        <input type="date" class="ds" name="checkin" style="width: 113px;" id="checkinDate"> 
                                        <i class="fa-solid fa-calendar ms-2" style="color: #ffffff; cursor: pointer;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div
                                    class="d_filed d_select d-flex justify-content-between align-items-center position-relative">
                                    <div class="d_formsubtitle">Time</div>
                                    <div class="custom-select-wrapper">
                                        <div class="custom-select">
                                            <!-- Added name="time" here -->
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="custom-select-trigger">
                                                    <span class="d_time">09:00 am - 10:40 am</span>
                                                    <!-- <span class="d_price">$120</span> -->
                                                </div>
                                                <i class="fa-solid fa-angle-down"></i>
                                            </div>
                                            <div class="custom-options py-3">
                                                <div class="custom-option d-flex justify-content-between align-items-center"
                                                    data-time="09:00 am - 10:40 am" data-price="{{ $spas->price }}">
                                                    <div class="d_time">09:00 am - 10:40 am</div>
                                                    <div class="d_price">${{ $spas->price }}</div>
                                                </div>
                                                <div class="custom-option d-flex justify-content-between align-items-center"
                                                    data-time="10:00 am - 11:40 am" data-price="{{ $spas->price }}">
                                                    <div class="d_time">10:00 am - 11:40 am</div>
                                                    <div class="d_price">${{ $spas->price }}</div>
                                                </div>
                                                <div class="custom-option d-flex justify-content-between align-items-center"
                                                    data-time="11:00 am - 12:40 pm" data-price="{{ $spas->price }}">
                                                    <div class="d_time">11:00 am - 12:40 pm</div>
                                                    <div class="d_price">${{ $spas->price }}</div>
                                                </div>
                                                <div class="custom-option d-flex justify-content-between align-items-center"
                                                    data-time="12:00 pm - 01:40 pm" data-price="{{ $spas->price }}">
                                                    <div class="d_time">12:00 pm - 01:40 pm</div>
                                                    <div class="d_price">${{ $spas->price }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="spa_id" value="{{ $spas->id }}">
                                <input type="hidden" name="time" id="time_input">
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
                            <input type="hidden" name="technician" id="technician_input">
                            <div class="col-12">
                                <div class="d_filed d-flex justify-content-between align-items-center">
                                    <div class="d_formsubtitle">Person</div>
                                    <div class="d-flex d_btn">
                                        <button type="button" class="btn-decrement" data-target="room"><i
                                                class="fa-solid fa-minus"></i></button>
                                        <span id="room-count" class="mx-2">1</span>
                                        <button type="button" class="btn-increment" data-target="room"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <input type="hidden" name="person" id="person_count_input" value="1">
                                <input type="hidden" name="total_price" id="total_cost_input" value="0">
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
                                <button type="submit" class="d-block d-sm-inline-block text-center bookButton">Book
                                    Treatment</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-8 ps-lg-5">
                <div class="d_right">
                    <div class="d-sm-flex d-inline-block justify-content-between align-items-center mb-3">
                        <h2 class="d_spatext">{{ $spaCategory }}</h2>
                        <h2 class="d_spatext">Starting from ${{ $spas->price }}</h2>
                    </div>
                    <p>{{$spas->description}}</p>
                    <!-- <div class="d_suite mt-xl-3 mt-3">
                        <h5>Remarks</h5>
                        <div class="mt-3">
                            <ul class="px-4">
                                <li>*Price increases on weekends & holidays</li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $('#d_test2').owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        nav: false,
        dots: true  // This will hide the dots
    });

    const today = new Date().toISOString().split('T')[0];
    document.getElementById('checkinDate').setAttribute('min', today);

</script>
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
                    document.getElementById('technician_input').value = this.getAttribute('data-value'); // Set the value of technician_input

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
                    document.getElementById('technician_input').value = this.getAttribute('data-value'); // Set the value of technician_input
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
        const personCountInput = document.getElementById('person_count_input');
        const decrementBtn = document.querySelector('.btn-decrement');
        const incrementBtn = document.querySelector('.btn-increment');
        const totalCostElement = document.getElementById('total-cost');
        const totalCostInput = document.getElementById('total_cost_input');
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
                document.getElementById('time_input').value = selectedTime; // Set the value of time_input
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
            personCountInput.value = persons;
            updateTotalCost();
        }

        // Update total cost
        function updateTotalCost() {
            const total = selectedPrice * persons;
            totalCostElement.textContent = `$${total}`;
            totalCostInput.value = total; // Update the hidden input value
        }

        // Initial total cost calculation
        updateTotalCost();

        // Close the time options dropdown when clicking outside
        document.addEventListener('click', function (event) {
            if (!timeSelect.contains(event.target)) {
                timeSelect.querySelector('.custom-options').classList.remove('open');
            }
        });

        addCounterListeners(
            document.querySelector('.btn-increment[data-target="room"]'),
            document.querySelector('.btn-decrement[data-target="room"]'),
            roomCount, 1
        );

        // Handle increment button click
        document.querySelector('.btn-increment[data-target="room"]').addEventListener('click', function () {
            roomCount++; // Increment the count
            roomCountElement.textContent = roomCount; // Update the displayed count
            roomCountInput.value = roomCount; // Update the hidden input value
            updateTotalCost(); // Update the total cost
        });

        // Handle decrement button click
        document.querySelector('.btn-decrement[data-target="room"]').addEventListener('click', function () {
            if (roomCount > 1) { // Ensure count doesn't go below 1
                roomCount--; // Decrement the count
                roomCountElement.textContent = roomCount; // Update the displayed count
                roomCountInput.value = roomCount; // Update the hidden input value
                updateTotalCost(); // Update the total cost
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