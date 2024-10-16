@extends('frontend.layouts.main')
@section('title', 'About Us')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>
    .dropdown-menu {
        display: none;
    }
    .d_banner{
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('frontend/img/breadcrumb-bg.jpg') !important;
        padding: 90px 0 !important;
        background-position: center !important;
    }
</style>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option d_banner set-bg" data-setbg="{{ url('frontend/img/breadcrumb-bg.jpg') }}">
    <div class="d_container">
        <div class="row">
            <div class="col-lg-12 text-center px-lg-4 px-3">
                <div class="breadcrumb__text">
                    <h6 class="d_modify">Modify Here : </h6>
                    <form action="{{ route('check-avilabilty') }}" method="GET" class="filter__form m-0">

                        <div class="filter__form__item">
                            <div class="filter__form__datepicker d-flex">
                                <div class="d-flex">
                                    <img class="icon_calendar" src="{{ url('frontend/img/calander.svg') }}" alt>
                                </div>
                                <div>
                                    <p class="Checkin mb-0">Check in</p>
                                    <input type="text" name="from_date" class="datepicker_pop check__in" required
                                        id="from_date">
                                </div>
                            </div>
                        </div>
                        <div class="filter__form__item">
                            <div class="filter__form__datepicker d-flex">
                                <div class="d-flex">
                                    <img class="icon_calendar" src="{{ url('frontend/img/calander.svg') }}" alt>
                                </div>
                                <div>
                                    <p class="Checkin mb-0">Check Out</p>
                                    <input type="text" name="to_date" class="datepicker_pop check__in" id="to_date"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="d-flex">
                                <img class="Guest_icon" src="{{ url('frontend/img/Guests.svg') }}" alt>
                            </div>
                            <div class="y_selecter">
                                <p class="mb-0 d_lefttext">Guests</p>
                                <div class="guest-selector">
                                    <div class="selected-guests text-start">
                                        <span id="guest-summary">1 Room,
                                            1 Total Member</span>
                                    </div>
                                    <div class="guest-dropdown">
                                        <div class="d-flex justify-content-between">
                                            <span>Rooms</span>
                                            <div class="guest-item">
                                                <button class="decrement" data-type="room">-</button>
                                                <span id="room-count">1</span>
                                                <button class="increment" data-type="room">+</button>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Total<br /> Member</span>
                                            <div class="guest-item">
                                                <button class="decrement" data-type="member">-</button>
                                                <span id="member-count">1</span>
                                                <button class="increment" data-type="member">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="rooms" id="rooms-input" value="1">
                        <input type="hidden" name="total_member" id="members-input" value="1">
                        <div>
                            <button class="Custom_btn border-0" type="submit"><a
                                    class="text-decoration-none text-light">Check
                                    Availability</a></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="d_result d_p-25 pb-0">
    <div class="d_container">
        <div class="row m-0 g-3">
            <div class="col-12 col-sm-6 px-lg-4 px-3">
                <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                    <h2 class="me-2">Results</h2>
                    <p class="mb-0">[<b><span id="roomCount1">0</span></b> Rooms & Suits Available]</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 px-lg-4 px-3">
                <div class="d-flex justify-content-center justify-content-sm-end">
                    <div class="dropdown me-3">
                        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            id="dropdownMenu" aria-expanded="false">
                            Sort by
                            <i class="fa-solid fa-angle-down ms-4"></i>
                        </a>

                        <ul class="dropdown-menu py-0" id="dropdownMenu">
                            <li class="d-flex align-items-center">
                                <input type="radio" name="sort" value="high_to_low" id="highToLow">
                                <label for="highToLow">Price: High to Low</label>
                            </li>
                            <li class="d-flex align-items-center">
                                <input type="radio" name="sort" value="low_to_high" id="lowToHigh">
                                <label for="lowToHigh">Price: Low to High</label>
                            </li>
                            <li class="d-flex align-items-center">
                                <input type="radio" name="sort" value="recommended" id="recommended" checked>
                                <label for="recommended">Recommended</label>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <a class="btn d-none d-md-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
                            <i class="fa-solid fa-angle-down ms-4"></i>
                        </a>
                        <a class="btn d-md-none" type="button" data-bs-toggle="offcanvas" id="d_drop_down_btn"
                            data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Filter<i
                                class="fa-solid fa-angle-down ms-4"></i></a>
                        <div class="offcanvas offcanvas-top h-100" tabindex="-1" id="offcanvasTop"
                            aria-labelledby="offcanvasTopLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasTopLabel">Filter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body" id="d_offcanvas_body">
                                <div class="flex-row d-sm-flex align-items-start">
                                    <div class="nav d-flex overflow-auto flex-nowrap flex-sm-column nav-pills"
                                        id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active d-flex align-items-center" id="v-pills-profile-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button"
                                            role="tab" aria-controls="v-pills-profile" aria-selected="false">Room
                                            Type</a>
                                        <a class="nav-link d-flex align-items-center" id="v-pills-messages-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button"
                                            role="tab" aria-controls="v-pills-messages" aria-selected="false">Smoking
                                            Preference</a>
                                        <a class="nav-link d-flex align-items-center" id="v-pills-settings-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button"
                                            role="tab" aria-controls="v-pills-settings"
                                            aria-selected="false">Additional</a>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade d_tab border-0 show active" id="v-pills-profile"
                                            role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                                            <div class="d_clear text-end"><a href="" class=" text-decoration-none">Clear
                                                    All</a></div>
                                            <ul class="list-unstyled">
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="roomType" value="all">All</li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="roomType" value="deluxe">Deluxe Room</li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="roomType" value="king">King Room</li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="roomType" value="classic">Classic Room</li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="roomType" value="queen">Queen Room</li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="roomType" value="premium">Premium Suite</li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="roomType" value="deluxeSuite">Deluxe Suite</li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="roomType" value="junior">Junior Suite</li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="roomType" value="family">Family Suite</li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="roomType" value="presidential">Presidential Suite</li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="roomType" value="executive">Executive Suite</li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="roomType" value="studio">Studio Suite</li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade d_tab border-0" id="v-pills-messages" role="tabpanel"
                                            aria-labelledby="v-pills-messages-tab" tabindex="0">
                                            <div class="d_clear"><a href="" class="text-end text-decoration-none">Clear
                                                    All</a></div>
                                            <ul class="list-unstyled">

                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="smokingPreference" value="noPreference">No Preference
                                                </li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="smokingPreference" value="smoking">Smoking</li>
                                                <li class="d-flex align-items-center"><input type="checkbox"
                                                        name="smokingPreference" value="noSmoking">No Smoking</li>
                                            </ul>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade d_tab border-0" id="v-pills-settings" role="tabpanel"
                                            aria-labelledby="v-pills-settings-tab" tabindex="0">
                                            <div class="d_clear"><a href="" class="text-end text-decoration-none">Clear
                                                    All</a></div>
                                            <ul class="list-unstyled">
                                                <li class="d-flex align-items-center"><input type="checkbox" name="view"
                                                        value="pool">Pool View</li>
                                                <li class="d-flex align-items-center"><input type="checkbox" name="view"
                                                        value="sky">Sky View</li>
                                                <li class="d-flex align-items-center"><input type="checkbox" name="view"
                                                        value="garden">Garden View</li>
                                                <li class="d-flex align-items-center"><input type="checkbox" name="view"
                                                        value="city">City View</li>
                                                <li class="d-flex align-items-center"><input type="checkbox" name="view"
                                                        value="forest">Forest View</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="dropdown-menu d_drop1 py-0" aria-labelledby="dropdownMenuLink" id="d_drop_down">
                            <div class="flex-row d-sm-flex align-items-start">
                                <div class="nav d-flex overflow-auto flex-nowrap flex-sm-column nav-pills"
                                    id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link" id="v-pills-room-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-room" type="button" role="tab"
                                        aria-controls="v-pills-room" aria-selected="false">Room Type</a>
                                    <a class="nav-link" id="v-pills-smoking-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-smoking" type="button" role="tab"
                                        aria-controls="v-pills-smoking" aria-selected="false">Smoking Preference</a>
                                    <a class="nav-link" id="v-pills-additional-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-additional" type="button" role="tab"
                                        aria-controls="v-pills-additional" aria-selected="false">Additional</a>
                                </div>
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade d_tab" id="v-pills-room" role="tabpanel"
                                        aria-labelledby="v-pills-room-tab" tabindex="0">
                                        <div class="d_clear"><a href="#" class="text-end text-decoration-none">Clear
                                                All</a></div>
                                        <ul class="list-unstyled">
                                            <li class="d-flex align-items-center">
                                                <input type="checkbox" name="roomType[]" value="all" id="roomTypeAll">All
                                            </li>
                                            @foreach ($roomTypes as $roomType)
                                                <li class="d-flex align-items-center">
                                                    <input type="checkbox" class="room-type-checkbox" name="roomType[]" value="{{ $roomType->id }}">
                                                    {{ $roomType->room_name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade d_tab" id="v-pills-smoking" role="tabpanel"
                                        aria-labelledby="v-pills-smoking-tab" tabindex="0">
                                        <div class="d_clear"><a href="#" class="text-end text-decoration-none">Clear
                                                All</a></div>
                                        <ul class="list-unstyled">
                                        @foreach($smokingPrefrences as $preference)
                                            <li class="d-flex align-items-center">
                                                <input type="checkbox" name="smokingPreference[]" value="{{ $preference->id }}">
                                                {{ $preference->name }}
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade d_tab" id="v-pills-additional" role="tabpanel"
                                        aria-labelledby="v-pills-additional-tab" tabindex="0">
                                        <div class="d_clear"><a href="#" class="text-end text-decoration-none">Clear
                                                All</a></div>
                                        <ul class="list-unstyled">
                                        @foreach($additionalPrefrence as $preference)
                                            <li class="d-flex align-items-center">
                                                <input type="checkbox" name="view[]" value="{{ $preference->id }}">
                                                {{ $preference->name }}
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="d_room">
    <div class="d_container">
        <div class="row g-lg-5 g-4 m-0" id="D_room">

        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const availableRooms = @json($availableRooms);
    console.log(availableRooms)

    window.onload = function () {
        renderRooms(availableRooms);
    }

    //     const rooms = [
    //     { id: 1, name: "1 King Bed, Forest View, Loft Guest Room", price: 1050, image: "/img/d_img/room1.png", size: "80m2", bedType: "King bed", roomType: "deluxe", smokingPreference: "noSmoking", view: "forest" },
    //     { id: 2, name: "1 Queen Bed, City View, Standard Room", price: 500, image: "/img/d_img/room2.png", size: "60m2", bedType: "Queen bed", roomType: "classic", smokingPreference: "smoking", view: "city" },
    //     { id: 3, name: "2 Double Beds, Garden View, Family Suite", price: 300, image: "/img/d_img/room3.png", size: "100m2", bedType: "Double bed", roomType: "family", smokingPreference: "noSmoking", view: "garden" },
    //     { id: 4, name: "1 King Bed, Sky View, Executive Suite", price: 1150, image: "/img/d_img/room4.png", size: "120m2", bedType: "King bed", roomType: "junior", smokingPreference: "noPreference", view: "sky" },
    //     { id: 5, name: "1 King Bed, Sky View, Executive Suite", price: 1150, image: "/img/d_img/room5.png", size: "120m2", bedType: "King bed", roomType: "executive", smokingPreference: "noPreference", view: "pool" },
    //     { id: 6, name: "1 King Bed, Sky View, Executive Suite", price: 1150, image: "/img/d_img/room6.png", size: "120m2", bedType: "King bed", roomType: "queen", smokingPreference: "noPreference", view: "garden" },
    //     { id: 7, name: "1 King Bed, Sky View, Executive Suite", price: 1150, image: "/img/d_img/room7.png", size: "120m2", bedType: "King bed", roomType: "family", smokingPreference: "noSmoking", view: "sky" },
    //     { id: 8, name: "1 King Bed, Sky View, Executive Suite", price: 1150, image: "/img/d_img/room8.png", size: "120m2", bedType: "King bed", roomType: "queen", smokingPreference: "noPreference", view: "pool" },
    //     { id: 9, name: "1 King Bed, Sky View, Executive Suite", price: 1150, image: "/img/d_img/room9.png", size: "120m2", bedType: "King bed", roomType: "classic", smokingPreference: "smoking", view: "garden" },
    //     { id: 10, name: "2 Double Beds, Garden View, Family Suite", price: 300, image: "/img/d_img/room10.png", size: "100m2", bedType: "Double bed", roomType: "family", smokingPreference: "noSmoking", view: "garden" },
    // ];

    function renderRooms(availableRooms) {
        const roomContainer = document.getElementById('D_room');
        const roomCountElement = document.getElementById('roomCount1');
        if (roomContainer) {
            roomContainer.innerHTML = ''; // Clear existing rooms

            
            availableRooms.forEach(room => {
                const imageUrl = room.image ? `/assets/upload/${room.image}` : '/assets/upload/default.png'; // Fallback image
                const roomHtml = `<div class="col-xs-12 col-sm-6">
                        <div class="d_box position-relative">
                            <div class="d_img">
                                 <img src="${imageUrl}" alt="${room.room_name}">
                            </div>
                            <div class="d_night">
                                <div class="d_price">
                                    <h6>$${room.rent}/ Night</h6>
                                </div>
                            </div>
                            <div class="d_content">
                                <div class="d_icon d-flex align-items-center">
                                    <div class="d-flex align-items-center me-3">
                                        <img src="/img/d_img/icon1.png" class="me-2" alt="">
                                        <div class="d_icondesc">${room.room_size}</div>
                                    </div>
                                    <div class="d-flex align-items-center me-3">
                                        <img src="/img/d_img/icon2.png" class="me-2" alt="">
                                        <div class="d_icondesc">Guests</div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="/img/d_img/bedroom.png" class="me-2" alt="">
                                        <div class="d_icondesc">${room.bed_type}</div>
                                    </div>
                                </div>
                                <div class="row m-0 g-2 mt-0 align-items-center">
                                    <div class="col-12 col-lg-8 p-0">
                                        <h3>${room.room_name}</h3>
                                    </div>
                                    <div class="col-12 col-lg-1 p-0"></div>
                                    <div class="col-12 col-lg-3 p-0">
                                        <div class="d_cta">
                                            <a href="{{ route('booknow')}}" class="d-block">Reserve</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;

                roomContainer.innerHTML += roomHtml;

            });
            roomCountElement.textContent = availableRooms.length;
        }
    }
    

    // Initial render
    document.addEventListener('DOMContentLoaded', () => {
        renderRooms(availableRooms);
    });
</script>

<script>
    // =================================== Get URL Data Filter FromDate, Todate, Total member ===========================

    function getQueryParams(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    // Set the values of the date inputs and guest summary based on the URL parameters
    document.addEventListener('DOMContentLoaded', function () {
        const fromDate = getQueryParams('from_date');
        const toDate = getQueryParams('to_date');
        const rooms = getQueryParams('rooms'); // Correct parameter name
        const total_member = getQueryParams('total_member'); // Correct parameter name

        if (fromDate) {
            document.getElementById('from_date').value = fromDate;
        }

        if (toDate) {
            document.getElementById('to_date').value = toDate;
        }

        // Update the guest summary
        const roomCount = rooms ? rooms : 1; // Default to 1 if not provided
        const memberCount = total_member ? total_member : 1; // Default to 1 if not provided
        document.getElementById('guest-summary').innerText = `${roomCount} Room, ${memberCount} Total Member`;
    });

</script>

<script>
    // =============================  Get DropDown Menu ===============================================

    const initialRoomCount = {{ $roomCount }}; // Pass the room count from Laravel to JavaScript
    const initialMemberCount = {{ $maxMemberCapacity }}; // Pass max member capacity from Laravel

    const roomCountElement = document.getElementById('room-count');
    const memberCountElement = document.getElementById('member-count');
    const roomsInput = document.getElementById('rooms-input');
    const membersInput = document.getElementById('members-input');
    const form = document.getElementById('availability-form');

    // Initialize room and member count on page load
    roomCountElement.textContent = 1; // Default count is 1
    memberCountElement.textContent = 1;

    // Toggle dropdown visibility
    document.querySelector('.selected-guests').addEventListener('click', function () {
        document.querySelector('.guest-dropdown').classList.toggle('show');
    });

    // Update the summary text and hidden inputs for form submission
    const updateSummary = () => {
        const roomCount = roomCountElement.textContent;
        const memberCount = memberCountElement.textContent;

        document.getElementById('guest-summary').textContent =
            `${roomCount} Room${roomCount > 1 ? 's' : ''}, ${memberCount} Total Member${memberCount > 1 ? 's' : ''}`;

        // Update hidden inputs with the current values
        roomsInput.value = roomCount;
        membersInput.value = memberCount;
    };

    // Handle the increment and decrement buttons
    document.querySelectorAll('.increment, .decrement').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent any URL changes

            const type = this.getAttribute('data-type');
            const elementId = type + '-count';
            const element = document.getElementById(elementId);
            let value = parseInt(element.textContent);

            if (this.classList.contains('increment')) {
                // Increment logic
                if (type === 'room') {
                    if (value < initialRoomCount) {
                        value++;
                    }
                } else if (type === 'member') {
                    if (value < initialMemberCount) {
                        value++;
                    }
                }
            } else if (this.classList.contains('decrement')) {
                // Decrement logic
                if (value > 1) { // Prevent values below 1
                    value--;
                }
            }

            // Update the count
            element.textContent = value;

            updateSummary(); // Update the summary
        });
    });

    // Update the summary and inputs on form submission to ensure correct values are sent
    form.addEventListener('submit', function (event) {
        // Update hidden inputs with the current values before form submission
        updateSummary();
    });

    // Initial summary update
    updateSummary();


    //========================================================== Frontend Filtrt Dropdown ===================================================

    // Sort functionality
    function sortRooms(sortBy) {
        let sortedRooms = [...availableRooms]; // Use availableRooms instead of rooms

        switch (sortBy) {
            case 'highToLow':
                sortedRooms.sort((a, b) => b.rent - a.rent); // Use rent instead of price
                break;
            case 'lowToHigh':
                sortedRooms.sort((a, b) => a.rent - b.rent);
                break;
            case 'recommended':
                // Reset to original order
                sortedRooms = [...availableRooms];
                break;
        }

        renderRooms(availableRooms);
    }

    // Dropdown handling
    document.addEventListener('DOMContentLoaded', function () {
        // Sort dropdown
        const sortDropdown = document.querySelector('.dropdown:has(a:contains("Sort by"))');
        if (sortDropdown) {
            const sortButton = sortDropdown.querySelector('.dropdown-toggle');
            const sortMenu = sortDropdown.querySelector('.dropdown-menu');

            sortButton.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                // Remove show class from filter dropdown
                const filterDropdown = document.querySelector('.dropdown:has(a:contains("Filter"))');
                if (filterDropdown) {
                    filterDropdown.querySelector('.dropdown-menu').classList.remove('show');
                    filterDropdown.classList.remove('show');
                }

                // Toggle sort dropdown
                sortMenu.classList.toggle('show');
                sortDropdown.classList.toggle('show');
            });
        }

        // Filter dropdown
        const filterDropdown = document.querySelector('.dropdown:has(a:contains("Filter"))');
        if (filterDropdown) {
            const filterButton = filterDropdown.querySelector('.dropdown-toggle');
            const filterMenu = filterDropdown.querySelector('.dropdown-menu');

            filterButton.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                // Remove show class from sort dropdown
                const sortDropdown = document.querySelector('.dropdown:has(a:contains("Sort by"))');
                if (sortDropdown) {
                    sortDropdown.querySelector('.dropdown-menu').classList.remove('show');
                    sortDropdown.classList.remove('show');
                }

                // Toggle filter dropdown
                filterMenu.classList.toggle('show');
                filterDropdown.classList.toggle('show');
            });

            // Prevent closing when clicking inside filter menu
            filterMenu.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function (e) {
            const sortDropdown = document.querySelector('.dropdown:has(a:contains("Sort by"))');
            const filterDropdown = document.querySelector('.dropdown:has(a:contains("Filter"))');

            if (!e.target.closest('.dropdown')) {
                if (sortDropdown) {
                    sortDropdown.querySelector('.dropdown-menu').classList.remove('show');
                    sortDropdown.classList.remove('show');
                }
                if (filterDropdown) {
                    filterDropdown.querySelector('.dropdown-menu').classList.remove('show');
                    filterDropdown.classList.remove('show');
                }
            }
        });

        // Event listeners for sort options
        document.querySelectorAll('input[name="sort"]').forEach(radio => {
            radio.addEventListener('change', (e) => {
                sortRooms(e.target.value);
            });
        });

        // Event listeners for filter checkboxes
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', filterRooms);
        });

        // Clear filter buttons
        document.querySelectorAll('.d_clear a').forEach(clearLink => {
            clearLink.addEventListener('click', (e) => {
                e.preventDefault();
                const checkboxes = e.target.closest('.tab-pane').querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(cb => cb.checked = false);
                filterRooms();
            });
        });
    });
</script>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdown = document.querySelector('.dropdown');
            const dropdownToggle = document.querySelector('.dropdown-toggle');
            const dropdownMenu = document.querySelector('.dropdown-menu');selectedSort 
            const tabLinks = document.querySelectorAll('#v-pills-tab .nav-link');
            const tabContents = document.querySelectorAll('#v-pills-tabContent .tab-pane');

            // Initialize Bootstrap dropdown
            const bsDropdown = new bootstrap.Dropdown(dropdownToggle);

            // Prevent dropdown from closing when clicking inside
            dropdownMenu.addEventListener('click', function (e) {
                e.stopPropagation();
            });

            // Handle tab switching
            tabLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Remove active class from all tabs and contents
                    tabLinks.forEach(tab => tab.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('show', 'active'));

                    // Add active class to clicked tab
                    this.classList.add('active');

                    // Show corresponding content
                    const target = document.querySelector(this.getAttribute('data-bs-target'));
                    if (target) {
                        target.classList.add('show', 'active');
                    }
                });
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (e) {
                if (!dropdown.contains(e.target)) {
                    bsDropdown.hide();
                }
            });
        });

</script>

<!-- Filter Working Backens Side -->
 
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const dropdownMenu = document.querySelector('.dropdown-menu');

    dropdownMenu.addEventListener('change', function (e) {
        const sortOption = e.target.value;

        // Apply filter based on the selected sort option
        applySortFilter(sortOption);
    });

    function applySortFilter(sortBy) {
        const url = new URL(window.location.href);
        url.searchParams.set('sort_by', sortBy);

        // Reload the page with the selected sort filter
        window.location.href = url.toString();
    }
});
</script>

<script>
    // Function to filter rooms based on selected criteria
    function filterRooms() {
  
        const selectedRoomTypes = Array.from(document.querySelectorAll('input[name="roomType[]"]:checked')).map(cb => cb.value);
        const selectedSmokingPreferences = Array.from(document.querySelectorAll('input[name="smokingPreference[]"]:checked')).map(cb => cb.value);
        const selectedViews = Array.from(document.querySelectorAll('input[name="view[]"]:checked')).map(cb => cb.value);

        const filteredRooms = availableRooms.filter(room => {
            // Check if the room type matches the selected room types
            const matchesRoomType = selectedRoomTypes.length === 0 || selectedRoomTypes.includes(String(room.room_type_id)) || selectedRoomTypes.includes('all'); 
            // Check if the smoking preference matches the selected preferences
            const matchesSmokingPreference = selectedSmokingPreferences.length === 0 || selectedSmokingPreferences.includes(String(room.smoking_id)) ;
            console.log(selectedSmokingPreferences,room.smoking_id);
            
            // Check if the view matches the selected views
            const matchesView = selectedViews.length === 0 || selectedViews.includes(String(room.view_id));
            // Return the room details if all conditions match
            return matchesRoomType && matchesSmokingPreference && matchesView;
        });
   
        renderRooms(filteredRooms);
    }

    // Event listeners for filter checkboxes
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', filterRooms);
    });

    // Ensure to call filterRooms on page load to apply any existing filters
    document.addEventListener('DOMContentLoaded', filterRooms);
</script>

@endsection