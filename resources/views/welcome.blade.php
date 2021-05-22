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
    <link href="<?= asset('css/welcome.css') ?>" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>

<body>
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
    <div class="carousel slide carousel-fade" data-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= asset('images/library_front.jpg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption main">
                    <h5 class="main-header">{{ __('welcome.carousel_caption1') }}</h5>
                    <p class="carousel-text main-text">{{ __('welcome.carousel_text1') }}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= asset('images/library_front.jpg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption main">
                    <h5 class="main-header">{{ __('welcome.carousel_caption2') }}</h5>
                    <p class="carousel-text main-text">{{ __('welcome.carousel_text2') }}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= asset('images/library_front.jpg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption main">
                    <h5 class="main-header">{{ __('welcome.carousel_caption3') }}</h5>
                    <p class="carousel-text main-text">{{ __('welcome.carousel_text3') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container about">
        <h4 id="about-us">{{ __('welcome.about_us') }}</h4>
        <div class="row">
            <div class="col-2">
                <img src="<?= asset('images/join_library.png') ?>" class="d-block about-us-img" style="width:80px;height:80px" alt="...">
            </div>
            <div class="col-10">
                <h6 id="row-title">{{ __('welcome.join_library') }}</h6>
                <p>{{ __('welcome.join_library_desc') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col col-2">
                <img src="<?= asset('images/help.png') ?>" class="d-block about-us-img" style="width:80px;height:80px" alt="...">
            </div>
            <div class="col col-10">
                <h6 id="row-title">{{ __('welcome.help') }}</h6>
                <p>{{ __('welcome.help_desc') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col col-2">
                <img src="<?= asset('images/ask.png') ?>" class="d-block about-us-img" style="width:80px;height:80px" alt="...">
            </div>
            <div class="col col-10">
                <h6 id="row-title">{{ __('welcome.ask') }}</h6>
                <p>{{ __('welcome.ask_desc') }}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <h4 id="about-us">{{ __('welcome.popular') }}</h4>
        <div id="slideShow" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @forelse($books as $key=>$book)
                @if($key == 0)
                <div class="carousel-item book active">
                    <img src="{{$book->image_url}}" class="d-block w-100-popular" alt="Carousel image">
                    <div class="carousel-caption d-md-block">
                        <h5>{{$book->name}}</h5>
                        <p>{{$book->author->name}} - {{$book->genre->name}}</p>
                    </div>
                </div>
                @else
                <div class="carousel-item book">
                    <img src="{{$book->image_url}}" class="d-block w-100-popular" alt="Carousel image">
                    <div class="carousel-caption d-md-block">
                        <h5>{{$book->name}}</h5>
                        <p>{{$book->author->name}} - {{$book->genre->name}}</p>
                    </div>
                </div>
                @endif
                @empty
                <div class="carousel-item book active">
                    <img src="<?= asset('images/velegradsko_podzemlje.jpg') ?>" class="d-block w-100-popular" alt="Carousel image">
                    <div class="carousel-caption d-md-block">
                        <h5>Posljednji Stipančići: Iz velegradskog podzemlja</h5>
                        <p>Vjenceslav Novak - Comic Book or Novel</p>
                    </div>
                </div>
                <div class="carousel-item book">
                    <img src="<?= asset('images/odiseja.jpg') ?>" class="d-block w-100-popular" alt="Carousel image">
                    <div class="carousel-caption d-md-block">
                        <h5>Odiseja</h5>
                        <p>Homer - Comic Book or Novel</p>
                    </div>
                </div>
                <div class="carousel-item book">
                    <img src="<?= asset('images/price_iz_davnine.jpg') ?>" class="d-block w-100-popular" alt="Carousel image">
                    <div class="carousel-caption d-md-block">
                        <h5>Priče iz davnine</h5>
                        <p>Ivana Brlić Mažuranić - Fantasy</p>
                    </div>
                </div>
                @endforelse
            </div>
            <a class="carousel-control-prev" href="#slideShow" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">{{ __('welcome.carousel_previous') }}</span>
            </a>
            <a class="carousel-control-next" href="#slideShow" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">{{ __('welcome.carousel_next') }}</span>
            </a>
        </div>
    </div>
    <div class="container-raising" style="background-image: url('images/raising_future.jpg');">
        <h4 id="raise-title">{{ __('welcome.raising_skill') }}</h4>
        <p id="raise-description">{{ __('welcome.raising_skill_desc1') }}</p>
        <p id="raise-description">{{ __('welcome.raising_skill_desc2') }}</p>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="" class="inactiveLink"><i class="icon ion-social-instagram"></i></a><a href="#" class="inactiveLink"><i class="icon ion-social-snapchat"></i></a><a href="#" class="inactiveLink"><i class="icon ion-social-twitter"></i></a><a href="#" class="inactiveLink"><i class="icon ion-social-facebook"></i></a></div>
            <p class="copyright">Copyright - Franjo Josip Jukić © 2021</p>
        </footer>
    </div>
</body>

</html>