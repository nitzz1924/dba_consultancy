<html lang="en" data-layout="vertical" data-topbar="    " data-sidebar-size="lg" data-sidebar="dark"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="DBA Consultancy" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/dfavicon.png') }}" />

    <!-- jsvectormap css -->
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/glightbox/css/glightbox.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.13.2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="{{ asset('assets/backend-assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend-assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('assets/backend-assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    {{--
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/multi.js/multi.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/libs/%40tarekraafat/autocomplete.js/css/autoComplete.css')}}"> --}}
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header justify-content-between">
                    <div class="d-flex ">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="/" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/oldlogo.png') }}" alt=""
                                        height="22" />
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/oldlogo.png') }}" alt=""
                                        height="17" />
                                </span>
                            </a>

                            <a href="/" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/oldlogo.png') }}" alt=""
                                        height="22" />
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/oldlogo.png') }}" alt=""
                                        height="17" />
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </div>

                    <div>
                        <a href="/home" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/dbalogo.png') }}" alt="" height="70" />
                            </span>

                        </a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">

                                    @if (Auth::guard('customer')->user() && !is_null(Auth::guard('customer')->user()->profileimage))
                                        <div class="border rounded-pill border-danger">
                                            <img src="{{ asset('/assets/images/userprofile/' . Auth::guard('customer')->user()->profileimage) }}"
                                                class="img-fluid" alt="userprofile" width="25">
                                        </div>
                                    @else
                                        <img class="rounded-circle header-profile-user"
                                            src="{{ asset('assets/images/defaultuser.png') }}" alt="Header Avatar" />
                                    @endif

                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                            @if (Auth::guard('customer')->user())
                                                {{ Auth::guard('customer')->user()->username }}
                                            @else
                                                Guest User
                                            @endif
                                        </span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="/userprofile"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">My Profile</span></a>
                                <hr>
                                <form method="GET" action="{{ route('logoutuserpanel') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item" href="auth-lockscreen-basic.html"><i
                                            class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle">Log Out</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width: 100px; height: 100px">
                            </lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">
                                    Are you sure you want to remove this Notification ?
                                </p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">
                                Yes, Delete It!
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="vertical-overlay"></div>
        @include('layouts.UserPanelLayouts.user-navigation')
        @stack('title')

        <div class="main-content">
            <div class="page-content">
                @yield('content')
            </div>
            <footer class="footer">
                <div class="mobnav">
                    <nav class="nav">
                        <a href="{{ route('home') }}"
                            class="nav-item {{ request()->routeIs('home') ? 'is-active' : '' }}">
                            <i class='bx bx-home-alt'></i>
                            <span>Home</span>
                        </a>
                        <a href="{{ route('allservices') }}"
                            class="nav-item {{ request()->routeIs('allservices') ? 'is-active' : '' }}">
                            <i class='bx bx-server'></i>
                            <span>Services</span>
                        </a>
                        <a href="{{ route('orderpage') }}"
                            class="nav-item {{ request()->routeIs('orderpage') ? 'is-active' : '' }}">
                            <i class='bx bx-list-ol'></i>
                            <span>Orders</span>
                        </a>
                        <a href="{{ route('wallet') }}"
                            class="nav-item {{ request()->routeIs('wallet') ? 'is-active' : '' }}">
                            <i class='bx bx-wallet'></i>
                            <span>Wallet</span>
                        </a>
                        <a href="{{ route('refer') }}"
                            class="nav-item {{ request()->routeIs('refer') ? 'is-active' : '' }}">
                            <i class='bx bx-message-alt-add'></i>
                            <span>Refer</span>
                        </a>

                        <div class="nav-indicator-wrapper">
                            <span class="nav-indicator"></span>
                        </div>
                    </nav>

                </div>


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            © DBA CONSULTANCY.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Developed with ❤️ by YUVMEDIA.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/libs/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/libs/fg-emoji-picker/fgEmojiPicker.js') }}"></script>
    <script src="{{ asset('assets/js/pages/chat.init.js') }}"></script>

    <script src="{{ asset('assets/libs/multi.js/multi.min.js') }}"></script>
    <script src="{{ asset('assets/libs/%40tarekraafat/autocomplete.js/autoComplete.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ asset('assets/js/pages/flag-input.init.js') }}"></script>
    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/toastify-js" async></script> --}}
    <!-- Dashboard init -->
    <script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.7/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.7/plugin/relativeTime.js"></script>
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/js/pages/notifications.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    {{-- <script>
        dayjs.extend(dayjs_plugin_relativeTime);
    </script> --}}

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.13.2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>

    @if (session('success'))
        <script>
            // Display SweetAlert for success message
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                buttonsStyling: true,
                showCancelButton: true,
                showCloseButton: true,
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            // Display SweetAlert for error message
            Swal.fire({
                title: "Error!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                buttonsStyling: true,
                showCloseButton: true,
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const indicator = document.querySelector('.nav-indicator-wrapper');
            const items = document.querySelectorAll('.nav-item');

            function updateIndicator(el) {
                indicator.style.width = `${el.offsetWidth}px`;
                indicator.style.left = `${el.offsetLeft}px`;
            }

            function setActiveFromBlade() {
                const activeItem = document.querySelector('.nav-item.is-active');
                if (activeItem) {
                    updateIndicator(activeItem);
                }
            }

            // Initialize based on server-rendered class
            setActiveFromBlade();

            // Handle client-side navigation for smooth transitions
            items.forEach((item) => {
                item.addEventListener('click', () => {
                    // Allow page reload for Laravel route handling
                    items.forEach(i => i.classList.remove('is-active'));
                    item.classList.add('is-active');
                });
            });
        });
    </script>
</body>

</html>
