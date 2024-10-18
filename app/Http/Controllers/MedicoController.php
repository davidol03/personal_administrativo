<?php

namespace App\Http\Controllers;
use App\Models\Consultorio;
use App\Models\Especialidad;
use App\Models\Estatus;
use App\Models\EstatusUsuario;
use App\Models\Medico;
use Illuminate\Http\Request;
use Carbon\Carbon; // Importar la clase Carbon

class MedicoController extends Controller
{
    //public function __construct()
   // {
    //    $this->middleware('auth:usuario');
   // }
    public function index()
    {
        $medicos = Medico::all();
        $user =auth()->guard('usuario')->user();
        return view('medicos.indexmedico', compact('medicos','user'));
    }

    public function create()
    {
        // Obtener las especialidades
        $especialidades = Especialidad::all();
        // Obtener los consultorios
        $consultorios = Consultorio::all();
    
        // Obtener los estatus y estatus de usuario
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user =auth()->guard('usuario')->user();
        // Pasar los datos a la vista
        return view('medicos.createmedico', compact('especialidades','consultorios', 'estatus', 'estatusUsuarios','user'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_medico' => 'required|integer|unique:medico,id_medico',
            'nombre_medico' => 'required|string|max:100',
            'apellido_medico' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:15',
            'email_medico' => 'nullable|string|max:100',
            'id_especialidad' => 'required|integer',
            'id_consultorio' => 'required|integer',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
            'id_paciente' => 'nullable|integer', // Asegúrate de que este campo es opcional si no siempre se llena
        ]);
    
        // Guardar el nuevo médico
        Medico::create($validated);
    
        return redirect()->route('medicos.index')->with('success', 'Médico creado exitosamente.');
    }
    

    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        
        // Obtener especialidades,consultorio, estatus y estatus de usuario
        $especialidades = Especialidad::all();
        $consultorios = Consultorio::all();
        $estatus = Estatus::all();
        $estatusUsuarios = EstatusUsuario::all();
        $user =auth()->guard('usuario')->user();
    
        return view('medicos.editmedico', compact('medico', 'especialidades','consultorios', 'estatus', 'estatusUsuarios','user'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre_medico' => 'required|string|max:100',
            'apellido_medico' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:15',
            'email_medico' => 'nullable|string|max:100',
            'id_especialidad' => 'required|integer',
            'id_consultorio' => 'required|integer',
            'id_estatus' => 'required|integer',
            'id_estatus_usuario' => 'required|integer',
            'id_paciente' => 'nullable|integer',
        ]);
         // Añadir la fecha y hora actual al campo 'fecha_modificacion'
        $validated['fecha_modificacion'] = Carbon::now(); // Establecer la fecha actual

        // Encontrar el médico por su id
        $medico = Medico::findOrFail($id);
        $medico->update($validated);

        return redirect()->route('medicos.index')->with('success', 'Médico actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return redirect()->route('medicos.index')->with('success', 'Médico eliminado exitosamente.');
    }
}
