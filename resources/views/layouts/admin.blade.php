<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- fontawesome  --}}
    <link rel="stylesheet" href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">


    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <header class="navbar aside-navbar sticky-top flex-md-nowrap py-0">

            {{-- Logo / Left Navbar --}}

            <a class="logo_site first-letter:navbar-brand d-flex justify-content-center  px-3 ms-3 align-items-center h-100"
                href="{{ url('admin/dashboard') }}">
                <div class="h-100">
                    <img src="{{ asset('assets/logo.svg') }}" alt="">
                </div>
                <span class="fs-3">
                    BoolBnB
                </span>
            </a>

            {{-- Right Navbar  --}}

            <button class="navbar-toggler burger-menu-admin position-absolute d-md-none collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-none d-sm-none d-md-flex  gap-4 align-items-center ms-auto me-2">
                <div class="profile-img-nav position-relative">
                    <img src="{{ asset('assets/face-profile/red.jpg') }}" alt="">
                    <i class="online-circle fa-solid fa-circle"></i>
                </div>
                <a class="profile-option" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="text-dark fw-bold fs-5">{{ Auth::user()->email }}
                </a>
            </div>
            <div class="d-none d-sm-none d-md-flex  align-items-center gap-4 nav-right-item">
                <i class="fa-regular fa-envelope" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    data-bs-title="Messaggi"></i>
                <i class="fa-regular fa-bell" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    data-bs-title="Avvisi"></i>
                <div class="navbar-nav">
                    <div class="text-nowrap">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="me-5 fa-solid fa-power-off" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-title="Logout"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </header>

        {{-- Aside Bar + responsive menu --}}

        <div class="container-fluid admin-h">
            <div class="row h-100">
                <nav id="sidebarMenu" class="col-md-3 col-lg-3 col-xl-2 d-md-block aside-navbar sidebar collapse">

                    <ul class="d-flex flex-column justify-content-start mt-5 h-100 gap-5 aside-item">
                        <li class="nav-item">
                            <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.dashboard' ? 'active-aside-link' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <span>Dashboard</span> <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.apartment' ? 'active-aside-link' : '' }}"
                                href="{{ route('admin.apartments.index') }}">
                                <span>Appartamenti</span> <i class="fa-solid fa-house fa-lg fa-fw"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.prenotazioni' ? 'active-aside-link' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <span>Prenotazioni</span> <i class="fa-regular fa-calendar-check fa-lg fa-fw"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.messaggi' ? 'active-aside-link' : '' }}"
                                href="{{ route('admin.messages.index') }}">
                                <span>Messaggi</span><i class="fa-solid fa-message fa-lg fa-fw"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.sponsor' ? 'active-aside-link' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <span>Sponsor</span> <i class="fa-solid fa-sack-dollar fa-lg fa-fw"></i>
                            </a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.profilo' ? 'active-aside-link' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <span>Profilo</span> <i class="fa-solid fa-user fa-lg fa-fw"></i>
                            </a>
                        </li>
                    </ul>

                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-9 col-xl-10 px-md-4 main-admin h-100 ">
                    <div>
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

    </div>
</body>

</html>
