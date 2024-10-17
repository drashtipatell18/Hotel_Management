@extends('frontend.layouts.main')
@section('title', 'Book Now')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<section class="d_booknow">
    <div class="d_img col">
        <img src="{{ url('frontend/img/d_img/room1.png') }}" alt="">
    </div>
    <div class="d_container">
        <div class="d_subimg d-flex justify-content-center mt-4">
            <div class="d_subnavimg me-2  me-sm-3">
                <img src="{{ url('frontend/img/d_img/room2.png') }}" alt="">
            </div>
            <div class="d_subnavimg me-2 me-sm-3">
                <img src="{{ url('frontend/img/d_img/room3.png') }}" alt="">
            </div>
            <div class="d_subnavimg me-2 me-sm-3">
                <img src="{{ url('frontend/img/d_img/room4.png') }}" alt="">
            </div>
            <div class="d_subnavimg">
                <img src="{{ url('frontend/img/d_img/room1.png') }}" alt="">
            </div>
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
                        <h6>From $1250/Night</h6>
                    </div>
                    <form action="{{ route('booknow.store') }}" method="post">
                        @csrf
                        <div class="row g-3 mt-1">
                            <div class="col-12">
                                <div class="d_filed d-flex justify-content-between align-items-center">
                                    <div class="d_formsubtitle">Check in</div>
                                    <div class="d-flex align-items-center d_cal">
                                        <input type="text" class="ds" name="checkin" style="width: 88px;">
                                        <i class="fa-solid fa-angle-down ms-sm-1 datepicker-trigger"
                                            style="color: #ffffff;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d_filed d-flex justify-content-between align-items-center">
                                    <div class="d_formsubtitle">Check out</div>
                                    <div class="d-flex align-items-center d_cal">
                                        <input type="text" class="ds" name="checkout" style="width: 88px;">
                                        <i class="fa-solid fa-angle-down ms-sm-1 datepicker-trigger"
                                            style="color: #ffffff;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d_filed d-flex justify-content-between align-items-center">
                                    <div class="d_formsubtitle">Rooms</div>
                                    <div class="d-flex d_btn">
                                        <button class="btn-decrement" data-target="room"><i
                                                class="fa-solid fa-minus"></i></button>
                                        <span id="room-count" class="mx-2">1</span>
                                        <button class="btn-increment" data-target="room"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d_filed d-flex justify-content-between align-items-center">
                                    <div class="d_formsubtitle">Adults</div>
                                    <div class="d-flex d_btn">
                                        <button class="btn-decrement" data-target="adult"><i
                                                class="fa-solid fa-minus"></i></button>
                                        <span id="adult-count" class="mx-2">1</span>
                                        <button class="btn-increment" data-target="adult"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d_filed d-flex justify-content-between align-items-center">
                                    <div class="d_formsubtitle">Children</div>
                                    <div class="d-flex d_btn">
                                        <button class="btn-decrement" data-target="children"><i
                                                class="fa-solid fa-minus"></i></button>
                                        <span id="children-count" class="mx-2">1</span>
                                        <button class="btn-increment" data-target="children"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d_extra mt-4">
                            <h4>Extra Service</h4>
                            <div class="row g-2 mt-1 d_exservice">
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" class="me-2" id="extra-room-clean"
                                                name="extra-room-clean">
                                            <label for="extra-room-clean">Room Clean</label>
                                        </div>
                                        <p class="mb-0">$100/Night</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d_filed border-0 p-0 d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" class="me-2" id="extra-massage" name="extra-massage">
                                            <label for="extra-massage">Massage</label>
                                        </div>
                                        <div class="d-flex d_btn align-items-center">
                                            <p class="mb-0 me-2">$30/person</p>
                                            <button class="btn-service-decrement" data-target="massage"><i
                                                    class="fa-solid fa-minus"></i></button>
                                            <span id="massage-count" class="mx-2">1</span>
                                            <button class="btn-service-increment" data-target="massage"><i
                                                    class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d_filed border-0 p-0 d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" class="me-2" id="extra-day-spa" name="extra-day-spa">
                                            <label for="extra-day-spa">Day Spa</label>
                                        </div>
                                        <div class="d-flex d_btn align-items-center">
                                            <p class="mb-0 me-2">$20/person</p>
                                            <button class="btn-service-decrement" data-target="day-spa"><i
                                                    class="fa-solid fa-minus"></i></button>
                                            <span id="day-spa-count" class="mx-2">1</span>
                                            <button class="btn-service-increment" data-target="day-spa"><i
                                                    class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
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
                                        <h5 id="total-cost">$1350</h5>
                                    </div>
                                    <div id="collapseOne" class="accordion-collapse collapse "
                                        data-bs-parent="#accordionExample">
                                        <hr>
                                        <div class="row g-2">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d_title">Total Base price</div>
                                                    <div class="d_price" data-type="base">$1250</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d_title">Taxes</div>
                                                    <div class="d_price" data-type="taxes">$0</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d_title">Extra : Room Clean</div>
                                                    <div class="d_price" data-type="extra">$100</div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d_title1"><b>Total</b></div>
                                                    <div class="d_price1" id="total-price"><b>$1350</b></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d_cta mt-3 text-center">
                                    <a href="/checkout.html" class="d-block d-sm-inline-block text-center">Book Your Stay
                                        Now</a>
                                </div>
                            </div>
                            <div class="drashti">
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                <input type="hidden" name="checkin" value="{{ $room->check_in }}">
                                <input type="hidden" name="checkout" value="{{ $room->check_out }}">
                                <input type="hidden" name="adult" value="1">
                                <input type="hidden" name="children" value="1">
                                <input type="hidden" name="extra_room_clean" value="1">
                                <input type="hidden" name="extra_massage" value="1">
                                <input type="hidden" name="extra_day_spa" value="1">
                            </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 ps-lg-5">
                <div class="d_right">
                    <h2>1 King Bed, Forest View, Loft Guest Room</h2>
                    <div class="d_icon mt-3 mb-4">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center me-sm-4 me-1">
                                <img src="{{ url('frontend/img/d_img/icon3.png') }}" class="me-2" alt="">
                                <div class="d_icondesc">80m2</div>
                            </div>
                            <div class="d-flex align-items-center me-sm-4 me-1">
                                <img src="{{ url('frontend/img/d_img/user.png') }}" class="me-2" alt="">
                                <div class="d_icondesc">2 Guests</div>
                            </div>
                            <div class="d-flex align-items-center me-sm-4 me-1">
                                <img src="{{ url('frontend/img/d_img/bed.png') }}" class="me-2" alt="">
                                <div class="d_icondesc">Double Bed</div>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="{{ url('frontend/img/d_img/bath.png') }}" class="me-2" alt="">
                                <div class="d_icondesc">1 Bathroom</div>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                        ridiculus mus. </p>
                    <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                        quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim
                        justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis
                        pretium. Integer tincidunt. </p>
                    <div class="d_amenties mt-xl-3 mt-3 ">
                        <h5>Room Amenities</h5>
                        <div class="row g-xl-3 g-0 mt-md-1">
                            <div class="col-12 col-sm-4 col-xl-3">
                                <div class="d-flex align-items-center d_feature">
                                    <img src="{{ url('frontend/img/d_img/fea1.png') }}" alt="">
                                    <div class="d_textdesc">Air Conditioning</div>
                                </div>
                                <div class="d-flex align-items-center d_feature">
                                    <img src="{{ url('frontend/img/d_img/fea2.png') }}" alt="">
                                    <div class="d_textdesc">Slippers</div>
                                </div>
                                <div class="d-flex align-items-center d_feature">
                                    <img src="{{ url('frontend/img/d_img/fea3.png') }}" alt="">
                                    <div class="d_textdesc">Shampoo</div>
                                </div>
                                <div class="d-flex align-items-center d_feature">
                                    <img src="{{ url('frontend/img/d_img/fea4.png') }}" alt="">
                                    <div class="d_textdesc">Pet Friendly</div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 col-xl-3">
                                <div class="d-flex align-items-center d_feature">
                                    <img src="{{ url('frontend/img/d_img/fea5.png') }}" alt="">
                                    <div class="d_textdesc">Cable TV</div>
                                </div>
                                <div class="d-flex align-items-center d_feature">
                                    <img src="{{ url('frontend/img/d_img/fea6.png') }}" alt="">
                                    <div class="d_textdesc">Towels</div>
                                </div>
                                <div class="d-flex align-items-center d_feature">
                                    <img src="{{ url('frontend/img/d_img/fea7.png') }}" alt="">
                                    <div class="d_textdesc">Safe Box</div>
                                </div>
                                <div class="d-flex align-items-center d_feature">
                                    <img src="{{ url('frontend/img/d_img/fea8.png') }}" alt="">
                                    <div class="d_textdesc">Welcome Drinks</div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 col-xl-3">
                                <div class="d-flex align-items-center d_feature">
                                    <img src="{{ url('frontend/img/d_img/fea9.png') }}" alt="">
                                    <div class="d_textdesc">Wi-Fi & Internet</div>
                                </div>
                                <div class="d-flex align-items-center d_feature">
                                    <img src="{{ url('frontend/img/d_img/fea10.png') }}" alt="">
                                    <div class="d_textdesc">Hair Dryer</div>
                                </div>
                                <div class="d-flex align-items-center d_feature">
                                    <img src="{{ url('frontend/img/d_img/fea11.png') }}" alt="">
                                    <div class="d_textdesc">Espresso Machine</div>
                                </div>
                                <div class="d-flex align-items-center d_feature">
                                    <img src="{{ url('frontend/img/d_img/fea12.png') }}" alt="">
                                    <div class="d_textdesc">Inroom Refrigerator</div>
                                </div>
                            </div>
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
            <div class="col-xs-12 col-sm-6">
                <div class="d_box position-relative">
                    <div class="d_img">
                        <img src="{{ url('frontend/img/d_img/room1.png') }}" alt="">
                    </div>
                    <div class="d_night">
                        <div class="d_price">
                            <h6>$1050/ Night</h6>
                        </div>
                    </div>
                    <div class="d_content">
                        <div class="d_icon d-flex align-items-center">
                            <div class="d-flex align-items-center me-3">
                                <img src="{{ url('frontend/img/d_img/icon1.png') }}" class="me-2" alt="">
                                <div class="d_icondesc">80m2</div>
                            </div>
                            <div class="d-flex align-items-center me-3">
                                <img src="{{ url('frontend/img/d_img/icon2.png') }}" class="me-2" alt="">
                                <div class="d_icondesc">Guets</div>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="{{ url('frontend/img/d_img/bedroom.png') }}" class="me-2" alt="">
                                <div class="d_icondesc">Double bed</div>
                            </div>
                        </div>
                        <div class="row m-0 g-2 mt-1 align-items-center">
                            <div class="col-12 col-lg-8 p-0">
                                <h3>1 King Bed, Forest View, Loft Guest Room</h3>
                            </div>
                            <div class="col-12 col-lg-1 p-0"></div>
                            <div class="col-12 col-lg-3 p-0">
                                <div class="d_cta">
                                    <a href="" class="d-block text-center">Reserve</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="d_box position-relative">
                    <div class="d_img">
                        <img src="{{ url('frontend/img/d_img/room2.png') }}" alt="">
                    </div>
                    <div class="d_night">
                        <div class="d_price">
                            <h6>$500/ Night</h6>
                        </div>
                    </div>
                    <div class="d_content">
                        <div class="d_icon d-flex align-items-center">
                            <div class="d-flex align-items-center me-3">
                                <img src="{{ url('frontend/img/d_img/icon1.png') }}" class="me-2" alt="">
                                <div class="d_icondesc">80m2</div>
                            </div>
                            <div class="d-flex align-items-center me-3">
                                <img src="{{ url('frontend/img/d_img/icon2.png') }}" class="me-2" alt="">
                                <div class="d_icondesc">Guets</div>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="{{ url('frontend/img/d_img/bedroom.png') }}" class="me-2" alt="">
                                <div class="d_icondesc">Double bed</div>
                            </div>
                        </div>
                        <div class="row m-0 g-2 mt-1 align-items-center">
                            <div class="col-12 col-lg-8 p-0">
                                <h3>1 King Bed, Forest View, Loft Guest Room</h3>
                            </div>
                            <div class="col-12 col-lg-1 p-0"></div>
                            <div class="col-12 col-lg-3 p-0">
                                <div class="d_cta">
                                    <a href="" class="d-block text-center">Reserve</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const mainImage = document.querySelector('.d_booknow .d_img img');
    const thumbnails = document.querySelectorAll('.d_subimg img');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function () {
            // Get the source of the clicked thumbnail
            const newSrc = this.getAttribute('src');

            // Set the main image source to the clicked thumbnail's source
            mainImage.setAttribute('src', newSrc);
        });
    });
});

    document.addEventListener('DOMContentLoaded', () => {
        // Constants
        const PRICE_PER_NIGHT = 1250;
        const ROOM_CLEAN_PRICE = 100;
        const MASSAGE_PRICE = 30;
        const DAY_SPA_PRICE = 20;

        // DOM Elements
        const checkInInput = document.querySelector('input[name="checkin"]');
        const checkOutInput = document.querySelector('input[name="checkout"]');
        const roomCount = document.getElementById('room-count');
        const adultCount = document.getElementById('adult-count');
        const childrenCount = document.getElementById('children-count');
        const roomCleanCheckbox = document.getElementById('extra-room-clean');
        const massageCheckbox = document.getElementById('extra-massage');
        const daySpaCheckbox = document.getElementById('extra-day-spa');
        const massageCount = document.getElementById('massage-count');
        const daySpaCount = document.getElementById('day-spa-count');
        const totalCostDisplay = document.getElementById('total-cost');
        const basePriceDisplay = document.querySelector('.d_price[data-type="base"]');
        const taxesDisplay = document.querySelector('.d_price[data-type="taxes"]');
        const extraDisplay = document.querySelector('.d_price[data-type="extra"]');
        const totalPriceDisplay = document.getElementById('total-price');

        // Helper Functions
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
            if (roomCleanCheckbox.checked) extraPrice += ROOM_CLEAN_PRICE;
            if (massageCheckbox.checked) extraPrice += MASSAGE_PRICE * parseInt(massageCount.textContent);
            if (daySpaCheckbox.checked) extraPrice += DAY_SPA_PRICE * parseInt(daySpaCount.textContent);

            const taxes = 0; // Assuming no taxes for now
            const total = basePrice + extraPrice + taxes;

            updateDisplay(basePriceDisplay, `$${basePrice}`);
            updateDisplay(taxesDisplay, `$${taxes}`);
            updateDisplay(extraDisplay, `$${extraPrice}`);
            updateDisplay(totalPriceDisplay, `$${total}`);
            updateDisplay(totalCostDisplay, `$${total}`);
        };

        // Event Listeners
        const addCounterListeners = (incrementBtn, decrementBtn, countElement, minValue = 0) => {
            incrementBtn.addEventListener('click', () => {
                countElement.textContent = parseInt(countElement.textContent) + 1;
                calculateTotal();
            });
            decrementBtn.addEventListener('click', () => {
                if (parseInt(countElement.textContent) > minValue) {
                    countElement.textContent = parseInt(countElement.textContent) - 1;
                    calculateTotal();
                }
            });
        };

        // Room, Adult, Children counters
        addCounterListeners(
            document.querySelector('.btn-increment[data-target="room"]'),
            document.querySelector('.btn-decrement[data-target="room"]'),
            roomCount, 1
        );
        addCounterListeners(
            document.querySelector('.btn-increment[data-target="adult"]'),
            document.querySelector('.btn-decrement[data-target="adult"]'),
            adultCount, 1
        );
        addCounterListeners(
            document.querySelector('.btn-increment[data-target="children"]'),
            document.querySelector('.btn-decrement[data-target="children"]'),
            childrenCount
        );

        // Extra services counters
        addCounterListeners(
            document.querySelector('.btn-service-increment[data-target="massage"]'),
            document.querySelector('.btn-service-decrement[data-target="massage"]'),
            massageCount, 1
        );
        addCounterListeners(
            document.querySelector('.btn-service-increment[data-target="day-spa"]'),
            document.querySelector('.btn-service-decrement[data-target="day-spa"]'),
            daySpaCount, 1
        );

        // Checkbox listeners
        [roomCleanCheckbox, massageCheckbox, daySpaCheckbox].forEach(checkbox => {
            checkbox.addEventListener('change', calculateTotal);
        });

        // Date input listeners
        [checkInInput, checkOutInput].forEach(input => {
            input.addEventListener('change', calculateTotal);
        });

        // Book Now button
        document.querySelector('.d_cta a').addEventListener('click', (e) => {
            e.preventDefault();
            // alert('Booking functionality is not yet implemented.');
            window.location = 'checkout.html'
        });

        // Initial calculation
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

@endsection
