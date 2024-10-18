<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="nokora-bold">@yield('title', 'Aplicación CRUD')</title>

    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> 

    <!-- Animate.css para animaciones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <!-- Fuentes GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Nokora:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        /* Resetear márgenes y padding */
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden; /* Evitar scroll horizontal */
        }

        /* Fondo por defecto que combina */
        body {
            background-color: #b47bf6; /* Color claro que combina con los estilos generales */
        }

        .navbar {
            background: linear-gradient(90deg, #2a8eee, #c42cff); /* Degradado de azul a magenta */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand, .nav-link {
            color: #f1f1f1 !important; /* Texto en blanco para contraste */
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #f6d92e !important; /* Color naranja para el hover */
            transition: color 0.3s ease;
        }

        .nav-link {
            transition: transform 0.3s;
        }

        .nav-link:hover {
            transform: scale(1.1); /* Efecto de zoom */
        }

        .container {
            margin-top: 30px;
            animation: fadeIn 1s ease-in-out;
        }

        /* Estilos para las fuentes */
        .bebas-neue {
            font-family: 'Bebas Neue', sans-serif;
        }
        
        .fira-sans {
            font-family: 'Fira Sans Condensed', sans-serif;
        }
        
        .nokora-bold {
            font-family: 'Nokora', sans-serif;
            font-weight: 700; /* Negrita */
        }
        .nokora-mb {
            font-family: 'Nokora', sans-serif;
            font-weight: 600; /* Negrita */
        }
        .josefin-sans {
        font-family: "Josefin Sans", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light animate__animated animate__fadeInDown">
        <div class="container-fluid">
            <a class="navbar-brand josefin-sans" href="{{ route('index') }}">
                <i class="bi bi-house-door-fill"></i> <!-- Ícono de casa -->
                Inicio
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link josefin-sans" href="{{ route('login') }}">
                            <i class="bi bi-person-circle"></i> <!-- Ícono de usuario -->
                            Iniciar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Enlace a Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
