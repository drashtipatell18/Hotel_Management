@extends('frontend.layouts.main')
@section('title', 'About Us')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option d_banner set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="d_container">
            <div class="row">
                <div class="col-lg-12 text-center px-lg-4 px-3">
                    <div class="breadcrumb__text">
                        <h6 class="d_modify">Modify Here : </h6>
                        <form action="#" class="filter__form m-0">
                            <div class="filter__form__item">
                                <div class="filter__form__datepicker d-flex">
                                    <div class="d-flex">
                                    <img class="icon_calendar" src="{{ url('frontend/img/calander.svg') }}" alt>
                                    </div>
                                    <div>
                                        <p class="Checkin mb-0">Check in</p>
                                        <input type="text" name="from_date" class="datepicker_pop check__in" required id="from_date">
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
                                        <input type="text" name="to_date" class="datepicker_pop check__in" id="to_date" required>
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
                                                <span>Total<br/> Member</span>
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
                                <button class="Custom_btn border-0" type="submit"><a href="/booknow.html"
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
                    <p class="mb-0">(10 Rooms & Suits Available)</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 px-lg-4 px-3">
                <div class="d-flex justify-content-center justify-content-sm-end">
                    <div class="dropdown me-3">
                        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Sort by
                            <i class="fa-solid fa-angle-down ms-4"></i>
                        </a>

                        <ul class="dropdown-menu py-0">
                            <li class="d-flex align-items-center">
                                <input type="radio" name="sort" value="highToLow" id="highToLow">
                                <label for="highToLow">Price: High to Low</label>
                            </li>
                            <li class="d-flex align-items-center">
                                <input type="radio" name="sort" value="lowToHigh" id="lowToHigh">
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
                                            <li class="d-flex align-items-center"><input type="checkbox" name="roomType"
                                                    value="all">All</li>
                                            <li class="d-flex align-items-center"><input type="checkbox" name="roomType"
                                                    value="deluxe">Deluxe Room</li>
                                            <li class="d-flex align-items-center"><input type="checkbox" name="roomType"
                                                    value="king">King Room</li>
                                            <li class="d-flex align-items-center"><input type="checkbox" name="roomType"
                                                    value="classic">Classic Room</li>
                                            <li class="d-flex align-items-center"><input type="checkbox" name="roomType"
                                                    value="queen">Queen Room</li>
                                            <li class="d-flex align-items-center"><input type="checkbox" name="roomType"
                                                    value="premium">Premium Suite</li>
                                            <li class="d-flex align-items-center"><input type="checkbox" name="roomType"
                                                    value="deluxeSuite">Deluxe Suite</li>
                                            <li class="d-flex align-items-center"><input type="checkbox" name="roomType"
                                                    value="junior">Junior Suite</li>
                                            <li class="d-flex align-items-center"><input type="checkbox" name="roomType"
                                                    value="family">Family Suite</li>
                                            <li class="d-flex align-items-center"><input type="checkbox" name="roomType"
                                                    value="presidential">Presidential Suite</li>
                                            <li class="d-flex align-items-center"><input type="checkbox" name="roomType"
                                                    value="executive">Executive Suite</li>
                                            <li class="d-flex align-items-center"><input type="checkbox" name="roomType"
                                                    value="studio">Studio Suite</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade d_tab" id="v-pills-smoking" role="tabpanel"
                                        aria-labelledby="v-pills-smoking-tab" tabindex="0">
                                        <div class="d_clear"><a href="#" class="text-end text-decoration-none">Clear
                                                All</a></div>
                                        <ul class="list-unstyled">
                                            <li class="d-flex align-items-center"><input type="checkbox"
                                                    name="smokingPreference" value="noPreference">No Preference</li>
                                            <li class="d-flex align-items-center"><input type="checkbox"
                                                    name="smokingPreference" value="smoking">Smoking</li>
                                            <li class="d-flex align-items-center"><input type="checkbox"
                                                    name="smokingPreference" value="noSmoking">No Smoking</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade d_tab" id="v-pills-additional" role="tabpanel"
                                        aria-labelledby="v-pills-additional-tab" tabindex="0">
                                        <div class="d_clear"><a href="#" class="text-end text-decoration-none">Clear
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

