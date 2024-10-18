<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'user_name' => 'required|string',
            'user_pass' => 'required|string',
        ]);
    
        // Obtenemos las credenciales del formulario
        $credentials = $request->only('user_name', 'user_pass');
    
        // Intentamos buscar el usuario por su nombre
        $user = \App\Models\Usuario::where('user_name', $credentials['user_name'])->first();
        //dd($user, Hash::check($credentials['user_pass'], $user->user_pass));
    
        if ($user && Hash::check($credentials['user_pass'], $user->user_pass)) {
            // Autenticamos al usuario
            Auth::guard('usuario')->login($user);
            $request->session()->regenerate(); // Regeneramos la sesión
    
            // Redirigimos al menú o página principal
            return redirect()->intended('menu');
        }
    
        // Si las credenciales no coinciden, devolvemos error
        return back()->withErrors([
            'user_name' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::guard('usuario')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
