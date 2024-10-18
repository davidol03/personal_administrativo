@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 animated-title text-center">Vacaciones de Médicos</h1>
    <div class="text-center mb-4">
        <a href="{{ route('vacaciones.create') }}" class="btn btn-primary add-btn">
            <i class="bi bi-plus-circle"></i> Agregar Vacación
        </a>
    </div>
    
    <div class="custom-table-container">
        <div class="table-header">
            <div>ID</div>
            <div>Médico</div>
            <div>Fecha Inicio</div>
            <div>Fecha Fin</div>
            <div>Motivo</div>
            <div>Estatus</div>
            <div>Estatus Usuario</div>
            <div>Acciones</div>
        </div>
        <tbody>
            @foreach($vacaciones as $vacacion)
                <div class="table-row animated-row">
                    <div>{{ $vacacion->id_vacacion }}</div>
                    <div>{{ $vacacion->medico->nombre_medico . ' ' . $vacacion->medico->apellido_medico }}</div>
                    <div>{{ \Carbon\Carbon::parse($vacacion->fecha_inicio)->format('d/m/Y') }}</div>
                    <div>{{ \Carbon\Carbon::parse($vacacion->fecha_fin)->format('d/m/Y') }}</div>
                    <div>{{ $vacacion->motivo_vacacion ?? 'Motivo no especificado' }}</div>
                    <div>{{ $vacacion->estatus->nombre_estatus ?? 'Desconocido' }}</div>
                    <div>{{ $vacacion->estatusUsuario->nombre_usuario ?? 'Desconocido' }}</div>
                    <div class="actions">
                        <a href="{{ route('vacaciones.edit', $vacacion->id_vacacion) }}" class="btn btn-sm btn-warning edit-btn">
                            <img src="{{ asset('images/edit.gif') }}" alt="Edit gif" class="action-gif"> Editar
                        </a>
                        <form action="{{ route('vacaciones.destroy', $vacacion->id_vacacion) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger delete-btn">
                                <img src="{{ asset('images/delete.gif') }}" alt="Delete gif" class="action-gif"> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </tbody>
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
        text-align: center;
    }

    /* Tabla personalizada */
    .custom-table-container {
        display: grid;
        grid-template-columns: repeat(8, 1fr); /* Ocho columnas para ID, Médico, Fecha Inicio, Fecha Fin, Motivo, Estatus, Estatus Usuario y Acciones */
        gap: 8px;
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
        gap: 10px; /* Espacio entre los botones de acción */
    }

    .edit-btn, .delete-btn {
        display: flex;
        align-items: center;
        gap: 5px; /* Espacio entre el ícono y el texto */
        padding: 5px 8px; /* Tamaño reducido */
    }

    .action-gif {
        width: 15px; /* Tamaño del ícono */
        height: 15px; /* Tamaño del ícono */
    }
</style>
@endsection
