<?php

namespace App\Http\Controllers;

use App\Models\EstatusUsuario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EstatusUsuarioController extends Controller
{
    public function index()
    {
        // Obtener todos los estatus de usuario
        $estatusUsuarios = EstatusUsuario::all();
        $user = auth()->guard('usuario')->user(); // Obtener el usuario autenticado
        return view('estatususuario.index_estatususuario', compact('estatusUsuarios', 'user'));
    }

    public function create()
    {
        // Obtener el usuario autenticado
        $user = auth()->guard('usuario')->user();
        return view('estatususuario.create_estatususuario', compact('user'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_estatus_usuario' => 'required|integer|unique:estatus_usuario,id_estatus_usuario',
            'nombre_usuario' => 'required|string|max:100',
        ]);

        // Guardar el nuevo estatus de usuario
        EstatusUsuario::create($validated);

        return redirect()->route('estatususuario.index')->with('success', 'Estatus de usuario creado exitosamente.');
    }

    public function edit($id)
    {
        // Encontrar el estatus de usuario por su id
        $estatusUsuario = EstatusUsuario::findOrFail($id);
        $user = auth()->guard('usuario')->user(); // Obtener el usuario autenticado
        return view('estatususuario.edit_estatususuario', compact('estatusUsuario', 'user'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre_usuario' => 'required|string|max:100',
        ]);

        // Encontrar el estatus de usuario por su id
        $estatusUsuario = EstatusUsuario::findOrFail($id);

        // Actualizar los datos validados
        $estatusUsuario->update($validated);

        return redirect()->route('estatususuario.index')->with('success', 'Estatus de usuario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        // Encontrar el estatus de usuario por su id
        $estatusUsuario = EstatusUsuario::findOrFail($id);
        $estatusUsuario->delete();

        return redirect()->route('estatususuario.index')->with('success', 'Estatus de usuario eliminado exitosamente.');
    }
}
