@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center animated-title">Editar Equipo Médico</h1>

    <form action="{{ route('equipomedicos.update', $equipoMedico->id_equipomedico) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre_equipomedico">Nombre de equipo médico</label>
            <input type="text" class="form-control custom-input" name="nombre_equipo" id="nombre_equipomedico" value="{{ $equipoMedico->nombre_equipo }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control custom-input" name="descripcion" id="descripcion" required>{{ $equipoMedico->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="fecha_uso">Fecha de Uso</label>
            <input type="date" class="form-control custom-input" name="fecha_uso" id="fecha_uso" value="{{ \Carbon\Carbon::parse($equipoMedico->fecha_uso)->format('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="id_estatus">Estatus</label>
            <select class="form-control custom-input" name="id_estatus" id="id_estatus" required>
                @foreach($estatus as $estatusItem)
                    <option value="{{ $estatusItem->id_estatus }}" {{ $equipoMedico->id_estatus == $estatusItem->id_estatus ? 'selected' : '' }}>
                        {{ $estatusItem->nombre_estatus }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_estatus_usuario">Estatus Usuario</label>
            <select class="form-control custom-input" name="id_estatus_usuario" id="id_estatus_usuario" required>
                @foreach($estatusUsuarios as $estatusUsuario)
                    <option value="{{ $estatusUsuario->id_estatus_usuario }}" {{ $equipoMedico->id_estatus_usuario == $estatusUsuario->id_estatus_usuario ? 'selected' : '' }}>
                        {{ $estatusUsuario->nombre_usuario }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary submit-btn">Actualizar Equipo Médico</button>
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
@endsection
