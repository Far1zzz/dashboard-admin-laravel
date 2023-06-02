<!DOCTYPE html>
<html lang="en" class="light">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="E-tamu Banyuasin">
    <meta name="author" content="LEFT4CODE">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('template/dist/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/dist/css/custom.css') }}" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!-- END: CSS Assets-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link href="{{ asset('images/banyuasin.png') }}" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

</head>

<body class="main">

    {{-- menu mobile --}}
    <div class="mobile-menu d-md-none">
        <div class="mobile-menu-bar">
            <a href="#" class="d-flex me-auto">
                <img alt="images" class="w-8" src="{{ asset('images/banyuasin.png') }}">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler" class="mobile-menu-bar__toggler"> <i
                    data-feather="bar-chart-2" class="w-8 h-8 text-white"></i> </a>
        </div>
        <ul class="mobile-menu-wrapper border-top border-theme-29 dark-border-dark-3 py-5">
            @if (auth()->user()->role == 'bupati')
                <li>
                    <a class="menu" href="{{ route('home') }}">
                        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard Bupati </div>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 'kominfo')
                <li>
                    <a class="menu" href="{{ route('home') }}">
                        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard Kominfo </div>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 'sekda')
                <li>
                    <a class="menu" href="{{ route('home') }}">
                        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard Setda </div>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 'bupati')
                <li>
                    <a class="menu" href="{{ route('show-bupati') }}">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="menu__title"> Riwayat Tamu Bupati </div>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 'kominfo')
                <li>
                    <a class="menu" href="{{ route('show-kominfo') }}">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="menu__title"> Riwayat Tamu Kominfo </div>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 'sekda')
                <li>
                    <a class="menu" href="{{ route('show-setda') }}">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="menu__title"> Riwayat Tamu Setda </div>
                    </a>
                </li>
            @endif
        </ul>
    </div>


    <div class="d-flex">
        <nav class="side-nav">
            <a href="#" class="intro-x d-flex align-items-center ps-5 pt-4">
                <img alt="image" class="w-8" src="{{ asset('images/banyuasin.png') }}">
                <span class="d-none d-xl-block text-white fs-lg ms-3">Admin Buku Tamu </span>
            </a>
            <div class="side-nav__devider my-4"></div>
            <ul>

                @if (auth()->user()->role === 'bupati')
                    <li>
                        <a href="{{ route('home') }}" class="side-menu" data-target="#home">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title">
                                Home Bupati
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('show-bupati') }}" class="side-menu" data-target="#riwayat-tamu">
                            <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                            <div class="side-menu__title">
                                Riwayat Tamu Bupati
                            </div>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role === 'kominfo')
                    <li>
                        <a href="{{ route('home') }}" class="side-menu" data-target="#home">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title">
                                Home Diskominfo-SP
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('show-kominfo') }}" class="side-menu" data-target="#riwayat-tamu">
                            <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                            <div class="side-menu__title">
                                Riwayat Tamu Diskominfo-SP
                            </div>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role == 'sekda')
                    <li>
                        <a href="{{ route('home') }}" class="side-menu" data-target="#home">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title">
                                Home setda
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('show-setda') }}" class="side-menu" data-target="#riwayat-tamu">
                            <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                            <div class="side-menu__title">
                                Riwayat Tamu Setda
                            </div>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>

        <div class="content">
            <div class="top-bar">
                <div class="-intro-x breadcrumb me-auto d-none d-sm-flex">
                    <a class="side-menu" data-target="#home" href="{{ route('home') }}">Home</a>
                    @yield('breadcrumb')
                </div>

                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div style="display:flex; justify-content:center; align-items:center;"
                        class="dropdown-toggle w-8 h-8 rounded-pill overflow-hidden shadow-lg image-fit zoom-in"
                        role="button" aria-expanded="false" data-bs-toggle="dropdown">
                        <i data-feather="users"></i>
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-theme-kominfo dark-bg-dark-6 text-white">
                            <li class="p-2">
                                <div class="fw-medium text-white">{{ auth()->user()->name }}</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider dark-border-dark-3">
                            </li>
                            <li>
                                <a href="#"
                                    class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i
                                        data-feather="user" class="w-4 h-4 me-2"></i> Profile </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i
                                        data-feather="lock" class="w-4 h-4 me-2"></i> Reset Password </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i
                                        data-feather="help-circle" class="w-4 h-4 me-2"></i> Help </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider dark-border-dark-3">
                            </li>
                            <li>
                                <a class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                                    <i data-feather="toggle-right" class="w-4 h-4 me-2"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->

            <div class="grid columns-12 gap-6">
                <div class="g-col-12 g-col-xxl-12">
                    <div class="grid columns-12 gap-6">
                        <div class="g-col-12 mt-8">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
        <script>
            const navLinks = document.querySelectorAll('.side-menu');

            navLinks.forEach(navLink => {
                navLink.addEventListener('click', () => {
                    if (!navLink.classList.contains('side-menu--active')) {
                        navLinks.forEach(link => link.classList.remove('side-menu--active', 'side-menu--open'));
                        navLink.classList.add('side-menu--active', 'side-menu--open');
                        sessionStorage.setItem('selectedNav', navLink.getAttribute('data-target'));
                    }
                });
            });

            const selectedNav = sessionStorage.getItem('selectedNav');
            if (selectedNav) {
                const navLink = document.querySelector(`[data-target="${selectedNav}"]`);
                navLink.classList.add('side-menu--active', 'side-menu--open');
            }
        </script>

        <script src="{{ asset('template/dist/js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>

</body>

</html>
