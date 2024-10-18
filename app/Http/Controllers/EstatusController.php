<?php

namespace App\Http\Controllers;

use App\Models\Estatus; // Asegúrate de que el modelo Estatus está creado
use Illuminate\Http\Request;
use Carbon\Carbon;

class EstatusController extends Controller
{
    public function index()
    {
        // Obtener todos los estatus
        $estatus = Estatus::all();
        $user = auth()->guard('usuario')->user(); // Obtener el usuario autenticado
        return view('estatus.indexestatus', compact('estatus', 'user'));
    }

    public function create()
    {
        // Obtener el usuario autenticado
        $user = auth()->guard('usuario')->user(); 
        return view('estatus.createestatus', compact('user'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_estatus' => 'required|integer|unique:estatus,id_estatus',
            'nombre_estatus' => 'required|string|max:50',
        ]);

        // Guardar el nuevo estatus
        Estatus::create($validated);

        return redirect()->route('estatus.index')->with('success', 'Estatus creado exitosamente.');
    }

    public function edit($id)
    {
        // Encontrar el estatus por su id
        $estatus = Estatus::findOrFail($id);
        $user = auth()->guard('usuario')->user(); // Obtener el usuario autenticado
        return view('estatus.editestatus', compact('estatus', 'user'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre_estatus' => 'required|string|max:50',
        ]);

        // Encontrar el estatus por su id
        $estatus = Estatus::findOrFail($id);

        // Actualizar los datos validados
        $estatus->update($validated);

        return redirect()->route('estatus.index')->with('success', 'Estatus actualizado exitosamente.');
    }

    public function destroy($id)
    {
        // Encontrar el estatus por su id
        $estatus = Estatus::findOrFail($id);
        $estatus->delete();

        return redirect()->route('estatus.index')->with('success', 'Estatus eliminado exitosamente.');
    }
}
