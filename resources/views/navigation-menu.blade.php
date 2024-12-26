<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('assets/images/dfavicon.png')}}" alt="" height="60" />
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/dfavicon.png')}}" alt="" height="60" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('assets/images/dfavicon.png')}}" alt="" height="40" />
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/dbalogo.png')}}" alt="" height="100" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard')}}">
                        <img class="" src="{{ asset('assets/images/dashboard.png') }}" alt=""
                            height="20" />&nbsp;&nbsp;<span class="fs-5">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLanding">
                        <img class="" src="{{ asset('assets/images/cogwheel.png') }}" alt=""
                        height="20" />&nbsp;&nbsp;<span class="fs-5">Settings</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('master') }}" class="nav-link" data-key="t-one-page">
                                    Master
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('submaster') }}" class="nav-link" data-key="t-one-page">
                                  Sub-Master
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('createform') }}">
                        <img class="" src="{{ asset('assets/images/registration-form.png') }}" alt=""
                            height="20" />&nbsp;&nbsp;<span class="fs-5">Create Forms</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('pricingdetails') }}">
                        <img class="" src="{{ asset('assets/images/details.png') }}" alt=""
                            height="20" />&nbsp;&nbsp;<span class="fs-5">Add Service Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#cutomers" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="cutomers">
                        <img class="" src="{{ asset('assets/images/end.png') }}" alt=""
                        height="20" />&nbsp;&nbsp;<span class="fs-5">Customer</span>
                    </a>
                    <div class="collapse menu-dropdown" id="cutomers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('allcustomers') }}" class="nav-link" data-key="t-one-page">
                                    Customers List
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customersallorders') }}" class="nav-link" data-key="t-one-page">
                                    Orders
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('referincomelevel') }}">
                        <img class="" src="{{ asset('assets/images/change.png') }}" alt=""
                            height="20" />&nbsp;&nbsp;<span class="fs-5">Refer Income Level</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('referedusers') }}">
                        <img class="" src="{{ asset('assets/images/exchanging.png')}}" alt=""
                            height="20" />&nbsp;&nbsp;<span class="fs-5">My Refered Users</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
