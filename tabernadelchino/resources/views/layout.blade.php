<html>
    <head>
        <title>@yield('title')</title>
        <script src="{{ asset('js/bootstrap.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @section('menu')
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">Brand</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link">Profile</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Messages</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Inbox</a>
                                <a href="#" class="dropdown-item">Sent</a>
                                <a href="#" class="dropdown-item">Drafts</a>
                            </div>
                        </div>
                    </div>
                    <form class="d-flex">
                        <div class="input-group">                    
                            <input type="text" class="form-control" placeholder="Search">
                            <button type="button" class="btn btn-secondary"><i class="bi-search"></i></button>
                        </div>
                    </form>
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link">Login</a>
                    </div>
                </div>
            </div>
        </nav>

        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>