<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    // Asegúrate de proteger el acceso con el middleware
    public function __construct()
    {
        $this->middleware('auth:usuario'); // Protege la ruta con el guard 'usuario'
    }

    public function inicio()
    {
        $user = auth()->guard('usuario')->user(); // Verificamos si el usuario está autenticado
    
        if (!$user) {
            return redirect()->route('login'); // Si no está autenticado, redirige al login
        }
    
        return view('menu', compact('user')); // Si está autenticado, mostramos el menú
    }
    
}
