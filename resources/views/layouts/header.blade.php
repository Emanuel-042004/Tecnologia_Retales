<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Gestion Tecnologica</title>
</head>

<body>
    <div class="container">
        @yield('content')
        <header class="fixed-top"> <!-- Encabezado fijo -->
            <nav class="navbar navbar-expand-lg navbar-ligth bg-white">
                <div class="container-fluid shadow">
                    <a class="navbar-brand " href="#"><img src="{{ asset('imagenes/Logo-dimensiones.png') }}"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="">Inicio</a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('equipos.index') }}">Equipos </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('impresoras.index') }}">Impresoras </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                href="{{ route('celulares.index') }}">Celulares</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                href="{{ route('telefonos.index') }}">Telefonos </a>
                            </li>
                           
                            
                        </ul>
                        <form class="search-form" method="GET" action="{{ route('search.index') }}">
                            <input class="search-input" type="search" name="search" placeholder="Search"
                                aria-label="Search">
                            <button type="submit" class="search-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>