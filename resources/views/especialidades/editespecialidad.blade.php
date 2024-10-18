@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center animated-title">Editar Especialidad</h1>

    <form action="{{ route('especialidades.update', $especialidad->id_especialidad) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre_especialidad">Nombre de especialidad</label>
            <input type="text" class="form-control" name="nombre_especialidad" id="nombre_especialidad" value="{{ $especialidad->nombre_especialidad }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" required>{{ $especialidad->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="id_estatus">Estatus</label>
            <select class="form-control" name="id_estatus" id="id_estatus" required>
                @foreach($estatus as $estatusItem)
                    <option value="{{ $estatusItem->id_estatus }}" {{ $especialidad->id_estatus == $estatusItem->id_estatus ? 'selected' : '' }}>
                        {{ $estatusItem->nombre_estatus }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_estatus_usuario">Estatus Usuario</label>
            <select class="form-control" name="id_estatus_usuario" id="id_estatus_usuario" required>
                @foreach($estatusUsuarios as $estatusUsuario)
                    <option value="{{ $estatusUsuario->id_estatus_usuario }}" {{ $especialidad->id_estatus_usuario == $estatusUsuario->id_estatus_usuario ? 'selected' : '' }}>
                        {{ $estatusUsuario->nombre_usuario }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Especialidad</button>
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
