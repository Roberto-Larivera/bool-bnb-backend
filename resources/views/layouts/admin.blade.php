<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ url('assets/favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}@yield('title')</title>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    {{-- fontawesome  --}}
    {{-- <link rel="stylesheet" href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}"> --}}

     {{-- prevent Braintree stylesheet  --}}
     {{-- <link rel="stylesheet" id="braintree-dropin-stylesheet"> --}}
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    
    @yield('head')
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <header class="aside-navbar sticky-top py-0">
            <div class="container-fluid h-100">
                <div class="row h-100">
                    <div class="col d-flex">
                        {{-- Logo / Left Navbar --}}

                        <a class="logo_site first-letter:navbar-brand d-flex justify-content-center  px-3 align-items-center h-100"
                            href="{{ url('admin/dashboard') }}">
                            <div class="h-100">
                                <img src="{{ asset('assets/logo.svg') }}">
                            </div>
                            <span class="fs-3">
                                BoolBnB
                            </span>
                        </a>

                        {{-- Right Navbar  --}}

                        <button class="btn align-self-center ms-auto d-md-none" type="button" data-bs-toggle="modal"
                            data-bs-target="#navBarModal">
                            <i class="fa-solid fa-bars"></i>
                        </button>

                        <div class="d-none d-sm-none d-md-flex align-items-center gap-4  ms-auto me-4">
                            <a href="{{ route('admin.user_datas.index') }}"
                                class="text-decoration-none d-flex align-items-center gap-4 h-100">
                                <div class="profile-img-nav position-relative">
                                    <img src="{{ asset(Auth::user()->user_data->profile_img) }}" alt="">
                                    {{-- <i class="online-circle fa-solid fa-circle"></i> --}}
                                </div>
                                <span class="profile-text">
                                    {{-- @dd(Auth::user()->user_data->name); --}}
                                    @if (Auth::user()->user_data->name != null)
                                        {{ Auth::user()->user_data->name }}
                                    @else
                                        {{-- {{ Auth::user()->email }} --}}
                                        profilo personale
                                    @endif
                                </span>
                            </a>
                            <div class="my-nav-link">
                                <a href="{{ route('admin.messages.index') }}">
                                    <i class="fa-regular fa-envelope" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-title="Messaggi"></i>
                                </a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-power-off" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        data-bs-title="Logout"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Modal -->
        <div class="modal fade w-100" id="navBarModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content py-4 px-5">
                    <div class="modal-header pt-0 ps-0 pe-0 justify-content-center">
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="{{ asset(Auth::user()->user_data->profile_img) }}" alt="Foto profilo"
                                class="rounded-circle img-fluid mb-3" style="max-width: 100px;">
                            <h4>
                                @if (Auth::user()->user_data->name != null)
                                    {{ Auth::user()->user_data->name }}
                                @else
                                    {{ Auth::user()->email }}
                                @endif
                            </h4>
                        </div>
                        <div id="sidebarMenu2">
                            <ul class="d-flex flex-column justify-content-center h-100 aside-item">
                                <li class="nav-item">
                                    <a class="nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.dashboard' ? 'active-aside-link' : '' }}"
                                        href="{{ route('admin.dashboard') }}">
                                        <span>Dashboard</span> <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex justify-content-between align-items-center 
                                    {{ Route::currentRouteName() == 'admin.apartments.index' ? 'active-aside-link' : '' }}
                                    {{ Route::currentRouteName() == 'admin.apartments.show' ? 'active-aside-link' : '' }}
                                    {{ Route::currentRouteName() == 'admin.apartments.create' ? 'active-aside-link' : '' }}
                                    {{ Route::currentRouteName() == 'admin.apartments.edit' ? 'active-aside-link' : '' }}
                                    "
                                        href="{{ route('admin.apartments.index') }}">
                                        <span>Appartamenti</span> <i class="fa-solid fa-building fa-lg fa-fw"></i>
                                    </a>
                                </li>
                                {{-- bonus  --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link d-flex justify-content-between align-items-center"
                                        href="{{ route('admin.dashboard') }}">
                                        <span>Prenotazioni</span> <i class="fa-regular fa-calendar-check fa-lg fa-fw"></i>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link d-flex justify-content-between align-items-center
                                     {{ Route::currentRouteName() == 'admin.messages.index' ? 'active-aside-link' : '' }}"
                                        href="{{ route('admin.messages.index') }}">
                                        <span>Messaggi</span><i class="fa-solid fa-message fa-lg fa-fw"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex justify-content-between align-items-center 
                                    {{ Route::currentRouteName() == 'admin.sponsors.index' ? 'active-aside-link' : '' }}
                                    {{ Route::currentRouteName() == 'admin.sponsors.show' ? 'active-aside-link' : '' }}
                                    "
                                        href="{{ route('admin.sponsors.index') }}">
                                        <span>Sponsor</span> <i class="fa-solid fa-sack-dollar fa-lg fa-fw"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex justify-content-between align-items-center 
                                    {{ Route::currentRouteName() == 'admin.user_datas.index' ? 'active-aside-link' : '' }}
                                    {{ Route::currentRouteName() == 'admin.user_datas.show' ? 'active-aside-link' : '' }}
                                    "
                                        href="{{ route('admin.user_datas.index') }}">
                                        <span>Profilo</span> <i class="fa-solid fa-user fa-lg fa-fw"></i>
                                    </a>
                                </li>
                                <li class="my-home mt-5">
                                    {{-- collegamento frontend --}}
                                    <a class="btn d-flex justify-content-center align-items-center"
                                        href="http://localhost:5174/">
                                        <span>Home</span> <i class="fa-solid fa-house fa-lg fa-fw ms-3"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Aside Bar + responsive menu --}}
        <div class="container-fluid admin-h">
            <div class="row h-100">
                <nav id="sidebarMenu" class="col-md-4 px-5  col-lg-3 col-xxl-2 d-none d-md-block">

                    <ul class="d-flex flex-column justify-content-center h-100 aside-item">
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.dashboard' ? 'active-aside-link' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <span>Dashboard</span> <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center 
                            {{ Route::currentRouteName() == 'admin.apartments.index' ? 'active-aside-link' : '' }}
                            {{ Route::currentRouteName() == 'admin.apartments.show' ? 'active-aside-link' : '' }}
                            {{ Route::currentRouteName() == 'admin.apartments.create' ? 'active-aside-link' : '' }}
                            {{ Route::currentRouteName() == 'admin.apartments.edit' ? 'active-aside-link' : '' }}
                            "
                                href="{{ route('admin.apartments.index') }}">
                                <span>Appartamenti</span> <i class="fa-solid fa-building fa-lg fa-fw"></i>
                            </a>
                        </li>
                        {{-- bonus  --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center"
                                href="{{ route('admin.dashboard') }}">
                                <span>Prenotazioni</span> <i class="fa-regular fa-calendar-check fa-lg fa-fw"></i>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center
                             {{ Route::currentRouteName() == 'admin.messages.index' ? 'active-aside-link' : '' }}"
                                href="{{ route('admin.messages.index') }}">
                                <span>Messaggi</span><i class="fa-solid fa-message fa-lg fa-fw"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center 
                            {{ Route::currentRouteName() == 'admin.sponsors.index' ? 'active-aside-link' : '' }}
                            {{ Route::currentRouteName() == 'admin.sponsors.show' ? 'active-aside-link' : '' }}
                            "
                                href="{{ route('admin.sponsors.index') }}">
                                <span>Sponsor</span> <i class="fa-solid fa-sack-dollar fa-lg fa-fw"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center 
                            {{ Route::currentRouteName() == 'admin.user_datas.index' ? 'active-aside-link' : '' }}
                            {{ Route::currentRouteName() == 'admin.user_datas.show' ? 'active-aside-link' : '' }}
                            "
                                href="{{ route('admin.user_datas.index') }}">
                                <span>Profilo</span> <i class="fa-solid fa-user fa-lg fa-fw"></i>
                            </a>
                        </li>
                        <li class="my-home mt-5">
                            {{-- collegamento frontend --}}
                            <a class="btn d-flex justify-content-center align-items-center"
                                href="http://localhost:5174/">
                                <span>Home</span> <i class="fa-solid fa-house fa-lg fa-fw ms-3"></i>
                            </a>
                        </li>
                    </ul>

                </nav>

                <main class="col-12 col-md-8 ms-sm-auto col-lg-9 col-xxl-10 px-md-4 main-admin h-100 ">
                    <div>
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

    </div>

    @yield('javascript')

</body>

</html>
