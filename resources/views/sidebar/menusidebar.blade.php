<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
            <li class="{{ set_active(['home']) }}"> <a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>

                <li class="list-divider"></li>

                <li class=""> <a href="{{ route('hotel/list') }}"><i class="fas fa-hotel"></i><span>Hotel</span></a> </li>
                <li><a href="{{ route('amenities/list') }}">
                        <img src="{{ url('assets/icons/amenitys.png') }}" style="width: 20px; height:20px"><span>Amenities</span>
                    </a>
                </li>

                <li class=""> <a href="{{ route('roomtype/list') }}">
                    <img src="{{ url('assets/icons/room_types.png') }}" style="width: 20px; height:20px"><span>Room Type</span>
                </a> </li>

                <li class=""> <a href="{{ route('floor/list') }}">
                    <img src="{{ url('assets/icons/floor.png') }}" style="width: 20px; height:20px"><span>Floors</span>
                </a></li>

                <li class=""> <a href="{{ route('food/list') }}">
                    <img src="{{ url('assets/icons/food.png') }}" style="width: 20px; height:20px"><span>Foods</span>
                </a> </li>

                <li class=""> <a href="{{ route('form/allcustomers/page') }}"><i class="fas fa-user"></i> <span>Customers</span></a> </li>


                <li class=""> <a href="{{ route('form/allrooms/page') }}">
                    <img src="{{ url('assets/icons/room.png') }}" style="width: 20px; height:20px"><span>Rooms</span>
                </a> </li>

                <li class=""> <a href="{{ route('form/allbooking') }}">
                    <img src="{{ url('assets/icons/booking.png') }}" style="width: 20px; height:20px"><span>Booking</span>
                </a> </li>

                {{-- <li class=""> <a href="#"> <img src="{{ url('assets/icons/booking.png') }}" style="width: 20px; height:20px"> <span> Booking </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a class="{{ set_active(['form/allbooking']) }}" href="{{ route('form/allbooking') }}"> All Booking </a></li>
                        <li><a class="{{ request()->is('form/booking/edit/*') ? 'active' : '' }}"> Edit Booking </a></li>
                        <li><a class="{{ set_active(['form/booking/add']) }}" href="{{ route('form/booking/add') }}"> Add Booking </a></li>
                    </ul>
                </li> --}}





                {{-- <li class="submenu"> <a href="#"><img src="{{ url('assets/icons/room.png') }}" style="width: 20px; height:20px"><span> Rooms </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a class="{{ set_active(['form/allrooms/page']) }}" href="{{ route('form/allrooms/page') }}">All Rooms </a></li>
                        <li><a class="{{ request()->is('form/room/edit/*') ? 'active' : '' }}"> Edit Rooms </a></li>
                        <li><a class="{{ set_active(['form/addroom/page']) }}" href="{{ route('form/addroom/page') }}"> Add Rooms </a></li>
                    </ul>
                </li> --}}
                <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a  class="{{ set_active(['form/emplyee/list']) }}" href="{{ route('form/emplyee/list') }}">Employees List </a></li>
                        <li><a  class="{{ set_active(['form/employee/add']) }}" href="{{ route('form/employee/add') }}">Employees Add </a></li>
                        <li><a  class="{{ set_active(['form/leaves/page']) }}" href="{{ route('form/leaves/page') }}">Leaves </a></li>
                        <li><a href="holidays.html">Holidays </a></li>
                        <li><a href="attendance.html">Attendance </a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="far fa-money-bill-alt"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="invoices.html">Invoices </a></li>
                        <li><a href="payments.html">Payments </a></li>
                        <li><a href="expenses.html">Expenses </a></li>
                        <li><a href="taxes.html">Taxes </a></li>
                        <li><a href="provident-fund.html">Provident Fund </a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><img src="{{ url('assets/icons/payroll.png') }}" style="width: 20px; height:20px"> <span> Payroll </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="salary.html">Employee Salary </a></li>
                        <li><a href="salary-veiw.html">Payslip </a></li>
                    </ul>
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
