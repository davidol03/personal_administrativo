<?php

use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\HistorialConsultoriosController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EquipoMedicoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\VacacionesMedicoController;
use App\Http\Controllers\EstatusController;
use App\Http\Controllers\EstatusUsuarioController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PermisoTablaController; // Controlador para permisos
use App\Http\Controllers\RegistrarseController;
use App\Http\Controllers\Auth\LoginController;

use Illuminate\Support\Facades\Route;

// Ruta principal que redirige a index.blade.php
Route::get('/', function () {
    return view('index'); // Vista principal
})->name('index');

// Página principal después de iniciar sesión
// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas protegidas para los usuarios logueados y que tienen permisos de tablas activas
Route::middleware(['auth:usuario'])->group(function () {
    
    // Ruta para el menú principal
    Route::get('/menu', [MenuController::class, 'inicio'])->name('menu');
    
    // Rutas para el CRUD de Consultorio (solo usuarios con permisos)
    Route::get('/consultorios', [ConsultorioController::class, 'index'])->name('consultorios.index');
    Route::get('/consultorio/create', [ConsultorioController::class, 'create'])->name('consultorios.create');
    Route::post('/consultorio', [ConsultorioController::class, 'store'])->name('consultorios.store');
    Route::get('/consultorio/{id}/edit', [ConsultorioController::class, 'edit'])->name('consultorios.edit');
    Route::put('/consultorio/{id}', [ConsultorioController::class, 'update'])->name('consultorios.update');
    Route::delete('/consultorio/{id}', [ConsultorioController::class, 'destroy'])->name('consultorios.destroy');

    // Rutas para el CRUD de Historial Consultorios (solo usuarios con permisos)
    Route::get('/historialconsultorios', [HistorialConsultoriosController::class, 'index'])->name('historialconsultorios.index');
    Route::get('/historialconsultorio/create', [HistorialConsultoriosController::class, 'create'])->name('historialconsultorios.create');
    Route::post('/historialconsultorio', [HistorialConsultoriosController::class, 'store'])->name('historialconsultorios.store');
    Route::get('/historialconsultorio/{id}/edit', [HistorialConsultoriosController::class, 'edit'])->name('historialconsultorios.edit');
    Route::put('/historialconsultorio/{id}', [HistorialConsultoriosController::class, 'update'])->name('historialconsultorios.update');
    Route::delete('/historialconsultorio/{id}', [HistorialConsultoriosController::class, 'destroy'])->name('historialconsultorios.destroy');


    // Rutas CRUD de Especialidad
    Route::get('/especialidades', [EspecialidadController::class, 'index'])->name('especialidades.index');
    Route::get('/especialidad/create', [EspecialidadController::class, 'create'])->name('especialidades.create');
    Route::post('/especialidad', [EspecialidadController::class, 'store'])->name('especialidades.store');
    Route::get('/especialidad/{id}/edit', [EspecialidadController::class, 'edit'])->name('especialidades.edit');
    Route::put('/especialidad/{id}', [EspecialidadController::class, 'update'])->name('especialidades.update');
    Route::delete('/especialidad/{id}', [EspecialidadController::class, 'destroy'])->name('especialidades.destroy');

    // Rutas CRUD de Médicos
    Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');
    Route::get('/medico/create', [MedicoController::class, 'create'])->name('medicos.create');
    Route::post('/medico', [MedicoController::class, 'store'])->name('medicos.store');
    Route::get('/medico/{id}/edit', [MedicoController::class, 'edit'])->name('medicos.edit');
    Route::put('/medico/{id}', [MedicoController::class, 'update'])->name('medicos.update');
    Route::delete('/medico/{id}', [MedicoController::class, 'destroy'])->name('medicos.destroy');
    
    // Rutas CRUD de Equipo de Médicos
    Route::get('/equipomedicos', [EquipoMedicoController::class, 'index'])->name('equipomedicos.index');
    Route::get('/equipomedico/create', [EquipoMedicoController::class, 'create'])->name('equipomedicos.create');
    Route::post('/equipomedico', [EquipoMedicoController::class, 'store'])->name('equipomedicos.store');
    Route::get('/equipomedico/{id}/edit', [EquipoMedicoController::class, 'edit'])->name('equipomedicos.edit');
    Route::put('/equipomedico/{id}', [EquipoMedicoController::class, 'update'])->name('equipomedicos.update');
    Route::delete('/equipomedico/{id}', [EquipoMedicoController::class, 'destroy'])->name('equipomedicos.destroy');

    // Rutas CRUD de Citas
    Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');
    Route::get('/cita/create', [CitaController::class, 'create'])->name('citas.create');
    Route::post('/cita', [CitaController::class, 'store'])->name('citas.store');
    Route::get('/cita/{id}/edit', [CitaController::class, 'edit'])->name('citas.edit');
    Route::put('/cita/{id}', [CitaController::class, 'update'])->name('citas.update');
    Route::delete('/cita/{id}', [CitaController::class, 'destroy'])->name('citas.destroy');

    
    // Rutas CRUD de vacaciones
    Route::get('/vacaciones', [VacacionesMedicoController::class, 'index'])->name('vacaciones.index');
    Route::get('/vacion/create', [VacacionesMedicoController::class, 'create'])->name('vacaciones.create');
    Route::post('/vacion', [VacacionesMedicoController::class, 'store'])->name('vacaciones.store');
    Route::get('/vacion/{id}/edit', [VacacionesMedicoController::class, 'edit'])->name('vacaciones.edit');
    Route::put('/vacion/{id}', [VacacionesMedicoController::class, 'update'])->name('vacaciones.update');
    Route::delete('/vacion/{id}', [VacacionesMedicoController::class, 'destroy'])->name('vacaciones.destroy');

    //Rutas Crud de Estatus
    Route::get('/estatus', [EstatusController::class, 'index'])->name('estatus.index');
    Route::get('/estatus/create', [EstatusController::class, 'create'])->name('estatus.create');
    Route::post('/estatus', [EstatusController::class, 'store'])->name('estatus.store');
    Route::get('/estatus/{id}/edit', [EstatusController::class, 'edit'])->name('estatus.edit');
    Route::put('/estatus/{id}', [EstatusController::class, 'update'])->name('estatus.update');
    Route::delete('/estatus/{id}', [EstatusController::class, 'destroy'])->name('estatus.destroy');

    //Rutas Crud de estatus usuario
    Route::get('/estatususuario', [EstatusUsuarioController::class, 'index'])->name('estatususuario.index');
    Route::get('/estatususuario/create', [EstatusUsuarioController::class, 'create'])->name('estatususuario.create');
    Route::post('/estatususuario', [EstatusUsuarioController::class, 'store'])->name('estatususuario.store');
    Route::get('/estatususuario/{id}/edit', [EstatusUsuarioController::class, 'edit'])->name('estatususuario.edit');
    Route::put('/estatususuario/{id}', [EstatusUsuarioController::class, 'update'])->name('estatususuario.update');
    Route::delete('/estatususuario/{id}', [EstatusUsuarioController::class, 'destroy'])->name('estatususuario.destroy');


    //Crud Usuarios
    Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('registrarse'); // O puedes cambiar a `usuarios.create`
    Route::post('usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

    Route::get('/usuarios/registrarse', [RegistrarseController::class, 'registrarse'])->name('registrarse');
    Route::post('/usuarios/registrar', [RegistrarseController::class, 'registrar'])->name('registrar');
});

// Rutas de autenticación
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
