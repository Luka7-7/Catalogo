<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmprendedorAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(
        Request $request,
        Closure $next
    ): Response
    {
        // VERIFICAR SESION
        if (!session()->has('usuario')) {

            return redirect()

                ->route('emprendedor.login')

                ->with('error', 'Debes iniciar sesión');

        }

        return $next($request);
    }
}