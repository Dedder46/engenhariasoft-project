<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Verifica se o usuário está autenticado e se o papel corresponde
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request); // Permite o acesso
        }

        // Se o papel não corresponder, bloqueia o acesso
        abort(403, 'Acesso negado');
    }
    }

