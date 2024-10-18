@extends('layouts.app2')

@section('title', 'Iniciar sesión')

@section('content')
<style>
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
    .josefin-sans {
        font-family: "Josefin Sans", sans-serif;
        font-optical-sizing: auto;
        font-weight: 700;
        font-style: normal;
    }
    /* Fondo de la página completa */
    body {
        background-image: url('{{ asset('images/fondomedicos.jpg') }}');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Estilo de la tarjeta (card) con opacidad */
    .login-card {
        background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco con opacidad */
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Sombra ligera */
        width: 100%;
        max-width: 500px; /* Para que no sea demasiado ancha */
    }

    /* Estilo para centrar el contenido */
    .container-center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Estilo del botón de volver al inicio */
    .btn-back {
        margin-top: 15px;
        display: block;
        text-align: center;
        width: 100%;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #5a6268;
    }

</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Nokora:wght@100;300;400;700;900&display=swap" rel="stylesheet">

<div class="container-center">
    <div class="login-card">
        <h2 class="text-center nokora-bold mb-4">Iniciar sesión</h2>
        
        <form method="POST" action="{{ route('login') }}"> 
            @csrf
            <div class="form-group mb-3">
                <label for="user_name" class="fira-sans">Nombre de Usuario</label>
                <input type="text" class="form-control" id="user_name" name="user_name" required autocomplete="username">
            </div>

            <div class="form-group mb-3">
                <label for="user_pass" class="fira-sans">Contraseña</label>
                <input type="password" class="form-control" id="user_pass" name="user_pass" required autocomplete="current-password">
            </div>

            <button type="submit" class="btn btn-primary w-100 nokora-mb">Iniciar sesión</button>
        </form>

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Botón de volver al inicio -->
        <a href="{{ route('index') }}" class="btn-back nokora-mb">Volver al inicio</a>

    </div>
</div>
@endsection
