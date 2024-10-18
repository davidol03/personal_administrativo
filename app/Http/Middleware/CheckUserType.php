<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle (Request $request, Closure $next, $type)
    {
        if (Auth::guard('usuario')->check() && Auth::guard('usuario')->user()->user_tipo != $type) {
        return redirect('/citas');
        }
    return $next($request);
}
}