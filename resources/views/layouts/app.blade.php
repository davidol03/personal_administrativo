<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplicación CRUD')</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Fuentes GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #b47bf6; /* Color de fondo */
            display: flex;
        }
        .sidebar {
            width: 250px; /* Ancho del menú lateral */
            background: linear-gradient(90deg, #2a8eee, #c42cff);
            min-height: 100vh; /* Altura completa */
            padding: 20px;
            font-family: 'Josefin Sans', sans-serif; /* Aplicar la fuente solo al menú */
        }
        .sidebar a {
            color: #f1f1f1; /* Color de texto */
            text-decoration: none;
            display: flex; /* Usar flex para los iconos y texto */
            align-items: center; /* Centrar verticalmente */
            margin: 15px 0; /* Aumentar espaciado entre elementos */
            padding: 10px;
            border-radius: 5px; /* Bordes redondeados */
            transition: background 0.3;
        }
        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2); /* Efecto hover */
        }
        .content {
            flex: 1; /* Ocupa el espacio restante */
            padding: 20px;
        }
        .sidebar a i {
            margin-right: 8px; /* Espacio entre icono y texto */
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2 class="text-white">Menú</h2>
        <!-- Menús para Admin -->
        @if ($user->user_tipo == '0')
            <a href="{{ route('consultorios.index') }}"><i class="bi bi-hospital"></i> Consultorios</a>
            <a href="{{ route('especialidades.index') }}"><i class="bi bi-star"></i> Especialidades</a>
            <a href="{{ route('medicos.index') }}"><i class="bi bi-person-badge"></i> Médicos</a>
            <a href="{{ route('estatus.index') }}"><i class="bi bi-check-circle"></i> Estatus</a>
            <a href="{{ route('estatususuario.index') }}"><i class="bi bi-person-check"></i> Estatus Usuario</a>
            <a href="{{ route('usuarios.index') }}"><i class="bi bi-person-lines-fill"></i> Personal</a>
            <a href="{{ route('citas.index') }}"><i class="bi bi-calendar-check"></i> Citas</a>
            <a href="{{ route('historialconsultorios.index') }}"><i class="bi bi-clock-history"></i> Historial de Consultorios</a>
            <a href="{{ route('equipomedicos.index') }}"><i class="bi bi-tools"></i> Equipo Médico</a>
            <a href="{{ route('vacaciones.index') }}"><i class="bi bi-calendar-x"></i> Vacaciones Médicos</a>
        <!-- Menús para Doctor -->
        @elseif ($user->user_tipo == '1')
            <a href="{{ route('consultorios.index') }}"><i class="bi bi-hospital"></i> Consultorios</a>
            <a href="{{ route('especialidades.index') }}"><i class="bi bi-star"></i> Especialidades</a>
            <a href="{{ route('medicos.index') }}"><i class="bi bi-person-badge"></i> Médicos</a>
            <a href="{{ route('historialconsultorios.index') }}"><i class="bi bi-clock-history"></i> Historial de Consultorios</a>
        <!-- Menús para Recepcionista -->
        @elseif ($user->user_tipo == '2')
            <a href="{{ route('citas.index') }}"><i class="bi bi-calendar-check"></i> Citas</a>
            <a href="{{ route('vacaciones.index') }}"><i class="bi bi-calendar-x"></i> Vacaciones Médicos</a>
            <a href="{{ route('historialconsultorios.index') }}"><i class="bi bi-clock-history"></i> Historial de Consultorios</a>
        @endif

        <!-- Cerrar Sesión -->
        <form action="{{ route('logout') }}" method="POST" style="margin-top: auto;">
            @csrf
            <button class="btn btn-danger" type="submit"><i class="bi bi-door-closed"></i> Cerrar Sesión</button>
        </form>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <!-- Enlace a Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
