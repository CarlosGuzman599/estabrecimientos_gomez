<!--Garcita❤️Dani-->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ranita</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@300;400;600;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0e074d7bfb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/all.js"></script>
    <script>
        window.addEventListener('popstate', function(event) {
        history.pushState(null, null, window.location.pathname);
        history.pushState(null, null, window.location.pathname);
        }, false);
    </script>
    @yield('scripts')

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app" class="bg-ranita-wallpaper fm-sans">

        <div class="row justify-content-center">
            <div class="notification-space px-3 text-center mb-3" id="notification">
                <p class="mt-3 mb-0 text-bold fm-releway" id="notification-header"></p>
                <P class="mt-0 fm-releway" id="notification-message">message</P>
            </div>
        </div>

        <nav class="row navbar navbar-expand-md navbar-light bg-ranita shadow rounded-bottom navbar-personal justify-content-center">
            <div class="container row justify-content-between">
                <a class="navbar-brand col" href="{{ url('/') }}"><img src="/img/icon.png" alt="" class="icon"></a>

                <input id="search-welcome" type="text" class="form-control text-capitalize input-search fm-raleway text-center my-3" placeholder="Buscar" name="search-welcome" value="{{ old('search-welcome') }}">
                
                <button class="navbar-toggler col" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto align-items-center">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link fs-3 mx-3" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a>
                                    
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link fs-3 mx-3" href="{{ route('register') }}"><i class="fas fa-user-plus"></i></a>
                                    
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fs-3 mx-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="far fa-user-circle"></i></a>

                                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/">Principal</a>
                                    <a class="dropdown-item" href="{{ route('home') }}">Mis anuncios</a>
                                    <a class="dropdown-item btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="height:99%">
            @yield('content')
        </main>

        <div class="container-footer bg-ranita justify-content-center p-1 shadow-in-img">
            <p class="m-0 color-white">Todos los derechos reservados &copy <span>Ranita</span> 2024</p>
        </div>

    </div>

</body>
</html>