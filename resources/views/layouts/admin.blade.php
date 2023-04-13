<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
        <header class="navbar aside-navbar sticky-top flex-md-nowrap py-0 shadow">

            {{-- Logo / Left Navbar --}}

            <a class="logo_site first-letter:navbar-brand d-flex justify-content-center  px-3 ms-3 align-items-center h-100" href="{{ url('admin/dashboard') }}">
                <div class="h-100">
                    <img src="../logo.svg" alt="">
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
            <div class="d-none d-sm-none d-md-flex  gap-4 align-items-center ms-auto pe-5">
                <div class="profile-img-nav position-relative">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAjVBMVEUNfoD///8Ae30AeHoAdXcAdnl6q6z2+/vo8vLx+Ph1sbIAdHfu9PQHfH8AgYPl8vI7kJKRvr+hx8jO4+PJ3d4eioxppqja6eni7OxdoqRSnqC42dqXxsaw09Ntra8ph4l/uLmGtrdapqeozc02lZdMmZuuzM3A2NnU4+SRvL2fy8xSmZpEkZO+1NV1qaqNxlfBAAAEIElEQVR4nO3bXXeiOhQGYNgJg6AiiIiggtbP0U7//8+beJzjoCYtSAQ7630uetVmvZuEEOnWMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAvjNi3Ii8rkWtpuiLGCyKxA/dOchIZ3FPmGc5tVckGf4iPMUIA9/QGYNoEZr/c4Y+0zh2FSydX2KY00RfDDJ2ZlEnbadEa+EUYziBrlkkPzav2W4rJc5vYphzTQPTbYGixBZmkc/uYphDPTG29yObHb/p7YYSSQxzqSEGJbZs6FX9kavJQ1mMQV6/RDaVjWzaDU8i/ZDGMBf116knH1nH0FUoLrQ5qR2D3hQVhl0dwUvjihh2VHctsZVqaC3By6K1IoaZ1a2Qj5QXr68leznKpWQu6y5Tfv8wbKXC7HkV7hQjN1xh+rQKmeQkca6w0acFRaoKa9+HyosXci3Ry7Kk5w4de6lhKCps+nl4d+w+q/88VD0uHA3HpSpoLJ/ErH6FdHRkIw+b3GdOPOljK841DE2yvWaiYflXjLGWTKLtaolB9w8Me938uxq+uC8x0LMZUHRboqNh9T+QY3lb4ErXrUL92dXli6N23tPwt04xRsfV+MCi5O+Hl8Gy4W20EMMvXOrhRut1Jsrd+WQy2c82Wt9TVo7hpatY5FhlhvbXtsQsLmh/11w9x0vEAAAAAAAAAAAAAAAAgH8KMc/4l/8HRXyz3e2GLf07uqD/nO+fkLHZ2eeWgnZnkVi0ifSvJOLJpUXKTtoskfxdp9fZb7TWSETprtA50XCD3RWW/Qky19dUQCx3b7r2PV1jV+dd+sU6M88iDc0v1I2Cu5bextuzLqyrdrGgdhOHmL6xrGM/0hP3EfurIM42YY/fkMRYOpR2ZDvt3Yfe/iaLPVn4j7TBiL0l9xexooe24UbXIkvWL7n7uSGryh1JjEfjofQrQefV/7T8X2OuNFIvnq3FmisxlyR+zYoWo4Fi9oRB1kAhapbyytvT4OM9OpUpr1PUZhnR8SOYqosT4sxq99AmHvifxBuEo2G2iXiXc1bEeddYp8vtaN/55K9P9bntH0qJZV+kFHrh9HAI3P8sDodVqL7nCuzwrc0Wwr9YFEjbxGuy5+MWv1F+jcgPPr2XHtAL3l9j/v4Qny+CUguvHGfnvt7n3r44LSu+IFnVIDgarW8vUsSjmepQUnr24iB65dZZYt54NXi8vtEw9V64vDOx/fmHuPre6vSmWa6/r/s5xDls7W7D8lU64fZn6vFvUt4ZMcrfk2D69VnAmQbj95xefm3KiHMn73prN/g1CuO441zm1HacQRyHo19Btva6vMz5/JWd6jQ83z8mx48fZ8kx2fi5R9++tiKiPl1rOxEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALy43/ipMgzSotaqAAAAAElFTkSuQmCC" alt="">
                    <i class="online-circle fa-solid fa-circle"></i>
                </div>
                    <span class="dropdown">
                        <a class="profile-option" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="text-dark fw-bold fs-5">{{ Auth::user()->email }}
                            <i class="text-dark fa-solid fa-chevron-down"></i>
                        </a>
                      
                        <ul class="dropdown-menu dropdown-menu-end mt-4">
                          <li><a class="dropdown-item" href="#">Uno</a></li>
                          <li><a class="dropdown-item" href="#">Due</a></li>
                          <li><a class="dropdown-item" href="#">Impostazioni</a></li>
                        </ul>
                    </span>
                </div>
            </div>
            <div class="d-none d-sm-none d-md-flex  align-items-center gap-4 nav-right-item">
                <i class="fa-regular fa-envelope" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Messaggi"></i>
                <i class="fa-regular fa-bell" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Avvisi"></i>
                <div class="navbar-nav">
                    <div class="text-nowrap">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="me-5 fa-solid fa-power-off" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Logout"></i>
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
                    <div class="position-sticky pt-5">
                        <ul class="nav flex-column px-4 gap-4">
                            <div class="d-none d-sm-none d-md-flex  justify-content-between align-items-center fs-6 text-center mb-5 ">
                                <div class="profile-img">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAjVBMVEUNfoD///8Ae30AeHoAdXcAdnl6q6z2+/vo8vLx+Ph1sbIAdHfu9PQHfH8AgYPl8vI7kJKRvr+hx8jO4+PJ3d4eioxppqja6eni7OxdoqRSnqC42dqXxsaw09Ntra8ph4l/uLmGtrdapqeozc02lZdMmZuuzM3A2NnU4+SRvL2fy8xSmZpEkZO+1NV1qaqNxlfBAAAEIElEQVR4nO3bXXeiOhQGYNgJg6AiiIiggtbP0U7//8+beJzjoCYtSAQ7630uetVmvZuEEOnWMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAvjNi3Ii8rkWtpuiLGCyKxA/dOchIZ3FPmGc5tVckGf4iPMUIA9/QGYNoEZr/c4Y+0zh2FSydX2KY00RfDDJ2ZlEnbadEa+EUYziBrlkkPzav2W4rJc5vYphzTQPTbYGixBZmkc/uYphDPTG29yObHb/p7YYSSQxzqSEGJbZs6FX9kavJQ1mMQV6/RDaVjWzaDU8i/ZDGMBf116knH1nH0FUoLrQ5qR2D3hQVhl0dwUvjihh2VHctsZVqaC3By6K1IoaZ1a2Qj5QXr68leznKpWQu6y5Tfv8wbKXC7HkV7hQjN1xh+rQKmeQkca6w0acFRaoKa9+HyosXci3Ry7Kk5w4de6lhKCps+nl4d+w+q/88VD0uHA3HpSpoLJ/ErH6FdHRkIw+b3GdOPOljK841DE2yvWaiYflXjLGWTKLtaolB9w8Me938uxq+uC8x0LMZUHRboqNh9T+QY3lb4ErXrUL92dXli6N23tPwt04xRsfV+MCi5O+Hl8Gy4W20EMMvXOrhRut1Jsrd+WQy2c82Wt9TVo7hpatY5FhlhvbXtsQsLmh/11w9x0vEAAAAAAAAAAAAAAAAgH8KMc/4l/8HRXyz3e2GLf07uqD/nO+fkLHZ2eeWgnZnkVi0ifSvJOLJpUXKTtoskfxdp9fZb7TWSETprtA50XCD3RWW/Qky19dUQCx3b7r2PV1jV+dd+sU6M88iDc0v1I2Cu5bextuzLqyrdrGgdhOHmL6xrGM/0hP3EfurIM42YY/fkMRYOpR2ZDvt3Yfe/iaLPVn4j7TBiL0l9xexooe24UbXIkvWL7n7uSGryh1JjEfjofQrQefV/7T8X2OuNFIvnq3FmisxlyR+zYoWo4Fi9oRB1kAhapbyytvT4OM9OpUpr1PUZhnR8SOYqosT4sxq99AmHvifxBuEo2G2iXiXc1bEeddYp8vtaN/55K9P9bntH0qJZV+kFHrh9HAI3P8sDodVqL7nCuzwrc0Wwr9YFEjbxGuy5+MWv1F+jcgPPr2XHtAL3l9j/v4Qny+CUguvHGfnvt7n3r44LSu+IFnVIDgarW8vUsSjmepQUnr24iB65dZZYt54NXi8vtEw9V64vDOx/fmHuPre6vSmWa6/r/s5xDls7W7D8lU64fZn6vFvUt4ZMcrfk2D69VnAmQbj95xefm3KiHMn73prN/g1CuO441zm1HacQRyHo19Btva6vMz5/JWd6jQ83z8mx48fZ8kx2fi5R9++tiKiPl1rOxEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALy43/ipMgzSotaqAAAAAElFTkSuQmCC" alt="">
                                </div>
                                <div class="fw-bold fs-5">
                                    {{ Auth::user()->email }}
                                </div>
                                <div class="online">
                                    <i class="fa-solid fa-globe"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-center  align-items-center mb-5">
                                <div class="d-flex d-sm-flex d-md-none  gap-4 align-items-center pe-3 pe-sm-5">
                                    <div class="profile-img-nav">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAjVBMVEUNfoD///8Ae30AeHoAdXcAdnl6q6z2+/vo8vLx+Ph1sbIAdHfu9PQHfH8AgYPl8vI7kJKRvr+hx8jO4+PJ3d4eioxppqja6eni7OxdoqRSnqC42dqXxsaw09Ntra8ph4l/uLmGtrdapqeozc02lZdMmZuuzM3A2NnU4+SRvL2fy8xSmZpEkZO+1NV1qaqNxlfBAAAEIElEQVR4nO3bXXeiOhQGYNgJg6AiiIiggtbP0U7//8+beJzjoCYtSAQ7630uetVmvZuEEOnWMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAvjNi3Ii8rkWtpuiLGCyKxA/dOchIZ3FPmGc5tVckGf4iPMUIA9/QGYNoEZr/c4Y+0zh2FSydX2KY00RfDDJ2ZlEnbadEa+EUYziBrlkkPzav2W4rJc5vYphzTQPTbYGixBZmkc/uYphDPTG29yObHb/p7YYSSQxzqSEGJbZs6FX9kavJQ1mMQV6/RDaVjWzaDU8i/ZDGMBf116knH1nH0FUoLrQ5qR2D3hQVhl0dwUvjihh2VHctsZVqaC3By6K1IoaZ1a2Qj5QXr68leznKpWQu6y5Tfv8wbKXC7HkV7hQjN1xh+rQKmeQkca6w0acFRaoKa9+HyosXci3Ry7Kk5w4de6lhKCps+nl4d+w+q/88VD0uHA3HpSpoLJ/ErH6FdHRkIw+b3GdOPOljK841DE2yvWaiYflXjLGWTKLtaolB9w8Me938uxq+uC8x0LMZUHRboqNh9T+QY3lb4ErXrUL92dXli6N23tPwt04xRsfV+MCi5O+Hl8Gy4W20EMMvXOrhRut1Jsrd+WQy2c82Wt9TVo7hpatY5FhlhvbXtsQsLmh/11w9x0vEAAAAAAAAAAAAAAAAgH8KMc/4l/8HRXyz3e2GLf07uqD/nO+fkLHZ2eeWgnZnkVi0ifSvJOLJpUXKTtoskfxdp9fZb7TWSETprtA50XCD3RWW/Qky19dUQCx3b7r2PV1jV+dd+sU6M88iDc0v1I2Cu5bextuzLqyrdrGgdhOHmL6xrGM/0hP3EfurIM42YY/fkMRYOpR2ZDvt3Yfe/iaLPVn4j7TBiL0l9xexooe24UbXIkvWL7n7uSGryh1JjEfjofQrQefV/7T8X2OuNFIvnq3FmisxlyR+zYoWo4Fi9oRB1kAhapbyytvT4OM9OpUpr1PUZhnR8SOYqosT4sxq99AmHvifxBuEo2G2iXiXc1bEeddYp8vtaN/55K9P9bntH0qJZV+kFHrh9HAI3P8sDodVqL7nCuzwrc0Wwr9YFEjbxGuy5+MWv1F+jcgPPr2XHtAL3l9j/v4Qny+CUguvHGfnvt7n3r44LSu+IFnVIDgarW8vUsSjmepQUnr24iB65dZZYt54NXi8vtEw9V64vDOx/fmHuPre6vSmWa6/r/s5xDls7W7D8lU64fZn6vFvUt4ZMcrfk2D69VnAmQbj95xefm3KiHMn73prN/g1CuO441zm1HacQRyHo19Btva6vMz5/JWd6jQ83z8mx48fZ8kx2fi5R9++tiKiPl1rOxEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALy43/ipMgzSotaqAAAAAElFTkSuQmCC" alt="">
                                    </div>
                                        <span class="dropdown">
                                            <a class="profile-option" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="text-dark fw-bold fs-5">{{ Auth::user()->name }}
                                                <i class="text-dark fa-solid fa-chevron-down"></i>
                                            </a>
                                          
                                            <ul class="dropdown-menu dropdown-menu-end mt-4">
                                              <li><a class="dropdown-item" href="#">Uno</a></li>
                                              <li><a class="dropdown-item" href="#">Due</a></li>
                                              <li><a class="dropdown-item" href="#">Impostazioni</a></li>
                                            </ul>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex d-sm-flex d-md-none  align-items-center gap-4 nav-right-item">
                                    <i class="fa-regular fa-envelope"></i>
                                    <i class="fa-regular fa-bell"></i>
                                    <div class="navbar-nav">
                                        <div class="text-nowrap">
                                            <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="fa-solid fa-power-off"></i>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Route + menù --}}

                            <div class="d-flex flex-column gap-5 aside-item">
                                <li class="nav-item">
                                    <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.dashboard' ? 'active-aside-link' : '' }}"
                                        href="{{ route('admin.dashboard') }}">
                                        <span>Dashboard</span> <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.appartamenti' ? 'active-aside-link' : '' }}"
                                        href="{{ route('admin.dashboard') }}">
                                        <span>Appartamenti</span> <i class="fa-solid fa-house fa-lg fa-fw"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.prenotazioni' ? 'active-aside-link' : '' }}"
                                        href="{{ route('admin.dashboard') }}">
                                        <span>Prenotazioni</span> <i
                                            class="fa-regular fa-calendar-check fa-lg fa-fw"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="p-0 nav-link d-flex justify-content-between align-items-center {{ Route::currentRouteName() == 'admin.messaggi' ? 'active-aside-link' : '' }}"
                                        href="{{ route('admin.dashboard') }}">
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
                            </div>
                        </ul>


                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-9 col-xl-10 px-md-4 main-admin">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
