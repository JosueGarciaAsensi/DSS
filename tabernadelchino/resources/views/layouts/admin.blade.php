<html>

<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background-color: #ffa834;">
    @section('menu')
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
        <div class="container-fluid">
            <img src="{{ asset('img/logo.png') }}" width=80>
            <a href="{{ route('home') }}" class="navbar-brand">La Taberna del Chino</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"></button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="nav"></div>
            </div>
        </div>
        <div class="dropdown m-3">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                @if (App::getLocale() == 'es')
                <img src="{{ asset('img/espana.png')}}" width="20px">
                @else
                <img src="{{ asset('img/english.png')}}" width="20">
                @endif
                {{ Config::get('languages')[App::getLocale()] }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="{{ route('lang.switch', 'es') }}">
                    <img src="{{ asset('img/espana.png')}}" width="20px">
                    Español
                </a>
                <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">
                    <img src="{{ asset('img/english.png')}}" width="20px">
                    English
                </a>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
        <div class="container-fluid">
            <a href="{{ url('/admin') }}" class="nav-item nav-link">
                <div class="row">
                    <div class="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-house-door text-light" viewBox="0 0 16 16">
                            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                        </svg>
                    </div>
                    <div class="col">
                        <h4 class="text-light">{{__('text.home')}}</h4>
                    </div>
                </div>
            </a>
            <a href="{{ url('/admin-users') }}" class="nav-item nav-link">
                <div class="row">
                    <div class="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person text-light mt-2" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                    </div>
                    <div class="col">
                        <h4 class="text-light">{{__('text.users')}}</h4>
                    </div>
                </div>
            </a>
            <a href="{{ url('/admin-products') }}" class="nav-item nav-link">
                <div class="row">
                    <div class="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-cup text-light" viewBox="0 0 16 16">
                            <path d="M1 2a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v1h.5A1.5 1.5 0 0 1 16 4.5v7a1.5 1.5 0 0 1-1.5 1.5h-.55a2.5 2.5 0 0 1-2.45 2h-8A2.5 2.5 0 0 1 1 12.5V2zm13 10h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5H14v8zM13 2H2v10.5A1.5 1.5 0 0 0 3.5 14h8a1.5 1.5 0 0 0 1.5-1.5V2z" />
                        </svg>
                    </div>
                    <div class="col">
                        <h4 class="text-light">{{__('text.products')}}</h4>
                    </div>
                </div>
            </a>
            <a href="{{ url('/admin-beertypes') }}" class="nav-item nav-link">
                <div class="row">
                    <div class="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-list-task text-light" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z" />
                            <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z" />
                            <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z" />
                        </svg>
                    </div>
                    <div class="col">
                        <h4 class="text-light">{{__('text.types')}}</h4>
                    </div>
                </div>
            </a>
        </div>
    </nav>
    @show

    @yield('content')
</body>

</html>