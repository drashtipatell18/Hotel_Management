@extends('frontend.layouts.main')
@section('title', 'Book Now')
@section('main-container')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
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
        .d_room .d_night .d_price{
            margin-left:37pc;
        }
    </style>

    <section class="d_booknow">
        <div class="d_img col">
            <!-- Check if there are images and display the first one, else show the default room image -->
            @if ($room->images->isNotEmpty())
                <img src="{{ url('assets/upload/' . $room->images->first()->image) }}" alt="{{ $room->room_name }}">
            @else
                <img src="{{ url('assets/upload/' . $room->image) }}" alt="{{ $room->room_name }}">
            @endif
        </div>

        <div class="d_container">
            <div class="d_subimg d-flex justify-content-center mt-4">
                <!-- Display the other images as thumbnails -->
                @foreach ($room->images as $image)
                    <div class="d_subnavimg me-2 me-sm-3">
                        <img src="{{ url('assets/upload/' . $image->image) }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Image section End -->

    <!-- Detail section start -->

    <section class="d_p-25 d_detail">
        <div class="d_container">
            <div class="row g-3">
                <div class="col-12 col-lg-4">
                    <div class="d_item">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Book</h5>
                            <h6>Price: ${{ $room->rent }}<br />
                            </h6>
                        </div>
                        <form action="{{ route('booknow.store') }}" method="post" id="bookingForm">
                            @csrf
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
                                    <div class="d_filed d-flex justify-content-between align-items-center">
                                        <div class="d_formsubtitle">Check Out</div>
                                        <div class="d-flex align-items-center d_cal">
                                            <input type="datetime-local" class="ds" id="checkOut"
                                                name="check_out_datetime"
                                                style="color: black; background-color: white; padding-left: 7px; width:185px">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="d_filed d-flex justify-content-between align-items-center">
                                        <div class="d_formsubtitle">Rooms</div>
                                        <div class="d-flex d_btn">
                                            <button type="button" class="btn-decrement" data-target="room"><i
                                                    class="fa-solid fa-minus"></i></button>
                                            <span id="room-count" class="mx-2">1</span>
                                            <button type="button" class="btn-increment" data-target="room"><i
                                                    class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="room_count" id="room_count_input" value="1">
                                    <input type="hidden" id="total_cost_input" name="total_cost_input" value="0">
                                </div>
                                <div class="col-12">
                                    <div class="d_filed d-flex justify-content-between align-items-center">
                                        <div class="d_formsubtitle">Total Member</div>
                                        <div class="d-flex d_btn">
                                            <button type="button" class="btn-decrement" data-target="member"><i
                                                    class="fa-solid fa-minus"></i></button>
                                            <span id="member-count" class="mx-2">1</span>
                                            <button type="button" class="btn-increment" data-target="member"><i
                                                    class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="member_count" id="member_count_input" value="1">
                                </div>

                            </div>

                            <hr>


                            <div class="d_total mt-3">
                                <h6>Room Per Price: <span id="total_room" style="float:right">0</span></h6>
                                <input type="hidden" id="total_room_input" name="total_room_input" value="0">


                                <h6>Discount: <span style="float:right" id="discount_value">{{ $discountValue }}%</span></h6>
                                <input type="hidden" id="total_discount_input" name="total_discount_input" value="{{ $discountValue }}%">

                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button p-0" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    Total Cost
                                                </button>
                                            </h2>
                                            <h5 id="total_cost">$0</h5>
                                        </div>
                                        <input type="hidden" id="total_cost_input" name="total_cost" value="0">
                                        <input type="hidden" id="booking_id" name="booking_id" value="{{ $room->booking_id }}">
                                    </div>
                                </div>

                                <div class="d_cta mt-3 text-center">
                                    <button class="d-block d-sm-inline-block text-center bookButton" type="submit">Book
                                        Your Stay Now</button>
                                </div>
                            </div>
                            <div class="drashti">
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                <input type="hidden" name="checkin" value="{{ $room->check_in }}">
                                <input type="hidden" name="checkout" value="{{ $room->check_out }}">
                                <input type="hidden" name="room_type_id" value="{{ $room->room_type_id }}">
                                <input type="hidden" name="room_number" value="{{ $room->room_number }}">
                                <input type="hidden" name="floor_id" value="{{ $room->floor_id }}">
                                <input type="hidden" name="ac_non_ac" value="{{ $room->ac_non_ac }}">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-8 ps-lg-5">
                    <div class="d_right">
                        <h2>{{ $room->room_name }}</h2>
                        <div class="d_icon mt-3 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center me-sm-4 me-1">
                                    <img src="{{ url('frontend/img/d_img/icon3.png') }}" class="me-2" alt="">
                                    <div class="d_icondesc">{{ $room->room_size }}</div>
                                </div>
                                <div class="d-flex align-items-center me-sm-4 me-1">
                                    <img src="{{ url('frontend/img/d_img/user.png') }}" class="me-2" alt="">
                                    <div class="d_icondesc">2 Guests</div>
                                </div>
                                <div class="d-flex align-items-center me-sm-4 me-1">
                                    <img src="{{ url('frontend/img/d_img/bed.png') }}" class="me-2" alt="">
                                    <div class="d_icondesc">{{ $room->bed_type }}</div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{ url('frontend/img/d_img/bath.png') }}" class="me-2" alt="">
                                    <div class="d_icondesc">1 Bathroom</div>
                                </div>
                            </div>
                        </div>
                        <p>{{ $room->message }} </p>

                        <div class="d_amenties mt-xl-3 mt-3">
                            <h5>Room Amenities</h5>
                            <div class="row g-0 mt-md-1"> <!-- Changed g-2 to g-0 for no gap -->
                                @if ($amenities && $amenities->count() > 0)
                                    @foreach ($amenities as $amenity)
                                        <div class="col-12 col-sm-4 col-xl-4 p-0"> <!-- Added p-0 to remove padding -->
                                            <div class="d-flex align-items-center d_feature">
                                                <img src="{{ url('/assets/amenities/' . $amenity->image) }}"
                                                    alt="{{ $amenity->name }}">
                                                <div class="d_textdesc">{{ $amenity->name }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No amenities available for this room.</p>
                                @endif
                            </div>
                        </div>

                        @if($room->include_suites)
                            <div class="d_suite mt-xl-3 mt-3">
                                <h5>What’s included in this suite?</h5>
                                <div class="mt-3">
                                    <ul class="px-3">
                                        @foreach(explode('</p>', $room->include_suites) as $paragraph)
                                            @if(trim(strip_tags($paragraph)))
                                                <li>{!! nl2br(trim($paragraph)) !!}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </section>

    <!-- Detail section end -->

    <!-- Similar Rool section Start -->

    <!-- card section start -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <section class="d_p-25 d_room">
        <div class="d_container">
            <div class="row">
                <div class="col-12 px-4">
                    <h2 class="d_similar">Similar Rooms</h2>
                </div>
            </div>
            <div class="row g-lg-5 g-4 m-0">
                @foreach ($similarRooms as $similarRoom)
                    <div class="col-xs-12 col-sm-6">
                        <div class="d_box position-relative">
                            <div class="d_img">
                                @if ($similarRoom->offer && $similarRoom->offer->discount_value > 0)
                                    <div class="d_ribbon">{{ $similarRoom->offer->discount_value }}% Saving</div>
                                @endif
                                @if ($similarRoom->images->isNotEmpty())
                                    <img src="{{ url('assets/upload/' . $similarRoom->images->first()->image) }}"
                                        alt="{{ $similarRoom->room_name }}">
                                @else
                                    <img src="{{ url('path/to/default/image.jpg') }}"
                                        alt="{{ $similarRoom->room_name }}">
                                @endif
                            </div>
                            <div class="d_night">
                                <div class="d_price">
                                    <h6>${{ $similarRoom->rent }}</h6>
                                </div>
                            </div>
                            <div class="d_content">
                                <div class="d_icon d-flex align-items-center">
                                    <div class="d-flex align-items-center me-3">
                                        <img src="{{ url('frontend/img/d_img/icon1.png') }}" class="me-2"
                                            alt="">
                                        <div class="d_icondesc">{{ $similarRoom->room_size }}</div>
                                    </div>
                                    <div class="d-flex align-items-center me-3">
                                        <img src="{{ url('frontend/img/d_img/icon2.png') }}" class="me-2"
                                            alt="">
                                            <div class="d_icondesc">2 Guests</div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ url('frontend/img/d_img/bedroom.png') }}" class="me-2"
                                            alt="">
                                        <div class="d_icondesc">{{ $similarRoom->bed_type }}</div>
                                    </div>
                                </div>
                                <div class="row m-0 g-2 mt-1 align-items-center">
                                    <div class="col-12 col-lg-8 p-0">
                                        <h3>{{ $similarRoom->room_name }}</h3>
                                    </div>
                                    <div class="col-12 col-lg-1 p-0"></div>
                                    <div class="col-12 col-lg-3 p-0">
                                        <div class="d_cta">
                                            <a href="javascript:void(0);" class="d-block text-center reserve-btn"
                                                data-room-id="{{ $similarRoom->id }}">Reserve</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('.reserve-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const roomId = this.getAttribute('data-room-id');
                // Redirect to the booking page with the room ID
                window.location.href = `/booknow/${roomId}`;
            });
        });
    </script>
    <script>
        // book now images

        document.addEventListener("DOMContentLoaded", function() {
            const mainImage = document.querySelector('.d_booknow .d_img img');
            const thumbnails = document.querySelectorAll('.d_subimg img');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    const newSrc = this.getAttribute('src');
                    mainImage.setAttribute('src', newSrc);
                });
            });

            const PRICE_PER_NIGHT = 1250;
            const ROOM_CLEAN_PRICE = 100;
            const MASSAGE_PRICE = 30;
            const DAY_SPA_PRICE = 20;

            const checkInInput = document.querySelector('input[name="checkin"]');
            const checkOutInput = document.querySelector('input[name="checkout"]');
            const roomCount = document.getElementById('room-count');

            const updateDisplay = (element, value) => {
                if (element) element.textContent = value;
            };

            const calculateNights = () => {
                const checkIn = new Date(checkInInput.value);
                const checkOut = new Date(checkOutInput.value);
                return checkIn && checkOut && checkOut > checkIn ?
                    Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24)) : 1;
            };

            const calculateTotal = () => {
                const nights = calculateNights();
                const rooms = parseInt(roomCount.textContent);
                const basePrice = PRICE_PER_NIGHT * nights * rooms;

                let extraPrice = 0;
                // Assuming you will implement checkbox logic later
                // if (roomCleanCheckbox.checked) extraPrice += ROOM_CLEAN_PRICE;
                // if (massageCheckbox.checked) extraPrice += MASSAGE_PRICE * parseInt(massageCount.textContent);
                // if (daySpaCheckbox.checked) extraPrice += DAY_SPA_PRICE * parseInt(daySpaCount.textContent);

                const taxes = 0; // Assuming no taxes for now
                const total = basePrice + extraPrice + taxes;

                // Update the relevant displays (assuming you've defined these variables)
                // updateDisplay(basePriceDisplay, `$${basePrice}`);
                // updateDisplay(taxesDisplay, `$${taxes}`);
                // updateDisplay(extraDisplay, `$${extraPrice}`);
                // updateDisplay(totalPriceDisplay, `$${total}`);
                // updateDisplay(totalCostDisplay, `$${total}`);
            };

            const addCounterListeners = (incrementBtn, decrementBtn, countElement, minValue = 0) => {
                incrementBtn.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default action
                    countElement.textContent = parseInt(countElement.textContent) + 1;
                    calculateTotal();
                });
                decrementBtn.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default action
                    if (parseInt(countElement.textContent) > minValue) {
                        countElement.textContent = parseInt(countElement.textContent) - 1;
                        calculateTotal();
                    }
                });
            };

            addCounterListeners(
                document.querySelector('.btn-increment[data-target="room"]'),
                document.querySelector('.btn-decrement[data-target="room"]'),
                roomCount, 1
            );

            // Other event listeners remain unchanged
            [checkInInput, checkOutInput].forEach(input => {
                input.addEventListener('change', calculateTotal);
            });

            // Book Now button with AJAX functionality
            document.querySelector('.d_cta a').addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default link behavior
                const bookingData = {
                    checkin: checkInInput.value,
                    checkout: checkOutInput.value,
                    roomCount: roomCount.textContent,
                };

                // Use AJAX to send bookingData to the server
                fetch('your-server-endpoint-here', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(bookingData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle success, maybe redirect or show a success message
                        console.log(data);
                        // Example redirect
                        window.location = 'checkout.html';
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            });

            calculateTotal();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let roomCount = 1; // Initial room count
            let memberCount = 1;
            const pricePerRoom = {{ $room->rent ?? 0 }}; // Price for one room
            const discountedPrice = {{ $discountedPrice ?? 0 }};
            const discount = {{ $discount ?? 0 }};

            const roomCountElement = document.getElementById('room-count');
            const roomCountInput = document.getElementById('room_count_input');

            const totalCostElement = document.getElementById('total_cost');
            const totalCostInput = document.getElementById('total_cost_input');

            const memberCountElement = document.getElementById('member-count');
            const memberCountInput = document.getElementById('member_count_input');

            const totalRoomElement = document.getElementById('total_room');
            const totalRoomInput = document.getElementById('total_room_input');

            console.log('Discount: ', discount);
            console.log('Room Price: ', pricePerRoom);


            // Function to update total cost
            function updateTotalCost() {
                const totalPriceRoom = roomCount * pricePerRoom;
                totalRoomElement.textContent =
                `$${totalPriceRoom.toFixed(2)}`;
                totalRoomElement.innerHTML = `<b>$${totalPriceRoom.toFixed(2)}</b>`;
                totalRoomInput.value = totalPriceRoom; // Ensure the input also has a fixed decimal format


                const totalCost = (roomCount * pricePerRoom) - ((roomCount * pricePerRoom) * discount) / 100;
                totalCostElement.textContent =
                `$${totalCost.toFixed(2)}`;
                totalCostInput.value = totalCost; // Ensure the input also has a fixed decimal format
            }



            // Handle increment button click
            document.querySelector('.btn-increment[data-target="room"]').addEventListener('click', function() {
                roomCount++; // Increment the count
                roomCountElement.textContent = roomCount; // Update the displayed count
                roomCountInput.value = roomCount; // Update the hidden input value
                updateTotalCost(); // Update the total cost
            });

            // Handle decrement button click
            document.querySelector('.btn-decrement[data-target="room"]').addEventListener('click', function() {
                if (roomCount > 1) { // Ensure count doesn't go below 1
                    roomCount--; // Decrement the count
                    roomCountElement.textContent = roomCount; // Update the displayed count
                    roomCountInput.value = roomCount; // Update the hidden input value
                    updateTotalCost(); // Update the total cost
                }
            });

            document.querySelector('.btn-increment[data-target="member"]').addEventListener('click', function() {
                memberCount++; // Increment the member count
                memberCountElement.textContent = memberCount; // Update the displayed count
                memberCountInput.value = memberCount; // Update the hidden input value
            });

            // Handle decrement button click for Total Member
            document.querySelector('.btn-decrement[data-target="member"]').addEventListener('click', function() {
                if (memberCount > 1) { // Ensure the member count doesn't go below 1
                    memberCount--; // Decrement the member count
                    memberCountElement.textContent = memberCount; // Update the displayed count
                    memberCountInput.value = memberCount; // Update the hidden input value
                }
            });
            updateTotalCost();

        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize timepicker for the Check-in Time
            $('#check_in_time').timepicker({
                timeFormat: 'HH:mm',
                interval: 30, // Time interval in minutes
                minTime: '06:00am', // Minimum selectable time
                maxTime: '11:00pm', // Maximum selectable time
                defaultTime: '02:00pm', // Default selected time
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });
    </script>

