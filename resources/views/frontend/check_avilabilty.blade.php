@extends('frontend.layouts.main')
@section('title', 'About Us')
@section('main-container')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option d_banner set-bg" data-setbg="{{ url('frontend/img/breadcrumb-bg.jpg') }}">
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
                                    <input type="text" class="datepicker_pop check__in">
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
                                    <input type="text" class="datepicker_pop check__in">
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
                                            1 Adult, 0 Child</span>
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
                                            <span>Adults</span>
                                            <div class="guest-item">
                                                <button class="decrement" data-type="adult">-</button>
                                                <span id="adult-count">1</span>
                                                <button class="increment" data-type="adult">+</button>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Children</span>
                                            <div class="guest-item">
                                                <button class="decrement" data-type="child">-</button>
                                                <span id="child-count">1</span>
                                                <button class="increment" data-type="child">+</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="Custom_btn border-0" type="submit"><a href="{{ route('booknow') }}"
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

<section class=" d_room">
        <div class="d_container">
            <div class="row g-lg-5 g-4 m-0" id="D_room">
               
            </div>
        </div>
</section>

@endsection