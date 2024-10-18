@extends('layouts.app')

@section('content')
<div class="container">
    @if (isset($user))
        <h1 class="mt-5 text-center animated-title">Hola, {{ $user->user_name }}!</h1>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="alert alert-info text-center animated-fade">
                    <i class="bi bi-hand-thumbs-up"></i> ¡Bienvenido a nuestra aplicación!
                </div>
            </div>
        </div>

        <!-- Mostrar el tipo de usuario con íconos y color -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="alert alert-success text-center animated-fade">
                    <i class="bi bi-person-circle"></i> Tipo de Usuario: 
                    @if ($user->user_tipo == 0)
                        <span class="user-role admin">Admin</span>
                    @elseif ($user->user_tipo == 1)
                        <span class="user-role doctor">Doctor</span>
                    @elseif ($user->user_tipo == 2)
                        <span class="user-role recepcionista">Recepcionista</span>
                    @else
                        <span class="user-role invitado">Invitado</span>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center">
            <i class="bi bi-exclamation-circle"></i> No has iniciado sesión.
        </div>
    @endif
</div>

<!-- Estilos y animaciones personalizados -->
<style>
    body {
        font-family: 'Josefin Sans', sans-serif;
    }
    
    .animated-title {
        animation: fadeInDown 1.5s ease-out;
    }
    
    .animated-fade {
        animation: fadeInUp 1.2s ease-out;
    }

    /* Animaciones de entrada */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Estilos de roles de usuario */
    .user-role {
        font-weight: bold;
        text-transform: uppercase;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .admin {
        background-color: #ff4b5c;
        color: white;
    }

    .doctor {
        background-color: #4caf50;
        color: white;
    }

    .recepcionista {
        background-color: #f9a825;
        color: white;
    }

    .invitado {
        background-color: #8e44ad;
        color: white;
    }

    /* Estilo adicional para los mensajes */
    .alert {
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
    }

    /* Iconos y hover en los mensajes */
    .alert i {
        margin-right: 10px;
    }

    .alert:hover {
        background-color: #e0f7fa;
        transition: background 0.3s;
    }
</style>
@endsection
