<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;
use App\Models\Estatus;
use App\Models\EstatusUsuario;
use Carbon\Carbon; // Importar la clase Carbon


class EspecialidadController extends Controller
{

    public function index()
    {
        $especialidades = Especialidad::all();
        $user =auth()->guard('usuario')->user();
        return view('especialidades.indexespecialidad', compact('especialidades','user'));
    }

    public function create()
    {
        // Obtener los estatus y estatus de usuario
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user =auth()->guard('usuario')->user();
        return view('especialidades.createespecialidad', compact('estatus', 'estatusUsuarios','user'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_especialidad' => 'required|integer|unique:especialidad,id_especialidad',
            'nombre_especialidad' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:100',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
        ]);

        // Guardar la nueva especialidad
        Especialidad::create($validated);

        return redirect()->route('especialidades.index')->with('success', 'Especialidad creada exitosamente.');
    }

    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user =auth()->guard('usuario')->user();
        return view('especialidades.editespecialidad', compact('especialidad','estatus', 'estatusUsuarios','user'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre_especialidad' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:100',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
        ]);

        // Añadir la fecha y hora actual al campo 'fecha_modificacion'
        $validated['fecha_modificacion'] = Carbon::now(); // Establecer la fecha actual
        // Encontrar la especialidad por su id
        $especialidad = Especialidad::findOrFail($id);
    
        // Actualizar los datos validados
        $especialidad->update($validated);
    
        // Actualizar el campo de fecha de modificación manualmente
        $especialidad->fecha_modificacion = now(); // Registrar la fecha actual
        $especialidad->save();
    
        return redirect()->route('especialidades.index')->with('success', 'Especialidad actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->delete();

        return redirect()->route('especialidades.index')->with('success', 'Especialidad eliminada exitosamente.');
    }
}
