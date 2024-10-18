<?php

namespace App\Http\Controllers;

use App\Models\VacacionesMedico;
use Illuminate\Http\Request;
use App\Models\Estatus;
use App\Models\Medico;
use App\Models\EstatusUsuario;
use Carbon\Carbon;

class VacacionesMedicoController extends Controller
{
    public function index()
    {
        // Obtener todas las vacaciones de los médicos
        $vacaciones = VacacionesMedico::all();
        $user = auth()->guard('usuario')->user();
        return view('vacaciones.indexvacacion', compact('vacaciones', 'user'));
    }

    public function create()
    {
        // Obtener los estatus y estatus de usuario
        $medicos = Medico::all();
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user = auth()->guard('usuario')->user();
        return view('vacaciones.createvacacion', compact('medicos','estatus', 'estatusUsuarios', 'user'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_vacacion' => 'required|integer|unique:vacaciones_medico,id_vacacion', // Verifica que sea único
            'id_medico' => 'required|integer|exists:medico,id_medico', // Verifica que el médico exista
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio', // La fecha de fin debe ser después de la fecha de inicio
            'motivo_vacacion' => 'nullable|string|max:255',
            'id_estatus' => 'required|integer', // Asegúrate de que se pasen los estatus
            'id_estatus_usuario' => 'required|integer',
        ]);

        // Guardar la nueva vacación
        VacacionesMedico::create($validated);

        return redirect()->route('vacaciones.index')->with('success', 'Vacación creada exitosamente.');
    }

    public function edit($id)
    {
        // Encontrar la vacación por su ID
        $vacacion = VacacionesMedico::findOrFail($id);
        $medicos = Medico::all();
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user = auth()->guard('usuario')->user();
        return view('vacaciones.editvacacion', compact('medicos','vacacion', 'estatus', 'estatusUsuarios', 'user'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_medico' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'motivo_vacacion' => 'nullable|string|max:255',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
        ]);

        // Añadir la fecha y hora actual al campo 'fecha_modificacion'
        $validated['fecha_modificacion'] = Carbon::now();

        // Encontrar la vacación por su ID
        $vacacion = VacacionesMedico::findOrFail($id);
        
        // Actualizar los datos validados
        $vacacion->update($validated);

        return redirect()->route('vacaciones.index')->with('success', 'Vacación actualizada exitosamente.');
    }

    public function destroy($id)
    {
        // Encontrar la vacación por su ID
        $vacacion = VacacionesMedico::findOrFail($id);
        $vacacion->delete();

        return redirect()->route('vacaciones.index')->with('success', 'Vacación eliminada exitosamente.');
    }
}
