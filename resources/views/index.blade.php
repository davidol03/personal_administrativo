@extends('layouts.app3')

@section('content')
<style>
    /* Reset de márgenes y paddings globales */
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        overflow-x: hidden;
        background: linear-gradient(90deg, #2a8eee, #c42cff); /* Degradado de azul a magenta */
    }

    /* Asegura que las secciones cubran todo el ancho de la pantalla */
    section {
        width: 100vw; /* Cubre todo el viewport */
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    /* Ajuste de márgenes y paddings para elementos hijos */
    .content {
        margin: 0;
        padding: 0;
    }

    /* Efecto de elevación para las tarjetas */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transiciones suaves */
    }

    .card:hover {
        transform: translateY(-10px); /* Elevar la tarjeta */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Sombra más pronunciada */
    }

    /* Estilos para la imagen en "Acerca de Nosotros" */
    .about-image {
        max-width: 300px; /* Ajusta el tamaño de la imagen */
        border-radius: 15px; /* Bordes redondeados */
        margin: 20px; /* Espaciado */
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
    .josefin-sans {
        font-family: "Josefin Sans", sans-serif;
        font-optical-sizing: auto;
        font-weight: 700;
        font-style: normal;
    }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Nokora:wght@100;300;400;700;900&display=swap" rel="stylesheet">

<!-- Sección 1: Bienvenida -->
<section class="container-fluid" style="position: relative; height: 100vh; background-image: url('{{ asset('images/medicos2.gif') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="content d-flex flex-column justify-content-center align-items-start text-white" style="position: relative; z-index: 1; height: 100%; padding-left: 20px;">
        <h1 class="nokora-bold animate__animated animate__fadeIn" style="font-size: 4rem;">¡Bienvenido al personal administrativo del hospital!</h1>
        <p class="lead fira-sans animate__animated animate__fadeIn" style="animation-delay: 0.5s; font-size: 1.5rem;">En este apartado obervaras nuestros servicios, si es que deseas hacer algun registro inicia sesión.</p>
    </div>
</section>

<!-- Sección 2: Servicios -->
<section class="container-fluid" style="position: relative; height: 100vh; background-image: url('{{ asset('images/fondo-seccion2.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.6);"></div>
    <div class="content d-flex flex-column justify-content-center align-items-center" style="position: relative; z-index: 1; height: 100%;">
        <div class="text-center">
            <div class="row">
                <!-- Tarjeta 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card animate__animated animate__fadeInUp" style="border-radius: 15px;">
                        <img src="{{ asset('images/medicos1.gif') }}" class="card-img-top" alt="Gestión Administrativa" style="height: 350px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title nokora-bold">Gestión Administrativa</h5>
                            <p class="card-text fira-sans">Nos encargamos de la organización y supervisión de todos los procesos administrativos del hospital.</p>
                        </div>
                    </div>
                </div>
                <!-- Tarjeta 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card animate__animated animate__fadeInUp" style="border-radius: 15px;">
                        <img src="{{ asset('images/medicos3.gif') }}" class="card-img-top" alt="Atención al Paciente" style="height: 350px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title nokora-bold">Atención al Paciente</h5>
                            <p class="card-text fira-sans">Proporcionamos soporte y asistencia a los pacientes para asegurar su bienestar y satisfacción.</p>
                        </div>
                    </div>
                </div>
                <!-- Tarjeta 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card animate__animated animate__fadeInUp" style="border-radius: 15px;">
                        <img src="{{ asset('images/medicos4.gif') }}" class="card-img-top" alt="Planificación de Recursos" style="height: 350px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title nokora-bold">Planificación de Recursos</h5>
                            <p class="card-text fira-sans">Planificamos y gestionamos los recursos necesarios para el funcionamiento eficiente del hospital.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección 3: Acerca de Nosotros -->
<section class="container-fluid" style="position: relative; height: 100vh; background-image: url('{{ asset('images/fondo-seccion3.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="content d-flex flex-column justify-content-center align-items-center text-white" style="position: relative; z-index: 1; height: 100%;">
    <h1 class="nokora-bold animate__animated animate__fadeIn" style="font-size: 4rem;">ACERCA DE NOSOTROS</h1>
        <p class="lead fira-sans animate__animated animate__fadeIn" style="animation-delay: 0.5s; max-width: 600px;">
           <br>Somos un equipo comprometido con la salud y el bienestar de nuestros pacientes. Nuestro personal administrativo se asegura de que cada proceso sea eficiente y de calidad. Con años de experiencia, trabajamos incansablemente para mejorar cada aspecto del servicio hospitalario.
        </p>
        <img src="{{ asset('images/medicos5.gif') }}" alt="Nosotros" class="about-image animate__animated animate__fadeIn" style="animation-delay: 1s;">
    </div>
</section>
@endsection
