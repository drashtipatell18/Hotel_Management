<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="{{ set_active(['home']) }}">
                        <a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                    </li>

                    <li class="list-divider"></li>


                <li class="submenu">
                    <a href="#">
                        <img src="{{ url('assets/icons/room.png') }}" style="width: 20px; height:20px">
                        <span> Hotel </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a class="{{ set_active(['hotel/list']) }}" href="{{ route('hotel/list') }}">Hotel</a></li>
                        <li><a class="{{ set_active(['amenities/hotel/list']) }}" href="{{ route('amenities/hotel/list') }}">Hotel Amenities </a></li>
                    </ul>
                </li>

                <li class="{{ set_active(['facilities/list']) }}">
                    <a href="{{ route('facilities/list') }}">
                        <img src="{{ url('assets/icons/facility.png') }}" style="width: 25px; height:25px"><span>Facilities</span>
                    </a>
                </li>

                <li class="{{ set_active(['clientReview/list']) }}">
                    <a href="{{ route('clientReview/list') }}">
                        <img src="{{ url('assets/icons/amenitys.png') }}" style="width: 20px; height:20px"><span>Client Review</span>
                    </a>
                </li>

                <li class="{{ set_active(['floor/list']) }}">
                    <a href="{{ route('floor/list') }}">
                        <img src="{{ url('assets/icons/floor.png') }}" style="width: 20px; height:20px"><span>Floors</span>
                    </a>
                </li>

                <li class="{{ set_active(['food/list']) }}">
                    <a href="{{ route('food/list') }}">
                        <img src="{{ url('assets/icons/food.png') }}" style="width: 20px; height:20px"><span>Foods</span>
                    </a>
                </li>

                <li class="{{ set_active(['spa/list']) }}">
                    <a href="{{ route('spa/list') }}">
                        <img src="{{ url('assets/icons/spa.png') }}" style="width: 20px; height:20px"><span>Spa</span>
                    </a>
                </li>

                <li class="{{ set_active(['offer/package/list']) }}">
                    <a href="{{ route('offer/package/list') }}">
                        <img src="{{ url('assets/icons/offerPackage.png') }}" style="width: 20px; height:20px"><span>Offer Package</span>
                    </a>
                </li>

                <li class="{{ set_active(['coupon/list']) }}">
                    <a href="{{ route('coupon/list') }}">
                        <img src="{{ url('assets/icons/coupon.png') }}" style="width: 20px; height:20px"><span>Coupons</span>
                    </a>
                </li>

                <li class="{{ set_active(['form/allcustomers/page']) }}">
                    <a href="{{ route('form/allcustomers/page') }}"><i class="fas fa-user"></i> <span>Customers</span></a>
                </li>


                <li class="submenu">
                    <a href="#">
                        <img src="{{ url('assets/icons/room.png') }}" style="width: 20px; height:20px">
                        <span> Rooms </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a class="{{ set_active(['roomtype/list']) }}" href="{{ route('roomtype/list') }}">Room Types</a></li>
                        <li><a class="{{ set_active(['form/allrooms/page']) }}" href="{{ route('form/allrooms/page') }}">Rooms</a></li>
                        <li><a class="{{ set_active(['amenities/list']) }}" href="{{ route('amenities/list') }}">Rooms Amenities </a></li>
                    </ul>
                </li>


                <li class="{{ set_active(['form/allbooking']) }}">
                    <a href="{{ route('form/allbooking') }}">
                        <img src="{{ url('assets/icons/booking.png') }}" style="width: 20px; height:20px"><span>Booking</span>
                    </a>
                </li>

                <li class="{{ set_active(['position/list']) }}">
                    <a href="{{ route('position/list') }}">
                        <img src="{{ url('assets/icons/position.png') }}" style="width: 20px; height:20px"><span>Positions</span>
                    </a>
                </li>

                <li class="{{ set_active(['staff/list']) }}">
                    <a href="{{ route('staff/list') }}"><i class="fas fa-user"></i><span>Staff</span></a>
                </li>

                <li class="{{ set_active(['pricemanager/add']) }}">
                    <a href="{{ route('pricemanager/add') }}">
                        <img src="{{ url('assets/icons/price.png') }}" style="width: 20px; height:20px"><span>Price Manager</span>
                    </a>
                </li>

                <li class="{{ set_active(['event/list']) }}">
                    <a href="{{ route('event/list') }}">
                        <img src="{{ url('assets/icons/event.png') }}" style="width: 20px; height:20px"><span>Events</span>
                    </a>
                </li>

                <li class="submenu">
                    <a href="#">
                        <img src="{{ url('assets/icons/hall.png') }}" style="width: 20px; height:20px">
                        <span> Halls </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a class="{{ set_active(['halltype/list']) }}" href="{{ route('halltype/list') }}">Hall Types</a></li>
                        <li><a class="{{ set_active(['hall/list']) }}" href="{{ route('hall/list') }}">Halls</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#">
                        <img src="{{ url('assets/icons/smoke-zone.png') }}" style="width: 20px; height:20px">
                        <span> Filter </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a class="{{ set_active(['smoking/list']) }}" href="{{ route('smoking/list') }}">Smoking Preference</a></li>
                        <li><a class="{{ set_active(['additionalFilter/list']) }}" href="{{ route('additionalFilter/list') }}">Additional Preference</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#">
                        <i class="fa fa-user-plus"></i>
                        <span> Admin </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a class="{{ set_active(['users/add/new']) }}" href="{{ route('users/add/new') }}">Add Admin</a></li>
                        <li><a class="{{ set_active(['users/list/page']) }}" href="{{ route('users/list/page') }}">All Users</a></li>
                        <li><a href="">User Log Activity </a></li>
                    </ul>
                </li>

                <li class="{{ set_active(['contact/list']) }}">
                    <a href="{{ route('contact/list') }}">
                        <img src="{{ url('assets/icons/call1.png') }}" style="width: 20px; height:20px"><span>Contact Us</span>
                    </a>
                </li>

                <li class="{{ set_active(['location.list']) }}">
                    <a href="{{ route('location.list') }}">
                        <img src="{{ url('assets/icons/call1.png') }}" style="width: 20px; height:20px"><span>Location</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</div>
