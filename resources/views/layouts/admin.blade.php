<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fontawesome 6 cdn -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />

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
            <header class="navbar aside-navbar sticky-top flex-md-nowrap p-2 shadow">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 d-flex justify-content-center gap-3 align-items-center" href="/">
                    <div>
                        Logo 
                    </div>
                    <span class="logo-name">Boolbnb</span>
                </a>
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
                <div class="d-flex gap-4 align-items-center">
                    <div>Foto</div>
                    <div>Nome Cognome</div>
                </div>
                <div class="d-flex align-items-center gap-4 nav-right-item">
                    <i class="fa-regular fa-envelope"></i>
                    <i class="fa-regular fa-bell"></i>
                    <div class="navbar-nav">
                        <div class="nav-item text-nowrap">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="me-5 fa-solid fa-power-off"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container-fluid vh-100">
                <div class="row h-100">
                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block aside-navbar sidebar collapse">
                        <div class="position-sticky pt-5">
                            <ul class="nav flex-column px-4">
                                <div class="d-flex justify-content-between fs-6 text-center mb-5">
                                    <div>
                                        Foto
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div>
                                            Nome Cognome
                                        </div>
                                        <div>
                                            Extra label
                                        </div>
                                    </div>
                                    <div>
                                        i
                                    </div>
                                </div>
                                <div class="d-flex flex-column gap-5 aside-item">
                                    <li class="nav-item">
                                        <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.dashboard' ? 'active-aside-link' : '' }}" href="{{route('admin.dashboard')}}">
                                           <span>Dashboard</span> <i class="fa-solid fa-house fa-lg fa-fw"></i> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.test' ? 'active-aside-link' : '' }}" href="{{route('admin.dashboard')}}">
                                           <span>Label 1</span> <i class="fa-solid fa-house fa-lg fa-fw"></i> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.test' ? 'active-aside-link' : '' }}" href="{{route('admin.dashboard')}}">
                                           <span>Label 1</span> <i class="fa-solid fa-house fa-lg fa-fw"></i> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.test' ? 'active-aside-link' : '' }}" href="{{route('admin.dashboard')}}">
                                           <span>Label 1</span> <i class="fa-solid fa-house fa-lg fa-fw"></i> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.test' ? 'active-aside-link' : '' }}" href="{{route('admin.dashboard')}}">
                                           <span>Label 1</span> <i class="fa-solid fa-house fa-lg fa-fw"></i> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.test' ? 'active-aside-link' : '' }}" href="{{route('admin.dashboard')}}">
                                           <span>Label 1</span> <i class="fa-solid fa-house fa-lg fa-fw"></i> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.test' ? 'active-aside-link' : '' }}" href="{{route('admin.dashboard')}}">
                                           <span>Label 1</span> <i class="fa-solid fa-house fa-lg fa-fw"></i> 
                                        </a>
                                    </li>
                                </div>
                            </ul>


                        </div>
                    </nav>

                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-admin">
                        @yield('content')
                    </main>
                </div>
            </div>

        </div>
    </body>

</html>
