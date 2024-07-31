<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ set_active(['home']) }}">
                    <a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                </li>

                <li class="list-divider"></li>

                <li class="{{ set_active(['hotel/list']) }}">
                    <a href="{{ route('hotel/list') }}"><i class="fas fa-hotel"></i><span>Hotel</span></a>
                </li>

                <li class="{{ set_active(['amenities/list']) }}">
                    <a href="{{ route('amenities/list') }}">
                        <img src="{{ url('assets/icons/amenitys.png') }}" style="width: 20px; height:20px"><span>Amenities</span>
                    </a>
                </li>

                <li class="{{ set_active(['roomtype/list']) }}">
                    <a href="{{ route('roomtype/list') }}">
                        <img src="{{ url('assets/icons/room_types.png') }}" style="width: 20px; height:20px"><span>Room Type</span>
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

                <li class="{{ set_active(['form/allcustomers/page']) }}">
                    <a href="{{ route('form/allcustomers/page') }}"><i class="fas fa-user"></i> <span>Customers</span></a>
                </li>

                <li class="{{ set_active(['form/allrooms/page']) }}">
                    <a href="{{ route('form/allrooms/page') }}">
                        <img src="{{ url('assets/icons/room.png') }}" style="width: 20px; height:20px"><span>Rooms</span>
                    </a>
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

                <li class="submenu">
                    <a href="#">
                        <i class="fa fa-user-plus"></i>
                        <span> User Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a class="{{ set_active(['users/add/new']) }}" href="{{ route('users/add/new') }}">Add User</a></li>
                        <li><a class="{{ set_active(['users/list/page']) }}" href="{{ route('users/list/page') }}">All User</a></li>
                        <li><a href="">User Log Activity </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
