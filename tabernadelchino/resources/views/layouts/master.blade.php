<html>
    <head>
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="d-flex flex-column min-vh-100" style="background-color: #ffa834;">
        @section('menu')
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
            <div class="container-fluid">
                <img src="{{ asset('img/logo.png') }}" width=80>
                <a href="{{ route('index') }}" class="navbar-brand">La Taberna del Chino</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"></button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="{{ route('index') }}" class="nav-item nav-link active">Inicio</a>
                        <a href="{{ route('products') }}" class="nav-item nav-link">Productos</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">Sobre nosotros</a>
                    </div>
                    <form class="d-flex" action="{{ route('search') }}" method="GET">
                        {{ csrf_field() }}
                        <div class="input-group mt-3">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Buscar">
                            <button type="submit" class="btn" style="background-color: #ffa834;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search text-light" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <div class="navbar-nav">
                        <a href="{{ url('/cart/0') }}" class="nav-item nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bag text-light mt-2" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                        </a>
                        <div class="dropdown nav-item nav-link">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person text-light mt-2" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <!-- <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar sesión</a>
                                <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#createModal">Registrarse</a> -->
                                <a class="dropdown-item" href="{{ route('login') }}">Iniciar sesión</a>
                                <a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        @show

        <div class="container">
            @yield('content')
        </div>

        <!-- Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalTitle">Iniciar sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/login')}}" method="POST">
                        @method('PUT')
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="passwd">Contraseña: </label>
                            <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" disabled>Iniciar sesión</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalTitle">Crear usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/users/create')}}" method="POST">
                        @method('PUT')
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Nombre: </label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="surname">Apellidos: </label>
                            <input type="text" id="surname" name="surname" class="form-control" placeholder="Apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="passwd">Contraseña: </label>
                            <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="dni">DNI: </label>
                            <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" required>
                        </div>
                        <br>
                        <h3>Dirección</h3>
                        <div class="form-group">
                            <label for="type">Tipo: </label>
                            <select id="type" name="type">
                                <option value="Calle">Calle</option>
                                <option value="Avenida">Avenida</option>
                                <option value="Paseo">Paseo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección: </label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Dirección" required>
                        </div>
                        <div class="form-group">
                            <label for="cp">Código postal: </label>
                            <input type="text" class="form-control" id="cp" name="cp" placeholder="Código postal" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
        </div>
    </body>
        <!-- Footer -->
        <footer class="text-center text-white mt-auto" style="background-color: black;">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook text-light" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
            </a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter text-light" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
            </svg>
            </a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-github text-light" viewBox="0 0 16 16">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                </svg>
            </a>
            </section>
            <!-- Section: Social media -->

            <!-- Section: Text -->
            <section class="mb-2">
                <h4>Contáctanos</h4>
                <p>Carr. de San Vicente del Raspeig, s/n, 03690 San Vicente del Raspeig, Alicante</p>
                <p>Tlf. +34-666666666</p>
            </section>
            <!-- Section: Text -->

        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            La Taberna del Chino recomienda el consumo responsable
        </div>
        <!-- Copyright -->
        </footer>
        <!-- Footer -->
</html>