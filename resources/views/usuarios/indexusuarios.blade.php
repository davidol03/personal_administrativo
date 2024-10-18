@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 animated-title text-center">Personal Administrativo</h1>

    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="text-center mb-4">
        <a href="{{ route('registrarse') }}" class="btn btn-primary add-btn">
            <i class="bi bi-plus-circle"></i> Registrar Nuevo Usuario
        </a>
    </div>

    <div class="custom-table-container">
        <div class="table-header">
            <div>ID</div>
            <div>Nombre de Usuario</div>
            <div>Tipo de Usuario</div>
            <div>Acciones</div>
        </div>

        @foreach ($usuarios as $usuario)
            <div class="table-row animated-row">
                <div>{{ $usuario->id_usuario }}</div>
                <div>{{ $usuario->user_name }}</div>
                <div>{{ $usuario->user_tipo == '0' ? 'Admin' : ($usuario->user_tipo == '1' ? 'Medico' : ($usuario->user_tipo == '2' ? 'Recepcionista' : 'Invitado')) }}</div>
                <div class="actions">
                    <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn btn-sm btn-warning edit-btn">
                        <img src="{{ asset('images/edit.gif') }}" alt="Edit gif" class="action-gif"> Editar
                    </a>
                    <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" style="display:inline-block;">
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
        grid-template-columns: repeat(4, 1fr); /* Cuatro columnas para ID, Nombre, Tipo y Acciones */
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
