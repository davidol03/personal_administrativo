@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 animated-title text-center">Médicos</h1>
    <div class="text-center mb-4">
        <a href="{{ route('medicos.create') }}" class="btn btn-primary add-btn">
            <i class="bi bi-plus-circle"></i> Agregar Médico
        </a>
    </div>

    <div class="custom-table-container">
        <div class="table-header">
            <div style="flex: 1;">ID</div>
            <div style="flex: 2;">Nombre Completo</div> <!-- Nueva columna para nombre completo -->
            <div style="flex: 2;">Teléfono</div>
            <div style="flex: 3;">Email</div>
            <div style="flex: 2;">Especialidad</div>
            <div style="flex: 2;">Consultorio</div>
            <div style="flex: 2;">Estatus</div>
            <div style="flex: 2;">Estatus Usuario</div>
            <div style="flex: 2;">Acciones</div>
        </div>

        @foreach($medicos as $medico)
            <div class="table-row animated-row">
                <div style="flex: 1;">{{ $medico->id_medico }}</div>
                <div style="flex: 2;">{{ $medico->nombre_medico }} {{ $medico->apellido_medico }}</div> <!-- Concatenando nombre y apellido -->
                <div style="flex: 2;">{{ $medico->telefono }}</div>
                <div style="flex: 3; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    {{ $medico->email_medico }}
                </div>
                <div style="flex: 2;">{{ $medico->especialidad->nombre_especialidad ?? 'No asignada' }}</div>
                <div style="flex: 2;">{{ $medico->consultorio->ubicacion_consultorio ?? 'No asignado' }}</div>
                <div style="flex: 2;">{{ $medico->estatus->nombre_estatus ?? 'Desconocido' }}</div>
                <div style="flex: 2;">{{ $medico->estatusUsuario->nombre_usuario ?? 'Desconocido' }}</div>
                <div class="actions" style="flex: 2;">
                    <a href="{{ route('medicos.edit', $medico->id_medico) }}" class="btn btn-sm btn-warning edit-btn">
                        <img src="{{ asset('images/edit.gif') }}" alt="Edit gif" class="action-gif"> Editar
                    </a>

                    <form action="{{ route('medicos.destroy', $medico->id_medico) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger delete-btn">
                            <img src="{{ asset('images/delete.gif') }}" alt="Delete gif" class="action-gif"> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Estilos personalizados y animaciones -->
<style>
    /* Estilos para el contenedor */
    .container {
        font-family: 'Josefin Sans', sans-serif;
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .animated-title {
        animation: fadeInDown 1.5s ease-out;
    }

    /* Tabla personalizada */
    .custom-table-container {
        display: grid;
        grid-template-columns: 1fr 2fr 2fr 3fr 2fr 2fr 2fr 2fr 2fr; /* Ajustamos las columnas correctamente */
        gap: 10px;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
    }

    .table-header, .table-row {
        display: contents;
    }

    .table-header > div, .table-row > div {
        background-color: #fff;
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        transition: background 0.3s ease;
    }

    .table-header > div {
        background-color: #2a8eee;
        color: #fff;
        font-weight: bold;
    }

    .table-row > div:hover {
        background-color: #e0f7fa;
    }

    /* Animaciones */
    .animated-row {
        animation: fadeInUp 1.2s ease-out;
    }

    /* Estilos de botones */
    .add-btn {
        background: linear-gradient(90deg, #2a8eee, #c42cff);
        border: none;
        padding: 10px 20px;
        font-weight: bold;
        transition: background 0.3s ease;
    }

    .add-btn:hover {
        background: linear-gradient(90deg, #c42cff, #2a8eee);
    }

    .actions {
        display: flex;
        justify-content: space-around;
        gap: 15px;
    }

    .edit-btn, .delete-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        transition: background 0.3s ease;
    }

    .action-gif {
        width: 20px;
        height: 20px;
    }
</style>
@endsection
