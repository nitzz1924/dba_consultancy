<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('home') }}" class="logo logo-dark">
            <span class="logo-sm p-2">
                <img class="rounded-pill" src="{{ asset('assets/images/dfavicon.png') }}" alt="dfavicon" height="35" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/dbalogo.png') }}" alt="dbalogo" height="100" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('home') }}" class="logo logo-light py-2">
            <span class="logo-sm p-2">
                <img class="rounded-pill" src="{{ asset('assets/images/dfavicon.png') }}" alt="" height="35" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/dbalogo.png') }}" alt="dbalogo" height="100" />
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
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('home') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="bx bx-home"></i>&nbsp;<span class="fs-5">Home</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('wallet') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('wallet') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="bx bx-wallet"></i>&nbsp;<span class="fs-5">Wallet</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('allservices') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('allservices') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class=" ri-list-settings-line"></i>&nbsp;<span class="fs-5">All Services</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('refer') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('refer') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class=" ri-hand-heart-fill"></i>&nbsp;<span class="fs-5">Refer A Friend</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('orderpage') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('orderpage') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class=" ri-shopping-cart-fill"></i><span>My Orders</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('allrefers') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('allrefers') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class=" ri-team-fill"></i><span>All Refers</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('customercommission') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('customercommission') }}" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-coins-fill"></i><span>Commission</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>