<?php

namespace App\Http\Controllers;

use App\Models\HistorialConsultorios;
use App\Models\Consultorio;
use App\Models\Medico;
use App\Models\Estatus;
use App\Models\EstatusUsuario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HistorialConsultoriosController extends Controller
{
    public function index()
    {
        $historialConsultorios = HistorialConsultorios::all();
        $user = auth()->guard('usuario')->user();
        return view('historialconsultorios.indexhistorialconsultorio', compact('historialConsultorios', 'user'));
    }

    public function create()
    {
        $consultorios = Consultorio::all();
        $medicos = Medico::all();
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user = auth()->guard('usuario')->user();
        return view('historialconsultorios.createhistorialconsultorio', compact('consultorios', 'medicos', 'estatus', 'estatusUsuarios', 'user'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_historial' => 'required|integer|unique:historial_consultorio,id_historial',
            'id_consultorio' => 'required|integer',
            'id_medico' => 'required|integer',
            'fecha_uso' => 'required|date',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
        ]);

        // Guardar el nuevo historial de consultorio
        HistorialConsultorios::create($validated);

        return redirect()->route('historialconsultorios.index')->with('success', 'Historial de consultorio creado exitosamente.');
    }

    public function edit($id)
    {
        $historialConsultorio = HistorialConsultorios::findOrFail($id); // Aquí obtienes el historial
        $consultorios = Consultorio::all();
        $medicos = Medico::all();
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user = auth()->guard('usuario')->user();

        return view('historialconsultorios.edithistorialconsultorio', compact('historialConsultorio', 'consultorios', 'medicos', 'estatus', 'estatusUsuarios', 'user'));
    }


    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_consultorio' => 'required|integer',
            'id_medico' => 'required|integer',
            'fecha_uso' => 'required|date',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
        ]);

        // Establecer la fecha de modificación
        $validated['fecha_modificacion'] = Carbon::now();

        // Encontrar el historial por su id
        $historialConsultorio = HistorialConsultorios::findOrFail($id);

        // Actualizar los datos validados
        $historialConsultorio->update($validated);

        return redirect()->route('historialconsultorios.index')->with('success', 'Historial de consultorio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $historialConsultorio = HistorialConsultorios::findOrFail($id);
        $historialConsultorio->delete();

        return redirect()->route('historialconsultorios.index')->with('success', 'Historial de consultorio eliminado exitosamente.');
    }
}
