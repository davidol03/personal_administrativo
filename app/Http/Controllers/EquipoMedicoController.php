<?php

namespace App\Http\Controllers;

use App\Models\EquipoMedico;
use Illuminate\Http\Request;
use App\Models\Estatus;
use App\Models\EstatusUsuario;
use Carbon\Carbon; // Importar la clase Carbon

class EquipoMedicoController extends Controller
{
    public function index()
    {
        $equiposMedicos = EquipoMedico::all();
        $user = auth()->guard('usuario')->user();
        return view('equipomedicos.indexequipomedico', compact('equiposMedicos', 'user'));
    }

    public function create()
    {
        // Obtener los estatus y estatus de usuario
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user = auth()->guard('usuario')->user();
        return view('equipomedicos.createequipomedico', compact('estatus', 'estatusUsuarios', 'user'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_equipomedico' => 'required|integer|unique:equipo_medico,id_equipomedico',
            'nombre_equipo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'fecha_uso' => 'required|date',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
        ]);

        // Guardar el nuevo equipo médico
        EquipoMedico::create($validated);

        return redirect()->route('equipomedicos.index')->with('success', 'Equipo médico creado exitosamente.');
    }

    public function edit($id)
    {
        $equipoMedico = EquipoMedico::findOrFail($id);
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user = auth()->guard('usuario')->user();
        return view('equipomedicos.editequipomedico', compact('equipoMedico', 'estatus', 'estatusUsuarios', 'user'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre_equipo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'fecha_uso' => 'required|date',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
        ]);
        


        // Añadir la fecha y hora actual al campo 'fecha_modificacion'
        $validated['fecha_modificacion'] = Carbon::now(); // Establecer la fecha actual
        // Encontrar el equipo médico por su id
        $equipoMedico = EquipoMedico::findOrFail($id);
    
        // Actualizar los datos validados
        $equipoMedico->update($validated);
    
        // Actualizar el campo de fecha de modificación manualmente
        $equipoMedico->fecha_modificacion = now(); // Registrar la fecha actual
        $equipoMedico->save();
    
        return redirect()->route('equipomedicos.index')->with('success', 'Equipo médico actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $equipoMedico = EquipoMedico::findOrFail($id);
        $equipoMedico->delete();

        return redirect()->route('equipomedicos.index')->with('success', 'Equipo médico eliminado exitosamente.');
    }
}
