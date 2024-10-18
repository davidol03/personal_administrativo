@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center animated-title">Editar Vacación de Médico</h1>

    <form action="{{ route('vacaciones.update', $vacacion->id_vacacion) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_medico">Médico</label>
            <select name="id_medico" id="id_medico" class="form-control" required>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id_medico }}" {{ $vacacion->id_medico == $medico->id_medico ? 'selected' : '' }}>
                        {{ $medico->nombre_medico }} {{ $medico->apellido_medico }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_inicio">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ $vacacion->fecha_inicio }}" required>
        </div>

        <div class="form-group">
            <label for="fecha_fin">Fecha de Fin</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ $vacacion->fecha_fin }}" required>
        </div>

        <div class="form-group">
            <label for="motivo_vacacion">Motivo de Vacación</label>
            <textarea name="motivo_vacacion" id="motivo_vacacion" class="form-control" rows="3">{{ $vacacion->motivo_vacacion }}</textarea>
        </div>

        <div class="form-group">
            <label for="id_estatus">Estatus</label>
            <select name="id_estatus" id="id_estatus" class="form-control" required>
                @foreach($estatus as $estatusItem)
                    <option value="{{ $estatusItem->id_estatus }}" {{ $vacacion->id_estatus == $estatusItem->id_estatus ? 'selected' : '' }}>
                        {{ $estatusItem->nombre_estatus }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_estatus_usuario">Estatus Usuario</label>
            <select name="id_estatus_usuario" id="id_estatus_usuario" class="form-control" required>
                @foreach($estatusUsuarios as $estatusUsuario)
                    <option value="{{ $estatusUsuario->id_estatus_usuario }}" {{ $vacacion->id_estatus_usuario == $estatusUsuario->id_estatus_usuario ? 'selected' : '' }}>
                        {{ $estatusUsuario->nombre_usuario }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3 submit-btn">Actualizar Vacación</button>
    </form>
</div>
@endsection

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

    .custom-input {
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ddd;
        transition: all 0.3s ease;
    }

    .custom-input:focus {
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
