<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        $user =auth()->guard('usuario')->user();
        return view('usuarios.indexusuarios', compact('usuarios','user'));
    }

    public function create()
    {
        return view('usuarios.registrarse');
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|unique:usuario,user_name',
            'user_pass' => 'required|min:3',
            'user_tipo' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new Usuario();
        $user->user_name = $request->user_name;
        $user->user_pass = Hash::make($request->user_pass);
        $user->user_tipo = $request->user_tipo;
        $user->save();

        return redirect()->route('usuarios.indexusuarios')->with('success', 'Usuario registrado correctamente');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $user =auth()->guard('usuario')->user();
        return view('usuarios.editusuarios', compact('usuario','user'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|unique:usuario,user_name', //$id_usuario, // Cambia 'id_usuario' si es necesario
            'user_pass' => 'nullable|min:3',
            'user_tipo' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $usuario = Usuario::findOrFail($id);
        $usuario->user_name = $request->user_name;
    
        // Actualizar la contraseña solo si se proporciona
        if ($request->user_pass) {
            $usuario->user_pass = Hash::make($request->user_pass);
        }
    
        $usuario->user_tipo = $request->user_tipo;
        $usuario->save();
    
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }
    

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }
}
