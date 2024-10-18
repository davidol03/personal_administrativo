@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 animated-title text-center">Equipos Médicos</h1>
    <div class="text-center mb-4">
        <a href="{{ route('equipomedicos.create') }}" class="btn btn-primary add-btn">
            <i class="bi bi-plus-circle"></i> Agregar Equipo Médico
        </a>
    </div>

    <div class="custom-table-container">
        <div class="table-header">
            <div>ID</div>
            <div>Nombre</div>
            <div>Descripción</div>
            <div>Fecha de Uso</div>
            <div>Estatus</div>
            <div>Estatus Usuario</div>
            <div>Acciones</div>
        </div>

        @foreach($equiposMedicos as $equipoMedico)
            <div class="table-row animated-row">
                <div>{{ $equipoMedico->id_equipomedico }}</div>
                <div>{{ $equipoMedico->nombre_equipo }}</div>
                <div class="long-description">{{ $equipoMedico->descripcion }}</div> <!-- Descripción más larga -->
                <div>{{ \Carbon\Carbon::parse($equipoMedico->fecha_uso)->format('d/m/Y') }}</div>
                <div>{{ $equipoMedico->estatus->nombre_estatus ?? 'Desconocido' }}</div>
                <div>{{ $equipoMedico->estatusUsuario->nombre_usuario ?? 'Desconocido' }}</div>
                <div class="actions">
                    <a href="{{ route('equipomedicos.edit', $equipoMedico->id_equipomedico) }}" class="btn btn-sm btn-warning edit-btn">
                        <img src="{{ asset('images/edit.gif') }}" alt="Edit gif" class="action-gif"> Editar
                    </a>
                    <form action="{{ route('equipomedicos.destroy', $equipoMedico->id_equipomedico) }}" method="POST" style="display:inline-block;">
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

    .custom-table-container {
        display: grid;
        grid-template-columns: repeat(7, 1fr); /* Siete columnas para ID, Nombre, Descripción, Fecha de Uso, Estatus, Estatus Usuario y Acciones */
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

    .animated-row {
        animation: fadeInUp 1.2s ease-out;
    }

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
        gap: 5px; /* Menos espacio entre los botones */
    }

    .edit-btn, .delete-btn {
        display: flex;
        align-items: center;
        padding: 0; /* Sin padding para hacer botones más pequeños */
        width: 72px; /* Ancho fijo */
        height: 30px; /* Alto fijo */
        transition: background 0.3s ease;
    }

    .action-gif {
        width: 16px; /* Tamaño del gif ajustado */
        height: 16px; /* Tamaño del gif ajustado */
    }

    .long-description {
        max-width: 150px; /* Ajusta el ancho máximo de la descripción */
        white-space: normal; /* Permitir que el texto envuelva */
        overflow: hidden;
        text-overflow: ellipsis; /* Agregar puntos suspensivos si el texto es muy largo */
    }
</style>
@endsection
