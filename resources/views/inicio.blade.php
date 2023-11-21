<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        #welcome-container {
            position: relative;
            text-align: center;
            margin-top: 50vh;
            transform: translateY(-50%);
        }

        #entrar-btn {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            font-size: 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            animation: floatAndShake 1s infinite;
        }

        #entrar-btn:hover {
            animation: none; /* Detiene la animación al pasar el mouse */
        }

        @keyframes floatAndShake {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
            75%, 25% {
                transform: translateY(0);
            }
            90%, 10% {
                transform: translateY(-10px);
            }
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#entrar-btn').hover(
                function () {
                    $(this).addClass('animate__animated animate__pulse');
                },
                function () {
                    $(this).removeClass('animate__animated animate__pulse');
                }
            );
        });
    </script>
    <title>Bienvenido al Sistema de Inventario</title>
</head>
<body>
    <div class="container">
        <div class="text-center" id="welcome-container">
            <h1 class="display-4"><strong>Bienvenido al Sistema de Inventario</strong></h1>
            <p class="lead">¡Gracias por visitar nuestro sitio!</p>
            
            <a href="{{ route('equipos.index') }}" class="btn btn-primary btn-lg" id="entrar-btn">Entrar</a>
        </div>
    </div>
</body>
</html>
