<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Medico;
use App\Models\Estatus;
use App\Models\EstatusUsuario;
use Illuminate\Http\Request;
use Carbon\Carbon; // Importar la clase Carbon

class CitaController extends Controller
{
    public function index()
    {
        // Obtener todas las citas
        $citas = Cita::all();
        $user =auth()->guard('usuario')->user();
        return view('citas.indexcita', compact('citas','user'));
    }

    public function create()
    {
        // Obtener médicos, consultorios, estatus y estatus de usuario
        $medicos = Medico::all();
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user =auth()->guard('usuario')->user();

        // Pasar los datos a la vista
        return view('citas.createcita', compact('medicos', 'estatus', 'estatusUsuarios','user'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_cita' => 'required|integer|unique:cita,id_cita',
            'fecha_hora_cita' => 'required|date',
            'id_medico' => 'required|integer',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
            'id_paciente' => 'nullable|integer', // Asegúrate de que este campo es opcional si no siempre se llena
        ]);

        // Guardar la nueva cita
        Cita::create($validated);

        return redirect()->route('citas.index')->with('success', 'Cita creada exitosamente.');
    }

    public function edit($id)
    {
        // Buscar la cita por su id
        $cita = Cita::findOrFail($id);

        // Obtener médicos, consultorios, estatus y estatus de usuario
        $medicos = Medico::all();
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user =auth()->guard('usuario')->user();
        return view('citas.editcita', compact('cita', 'medicos', 'estatus', 'estatusUsuarios','user'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'fecha_hora_cita' => 'required|date',
            'id_medico' => 'required|integer',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
            'id_paciente' => 'nullable|integer', // Asegúrate de que este campo es opcional si no siempre se llena
        ]);

        // Añadir la fecha y hora actual al campo 'fecha_modificacion'
        $validated['fecha_modificacion'] = Carbon::now(); // Establecer la fecha actual

        // Encontrar la cita por su id y actualizarla
        $cita = Cita::findOrFail($id);
        $cita->update($validated);

        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente.');
    }

    public function destroy($id)
    {
        // Buscar la cita por su id y eliminarla
        $cita = Cita::findOrFail($id);
        $cita->delete();

        return redirect()->route('citas.index')->with('success', 'Cita eliminada exitosamente.');
    }
}
