<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrarseController extends Controller
{
    public function registrarse()
    {
        $user = auth()->guard('usuario')->user();
        return view('usuarios.registrarse', compact('user'));
    }

    public function registrar(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|unique:usuario,user_name', // Corrección aquí
            'user_pass' => 'required|min:3',
            'user_tipo' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear un nuevo usuario
        $user = new Usuario();  // Corrección aquí
        $user->user_name = $request->user_name;
        $user->user_pass = Hash::make($request->user_pass);
        $user->user_tipo = $request->user_tipo;
        $user->save();

        return redirect()->back()->with('success', 'Usuario registrado correctamente');
    }
}