<!-- ==========================  Date Validation ==================================== -->

<script>
    // Get current date and time in the correct format for datetime-local
    function getCurrentDateTime() {
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');

        // Format: YYYY-MM-DDTHH:MM
        return `${year}-${month}-${day}T${hours}:${minutes}`;
    }

    // Set the min and value attributes to the current date and time
    const currentDateTime = getCurrentDateTime();
    document.getElementById('checkIn').setAttribute('min', currentDateTime);
    document.getElementById('checkIn').setAttribute('value', currentDateTime);
    document.getElementById('checkOut').setAttribute('min', currentDateTime);
    document.getElementById('checkOut').setAttribute('value', currentDateTime);

    // Add event listeners to validate check-in and check-out times
    document.getElementById('checkIn').addEventListener('change', validateCheckInOut);
    document.getElementById('checkOut').addEventListener('change', validateCheckInOut);

    // Function to validate check-in and check-out times
    function validateCheckInOut() {
        const checkInTime = new Date(document.getElementById('checkIn').value);
        const checkOutTime = new Date(document.getElementById('checkOut').value);

        // Check if both times are selected
        if (checkInTime && checkOutTime) {
            // Calculate the difference in hours
            const timeDiff = (checkOutTime - checkInTime) / (1000 * 60 * 60);

            if (checkInTime >= checkOutTime) {
                toastr.error('Check-out time must be after the check-in time.', 'Error');
                document.getElementById('checkOut').value = ''; // Clear invalid check-out time
            } else if (timeDiff < 2) {
                toastr.error('Check-out time must be at least 2 hours after the check-in time.', 'Error');
                document.getElementById('checkOut').value = ''; // Clear invalid check-out time
            }
        }
    }

    // Prevent form submission if validation fails
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        const checkInTime = new Date(document.getElementById('checkIn').value);
        const checkOutTime = new Date(document.getElementById('checkOut').value);

        // Calculate the difference in hours
        const timeDiff = (checkOutTime - checkInTime) / (1000 * 60 * 60);

        if (checkInTime && checkOutTime && (checkInTime >= checkOutTime || timeDiff < 2)) {
            e.preventDefault(); // Stop form submission
            toastr.error('Please select a valid check-out time that is at least 2 hours after the check-in time.', 'Error');
        }
    });
</script>


@endsection
