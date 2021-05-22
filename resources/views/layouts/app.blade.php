<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= asset('images/join_library.png') ?>" type="image/x-icon" />

    <title>Library</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="<?= asset('css/applayout.css') ?>" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="container">

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <div class="d-flex flex-nowrap w-100">
                    <a class="navbar-brand" href="{{ url('/') }}">PUBLIC LIBRARY</a>
                    <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/') }}"><i class="bi bi-house-door"></i> </span>{{ __('navigation.nav_home') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-journal-bookmark"></i>
                                {{ __('navigation.nav_catalog') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="nav-link dropdown-item" href="{{ url('/books') }}"><i class="bi bi-book"></i> {{ __('navigation.nav_books') }}</a></li>
                                <li><a class="nav-link dropdown-item" href="{{ url('/authors') }}"><i class="bi bi-person"></i> {{ __('navigation.nav_authors') }}</a></li>
                                <li><a class="nav-link dropdown-item" href="{{ url('/genres') }}"><i class="bi bi-list-ul"></i> {{ __('navigation.nav_genres') }}</a></li>
                                <li><a class="nav-link dropdown-item" href="{{ url('/publishers') }}"><i class="bi bi-people"></i> {{ __('navigation.nav_publishers') }}</a></li>
                                @auth
                                @if(auth()->user()->role->name == 'Administrator')
                                <li><a class="nav-link dropdown-item" href="{{ url('/users') }}"><i class="bi bi-person-check"></i> {{ __('navigation.nav_users') }}</a></li>
                                @endif
                                @endauth
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('navigation.nav_language') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="nav-link dropdown-item {{ 'hr' == app()->getLocale() ? 'active' : ''}}" href="{{ url('locale/hr') }}">
                                    HR
                                </a>
                                <a class="nav-link dropdown-item {{ 'en' == app()->getLocale() ? 'active' : ''}}" href="{{ url('locale/en') }}">
                                    EN
                                </a>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-person"></i>
                                {{ __('navigation.nav_profile') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @guest
                                @if (Route::has('login'))
                                <li><a class="nav-link dropdown-item" href="{{ url('/login') }}"><i class="bi bi-key"></i> {{ __('navigation.nav_login') }}</a></li>
                                @endif

                                @if (Route::has('register'))
                                <li><a class="nav-link dropdown-item" href="{{ url('/register') }}"><i class="bi bi-person-plus"></i> {{ __('navigation.nav_register') }}</a></li>
                                @endif
                                @else
                                <li><a class="nav-link dropdown-item" href="{{ url('/profile') }}"><i class="bi bi-gear"></i> {{ __('navigation.nav_settings') }}</a></li>
                                <li><a class="nav-link dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="bi bi-door-open"></i> {{ __('navigation.nav_logout') }}</a></li>
                                <form hidden id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                @endif

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="footer-basic">
            <footer>
                <div class="social"><a href="" class="inactiveLink"><i class="icon ion-social-instagram"></i></a><a href="#" class="inactiveLink"><i class="icon ion-social-snapchat"></i></a><a href="#" class="inactiveLink"><i class="icon ion-social-twitter"></i></a><a href="#" class="inactiveLink"><i class="icon ion-social-facebook"></i></a></div>
                <p class="copyright">Copyright - Franjo Josip Jukić © 2021</p>
            </footer>
        </div>
    </div>
</body>

</html>