<script>
    const availableRooms = @json($availableRooms);

    window.onload = function(){
        renderRooms();
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

function renderRooms() {
    const roomContainer = document.getElementById('D_room');
    if (roomContainer) {    
        roomContainer.innerHTML = ''; // Clear existing rooms

        availableRooms.forEach(room => {
            const imageUrl = room.image ? `/assets/upload/${room.image}` : '/assets/upload/default.png'; // Fallback image
            const roomHtml = `
           <div class="col-xs-12 col-sm-6">
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
    }
}

function demo() {
    `<div class="col-xs-12 col-sm-6">
                        <div class="d_box">
                            <div class="d_img">
                                <img src="${room.image}" alt="${room.name}">
                                <div class="d_night">
                                    <div class="d_price">
                                        <h6>$${room.price}/ Night</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="d_content">
                                <div class="d_icon d-flex align-items-center">
                                    <div class="d-flex align-items-center me-3">
                                        <img src="/img/d_img/icon1.png" class="me-2" alt="">
                                        <div class="d_icondesc">${room.size}</div>
                                    </div>
                                    <div class="d-flex align-items-center me-3">
                                        <img src="/img/d_img/icon2.png" class="me-2" alt="">
                                        <div class="d_icondesc">Guests</div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="/img/d_img/bedroom.png" class="me-2" alt="">
                                        <div class="d_icondesc">${room.bedType}</div>
                                    </div>
                                </div>
                                <h3>${room.name}</h3>
                                <div class="d_cta">
                                    <a href="/booknow.html">Reserve</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
}
function filterRooms() {
    const checkedRoomTypes = Array.from(document.querySelectorAll('input[name="roomType"]:checked')).map(el => el.value);
    const checkedSmokingPreferences = Array.from(document.querySelectorAll('input[name="smokingPreference"]:checked')).map(el => el.value);
    const checkedViews = Array.from(document.querySelectorAll('input[name="view"]:checked')).map(el => el.value);

    const filteredRooms = rooms.filter(room => {
        const roomTypeMatch = checkedRoomTypes.length === 0 || checkedRoomTypes.includes('all') || checkedRoomTypes.includes(room.roomType);
        const smokingMatch = checkedSmokingPreferences.length === 0 || checkedSmokingPreferences.includes(room.smokingPreference);
        const viewMatch = checkedViews.length === 0 || checkedViews.includes(room.view);

        return roomTypeMatch && smokingMatch && viewMatch;
    });

    renderRooms(filteredRooms);
}

// Event listeners for checkboxes
document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', filterRooms);
});

// Clear filters
document.querySelectorAll('.d_clear a').forEach(clearLink => {
    clearLink.addEventListener('click', (e) => {
        e.preventDefault();
        const checkboxes = e.target.closest('.tab-pane').querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(cb => cb.checked = false);
        filterRooms();
    });
});

// Initial render
document.addEventListener('DOMContentLoaded', () => {
    renderRooms(availableRooms);
});

// Sorting function (from previous example)
// function sortRooms(sortBy) {
//     let sortedRooms = [...rooms]; // Create a copy of the rooms array

//     switch (sortBy) {
//         case 'highToLow':
//             sortedRooms.sort((a, b) => b.price - a.price);
//             break;
//         case 'lowToHigh':
//             sortedRooms.sort((a, b) => a.price - b.price);
//             break;
//         case 'recommended':
//             // For simplicity, we'll keep the original order for 'recommended'
//             // You might want to implement a more complex recommendation algorithm here
//             break;
//     }

//     renderRooms(sortedRooms);
// }

// Event listener for sort options
// document.querySelectorAll('input[name="sort"]').forEach(radio => {
//     radio.addEventListener('change', (e) => {
//         sortRooms(e.target.value);
//     });
// });


// $(document).ready(function () {
//     // Prevent the dropdown menu from closing when clicking inside it
//     $('.dropdown-menu.d_drop1').on('click', function (e) {
//         e.stopPropagation();
//     });

//     // Toggle the Filter dropdown when the Filter button is clicked
//     $('a.dropdown-toggle:contains("Filter")').on('click', function (e) {
//         e.preventDefault();
//         var dropdownMenu = $(this).next('.dropdown-menu.d_drop1');
//         $(this).parent().toggleClass('show');
//         dropdownMenu.toggleClass('show');
//     });

//     // Close the Filter dropdown when clicking outside of it
//     $(document).on('click', function (e) {
//         if (!$(e.target).closest('.dropdown:has(a:contains("Filter"))').length) {
//             $('.dropdown-menu.d_drop1').removeClass('show');
//             $('.dropdown').removeClass('show');
//         }
//     });

//     // Handle tab switching
//     $('#v-pills-tab .nav-link').on('click', function (e) {
//         e.preventDefault();
//         e.stopPropagation();

//         // Remove active class from all tabs
//         $('#v-pills-tab .nav-link').removeClass('active');

//         // Hide all tab content
//         $('#v-pills-tabContent .tab-pane').removeClass('show active');

//         // Add active class to clicked tab
//         $(this).addClass('active');

//         // Show corresponding content only if it's not already visible
//         var target = $(this).attr('data-bs-target');
//         if (!$(target).hasClass('show active')) {
//             $(target).addClass('show active');
//         } else {
//             // If the clicked tab was already active, hide its content
//             $(target).removeClass('show active');
//         }

//         // Keep dropdown open
//         $(this).closest('.dropdown-menu.d_drop1').addClass('show');
//         $(this).closest('.dropdown').addClass('show');
//     });
// });

// offcanvas

// // Get references to the necessary elements
// if (document.getElementById('offcanvasTop')) {


//     const dropdownToggle = document.getElementById('dropdownMenuLink');
//     const offcanvasToggle = document.getElementById('d_drop_down_btn');
//     const offcanvasElement = document.getElementById('offcanvasTop');
//     const dropdownMenu = document.getElementById('d_drop_down');

//     // Initialize Bootstrap components
//     const offcanvas = new bootstrap.Offcanvas(offcanvasElement);
//     const dropdown = new bootstrap.Dropdown(dropdownToggle);

//     // Function to handle resize events
//     function handleResize() {
//         if (window.innerWidth >= 768) {
//             // Close offcanvas if it's open
//             if (offcanvas._isShown) {
//                 offcanvas.hide();
//             }
//             // Show dropdown toggle, hide offcanvas toggle
//             dropdownToggle.classList.remove('d-none');
//             offcanvasToggle.classList.add('d-none');
//         } else {
//             // Close dropdown if it's open
//             if (dropdown._menu.classList.contains('show')) {
//                 dropdown.hide();
//             }
//             // Hide dropdown toggle, show offcanvas toggle
//             dropdownToggle.classList.add('d-none');
//             offcanvasToggle.classList.remove('d-none');
//         }
//     }

//     // Add event listeners
//     window.addEventListener('resize', handleResize);
//     window.addEventListener('load', handleResize);

//     // Additional event listener to close dropdown when screen becomes smaller
//     dropdownToggle.addEventListener('shown.bs.dropdown', function () {
//         const closeDropdownIfSmall = function () {
//             if (window.innerWidth < 768) {
//                 dropdown.hide();
//                 window.removeEventListener('resize', closeDropdownIfSmall);
//             }
//         };
//         window.addEventListener('resize', closeDropdownIfSmall);
//     });
// }

</script>
<script>
// =================================== Get URL Data ===========================

function getQueryParams(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

// Set the values of the date inputs and guest summary based on the URL parameters
document.addEventListener('DOMContentLoaded', function() {
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


// =============================  Get DropDown Menu ===============================================

document.querySelector('.selected-guests').addEventListener('click', function() {
    document.querySelector('.guest-dropdown').classList.toggle('show');
});

// Update the summary text at the top
const updateSummary = () => {
    const roomCount = document.getElementById('room-count').textContent;
    const adultCount = document.getElementById('adult-count').textContent;
    const childCount = document.getElementById('child-count').textContent;
    
    document.getElementById('guest-summary').textContent = 
        `${roomCount} Room${roomCount > 1 ? 's' : ''}, ${adultCount} Adult${adultCount > 1 ? 's' : ''}, ${childCount} Child${childCount > 1 ? 'ren' : ''}`;
};

// Handle the increment and decrement buttons
document.querySelectorAll('.increment, .decrement').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default action (e.g., form submission)
        
        const type = this.getAttribute('data-type');
        const elementId = type + '-count';
        const element = document.getElementById(elementId);
        let value = parseInt(element.textContent);
        
        if (this.classList.contains('increment')) {
            value++;
        } else if (this.classList.contains('decrement') && value > 0) {
            value--;
        }

        element.textContent = value;
        updateSummary();
    });
});


</script>
@endsection