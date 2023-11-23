<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            overflow: hidden; 
            background: linear-gradient(334deg, #ff0000, #ffffff, #ffc0cb, #000000);
            background-size: 180% 180%;
            animation: gradient-animation 10s ease infinite;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes gradient-animation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .container {
            display: flex; 
            justify-content: space-around; 
            align-items: center;
            flex-wrap: wrap;
            margin-top: 50px; 
        }

        .col-md-6.mb-4{
            text-align: center;
            
        }
        .col-md-6{
            text-align: center;
        }

        .img-fluid {
            max-width: 80%;
            min-width: 30%;
            border-radius: 500px;
            shadow: 500px;
        }
    </style>
</head>

<body>

    <div class="container">
        
        <div class="col-md-6">
                <img src="{{ asset('imagenes/Fondo Los Retales.jpg') }}" alt="Imagen de la aplicación" class="img-fluid">
            </div>
            <div class="col-md-6 mb-3">
                <h1 ><strong>Bienvenido a la aplicación de inventarios</strong></h1><br>
                <p>Este es un sitio creado para gestionar el inventario de Equipos, Impresoras y telefonos que posee la empresa DEPOSITO LOS RETALES</p>
                <a href="{{ route('equipos.index') }}" class="btn btn-dark" style="border-radius:20px">Entrar</a>
            </div>
        
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


