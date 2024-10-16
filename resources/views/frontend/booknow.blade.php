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
                        <h6>From ${{ $room->rent }}/Night</h6>
                    </div>
                    <form action="{{ route('booknow.store') }}" method="post">
                        @csrf
                        <div class="row g-3 mt-1">
                            <div class="col-12">
                                <div class="d_filed d-flex justify-content-between align-items-center">
                                    <div class="d_formsubtitle">Check in</div>
                                    <div class="d-flex align-items-center d_cal">
                                        <input type="text" class="ds" name="check_in_date" style="width: 88px;">
                                        <i class="fa-solid fa-angle-down ms-sm-1 datepicker-trigger"
                                            style="color: #ffffff;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d_filed d-flex justify-content-between align-items-center">
                                    <div class="d_formsubtitle">Check out</div>
                                    <div class="d-flex align-items-center d_cal">
                                        <input type="text" class="ds" name="check_out_date" style="width: 88px;">
                                        <i class="fa-solid fa-angle-down ms-sm-1 datepicker-trigger"
                                            style="color: #ffffff;"></i>
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
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button p-0" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Total Cost
                                            </button>
                                        </h2>
                                        <h5 id="total-cost">$0</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d_cta mt-3 text-center">
                                <!-- <a href="/checkout.html" class="d-block d-sm-inline-block text-center">Book Your Stay -->
                                <!-- Now</a> -->
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
                            <!-- <input type="hidden" name="adult" value="1">
                                    <input type="hidden" name="children" value="1">
                                    <input type="hidden" name="extra_room_clean" value="1">
                                    <input type="hidden" name="extra_massage" value="1">
                                    <input type="hidden" name="extra_day_spa" value="1"> -->
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


                    <div class="d_suite mt-xl-3 mt-3">
                        <h5>What’s included in this suite?</h5>
                        <div class="mt-3">
                            <ul class="px-3">
                                <li>Private balcony</li>
                                <li>140x200 cm Elite bed</li>
                                <li>Upholstered seat beside the panoramic window</li>
                                <li>TV-UHD screen for watching mountaineering films</li>
                                <li>Writing desk with USB ports for documenting your adventures</li>
                                <li>Room safe for your top mountain photos</li>
                                <li>Service station with Lavazza coffee machine, kettle and tea</li>
                                <li>Bathroom with rain shower</li>
                                <li>Comfortable terry towels and bathrobes</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- Detail section end -->

<!-- Similar Rool section Start -->

<!-- card section start -->

<section class="d_p-25 d_room">
    <div class="d_container">
        <div class="row">
            <div class="col-12 px-4">
                <h2 class="d_similar">Similar Rooms</h2>
            </div>
        </div>
        <div class="row g-lg-5 g-4 m-0">
            @foreach($similarRooms as $similarRoom)
                <div class="col-xs-12 col-sm-6">
                    <div class="d_box position-relative">
                        <div class="d_img">
                            @if($similarRoom->images->isNotEmpty())
                                <img src="{{ url('assets/upload/' . $similarRoom->images->first()->image) }}"
                                    alt="{{ $similarRoom->room_name }}">
                            @else
                                <img src="{{ url('path/to/default/image.jpg') }}" alt="{{ $similarRoom->room_name }}">
                            @endif
                        </div>
                        <div class="d_night">
                            <div class="d_price">
                                <h6>${{ $similarRoom->rent }}/ Night</h6>
                            </div>
                        </div>
                        <div class="d_content">
                            <div class="d_icon d-flex align-items-center">
                                <div class="d-flex align-items-center me-3">
                                    <img src="{{ url('frontend/img/d_img/icon1.png') }}" class="me-2" alt="">
                                    <div class="d_icondesc">{{ $similarRoom->room_size }}</div>
                                </div>
                                <div class="d-flex align-items-center me-3">
                                    <img src="{{ url('frontend/img/d_img/icon2.png') }}" class="me-2" alt="">
                                    <div class="d_icondesc">Guests</div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{ url('frontend/img/d_img/bedroom.png') }}" class="me-2" alt="">
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
                                        <a href="javascript:void(0);" class="d-block text-center reserve-btn" data-room-id="{{ $similarRoom->id }}">Reserve</a>
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

    document.addEventListener("DOMContentLoaded", function () {
        const mainImage = document.querySelector('.d_booknow .d_img img');
        const thumbnails = document.querySelectorAll('.d_subimg img');

        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function () {
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
    $(function () {
        // Function to get today's date in dd/mm/yy format
        function getTodayDate() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            var yyyy = today.getFullYear();
            return dd + '/' + mm + '/' + yyyy;
        }

        $(".d_cal .ds").datepicker({
            dateFormat: "dd/mm/yy",
            defaultDate: new Date(),
            onSelect: function (dateText, inst) {
                $(this).val(dateText);
            }
        });

        // Set default date to today for both inputs
        $(".d_cal .ds").val(getTodayDate());

        $(".d_cal .datepicker-trigger").on("click", function () {
            var input = $(this).siblings(".ds");
            input.datepicker("show");
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let roomCount = 1; // Initial room count
        const pricePerRoom = {{ $room->rent }}; // Price for one room
        const roomCountElement = document.getElementById('room-count');
        const roomCountInput = document.getElementById('room_count_input');
        const totalCostElement = document.getElementById('total-cost');
        const totalPriceElement = document.getElementById('total-price');

        // Function to update total cost
        function updateTotalCost() {
            const totalCost = roomCount * pricePerRoom; // Calculate total cost
            totalCostElement.textContent = `$${totalCost}`; // Update displayed total cost
            totalPriceElement.innerHTML = `<b>$${totalCost}</b>`; // Update collapsed total price
        }

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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let memberCount = 1; // Initial member count
        const memberCountElement = document.getElementById('member-count');
        const memberCountInput = document.getElementById('member_count_input');

        // Handle increment button click for Total Member
        document.querySelector('.btn-increment[data-target="member"]').addEventListener('click', function () {
            memberCount++; // Increment the member count
            memberCountElement.textContent = memberCount; // Update the displayed count
            memberCountInput.value = memberCount; // Update the hidden input value
        });

        // Handle decrement button click for Total Member
        document.querySelector('.btn-decrement[data-target="member"]').addEventListener('click', function () {
            if (memberCount > 1) { // Ensure the member count doesn't go below 1
                memberCount--; // Decrement the member count
                memberCountElement.textContent = memberCount; // Update the displayed count
                memberCountInput.value = memberCount; // Update the hidden input value
            }
        });
    });
</script>

@endsection