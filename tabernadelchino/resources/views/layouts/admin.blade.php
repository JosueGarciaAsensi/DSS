<html>

<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('javascript')
    <style>
        .loader-page {
            position: fixed;
            z-index: 25000;
            background: #ffa834;
            left: 0px;
            top: 0px;
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition:all .3s ease;
        }
        .loader-page::before {
            content: "";
            position: absolute;
            border: 2px solid rgb(50, 150, 176);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-sizing: border-box;
            border-left: 2px solid #000;
            border-top: 2px solid #000;
            animation: rotarload 1s linear infinite;
            transform: rotate(0deg);
        }
        @keyframes rotarload {
            0%   {transform: rotate(0deg)}
            100% {transform: rotate(360deg)}
        }
        .loader-page::after {
            content: "";
            position: absolute;
            border: 2px solid white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-sizing: border-box;
            border-left: 2px solid #000;
            border-top: 2px solid #000;
            animation: rotarload 1s ease-out infinite;
            transform: rotate(0deg);
        }
    </style>
</head>

<body style="background-color: #ffa834;">
<div class="loader-page"></div>
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
                @elseif (App::getLocale() == 'en')
                <img src="{{ asset('img/english.png')}}" width="20">
                @elseif (App::getLocale() == 'val')
                <img src="{{ asset('img/valencia.png')}}" width="20">
                @else
                <img src="{{ asset('img/china.png')}}" width="20">
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
                <a class="dropdown-item" href="{{ route('lang.switch', 'cn') }}">
                    <img src="{{ asset('img/china.png')}}" width="20px">
                    中文
                </a>
                <a class="dropdown-item" href="{{ route('lang.switch', 'val') }}">
                    <img src="{{ asset('img/valencia.png') }}" width="20px">
                    Valencià
                </a>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
        <div class="container-fluid">
            <a href="{{ route('admin') }}" class="nav-item nav-link">
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
            <a href="{{ route('admin-users') }}" class="nav-item nav-link">
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
            <a href="{{ route('admin-products') }}" class="nav-item nav-link">
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
            <a href="{{ route('admin-orders') }}" class="nav-item nav-link">
                <div class="row">
                    <div class="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-box-seam text-light" viewBox="0 0 16 16">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                    </div>
                    <div class="col">
                        <h4 class="text-light">{{__('text.orders')}}</h4>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin-beertypes') }}" class="nav-item nav-link">
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

    <script>
        $(window).on('load', function () {
            setTimeout(function () {
                $(".loader-page").css({visibility:"hidden",opacity:"0"})
            }, Math.random() * (1001 - 500) + 500);
        });
    </script>
</body>

</html>