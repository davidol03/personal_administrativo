@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center animated-title">Crear Médico</h1>

    <form action="{{ route('medicos.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="id_medico">ID Médico</label>
            <input type="number" name="id_medico" id="id_medico" class="form-control custom-input" required>
        </div>

        <div class="form-group mt-3">
            <label for="nombre_medico">Nombre</label>
            <input type="text" name="nombre_medico" id="nombre_medico" class="form-control custom-input" required>
        </div>

        <div class="form-group mt-3">
            <label for="apellido_medico">Apellido</label>
            <input type="text" name="apellido_medico" id="apellido_medico" class="form-control custom-input" required>
        </div>

        <div class="form-group mt-3">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control custom-input">
        </div>

        <div class="form-group mt-3">
            <label for="email_medico">Email</label>
            <input type="email" name="email_medico" id="email_medico" class="form-control custom-input">
        </div>

        <div class="form-group mt-3">
            <label for="id_especialidad">Especialidad</label>
            <select name="id_especialidad" id="id_especialidad" class="form-control custom-select" required>
                @foreach($especialidades as $especialidad)
                    <option value="{{ $especialidad->id_especialidad }}">{{ $especialidad->nombre_especialidad }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="id_consultorio">Consultorio</label>
            <select name="id_consultorio" id="id_consultorio" class="form-control custom-select" required>
                @foreach($consultorios as $consultorio)
                    <option value="{{ $consultorio->id_consultorio }}">{{ $consultorio->ubicacion_consultorio }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="id_estatus">Estatus</label>
            <select name="id_estatus" id="id_estatus" class="form-control custom-select" required>
                @foreach($estatus as $estatusItem)
                    <option value="{{ $estatusItem->id_estatus }}">{{ $estatusItem->nombre_estatus }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="id_estatus_usuario">Estatus Usuario</label>
            <select name="id_estatus_usuario" id="id_estatus_usuario" class="form-control custom-select" required>
                @foreach($estatusUsuarios as $estatusUsuario)
                    <option value="{{ $estatusUsuario->id_estatus_usuario }}">{{ $estatusUsuario->nombre_usuario }}</option>
                @endforeach
            </select>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary submit-btn">Crear Médico</button>
        </div>
    </form>
</div>

<!-- Estilos personalizados -->
<style>
    .container {
        font-family: 'Josefin Sans', sans-serif;
        background-color: #f7f7f7;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: auto;
    }

    .animated-title {
        animation: fadeInDown 1.5s ease-out;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .custom-input, .custom-select {
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ddd;
        transition: all 0.3s ease;
    }

    .custom-input:focus, .custom-select:focus {
        border-color: #2a8eee;
        box-shadow: 0 0 10px rgba(42, 142, 238, 0.3);
    }

    .submit-btn {
        background: linear-gradient(90deg, #2a8eee, #c42cff);
        border: none;
        padding: 12px 30px;
        font-size: 18px;
        font-weight: bold;
        color: #fff;
        transition: background 0.3s ease;
    }

    .submit-btn:hover {
        background: linear-gradient(90deg, #c42cff, #2a8eee);
    }

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
</style>
@endsection
