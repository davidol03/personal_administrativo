<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;
use App\Models\Estatus;
use App\Models\EstatusUsuario;
use Carbon\Carbon; // Importar la clase Carbon

class ConsultorioController extends Controller
{

    public function index()
    {
        $consultorios = Consultorio::all();
        $user =auth()->guard('usuario')->user();
        return view('consultorios.indexconsultorio', compact('consultorios', 'user'));
    }

    public function create()
    {
        // Obtener los estatus y estatus de usuario
            $estatus = Estatus::all();
            $estatusUsuarios = EstatusUsuario::all();
            $user =auth()->guard('usuario')->user();
        return view('consultorios.createconsultorio', compact('estatus', 'estatusUsuarios','user'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_consultorio' => 'required|integer|unique:consultorio,id_consultorio', 
            'ubicacion_consultorio' => 'required|string',
            'capacidad_consultorio' => 'required|integer',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
        ]);

        // Guardar el nuevo consultorio
        Consultorio::create($validated);

        return redirect()->route('consultorios.index')->with('success', 'Consultorio creado exitosamente.');
    }

    public function edit($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user =auth()->guard('usuario')->user();
        return view('consultorios.editconsultorio', compact('consultorio','estatus', 'estatusUsuarios','user'));
    }
    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'ubicacion_consultorio' => 'required|string',
            'capacidad_consultorio' => 'required|integer',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
        ]);

         // Añadir la fecha y hora actual al campo 'fecha_modificacion'
         $validated['fecha_modificacion'] = Carbon::now(); // Establecer la fecha actual
        
        // Encontrar el consultorio por su id
        $consultorio = Consultorio::findOrFail($id);
    
        // Actualizar los datos validados
        $consultorio->update($validated);
    
        // Actualizar el campo de fecha de modificación manualmente
        $consultorio->fecha_modificacion = now(); // Registrar la fecha actual
        $consultorio->save();
    
        return redirect()->route('consultorios.index')->with('success', 'Consultorio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        $consultorio->delete();

        return redirect()->route('consultorios.index')->with('success', 'Consultorio eliminado exitosamente.');
    }
}
