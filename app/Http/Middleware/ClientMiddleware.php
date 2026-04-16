<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // autoriser seulement les clients
        if (Auth::user()->role !== 'user') {
            return redirect('/')->with('error', 'Accès refusé');
        }

        return $next($request); // TRÈS IMPORTANT
    }
}
