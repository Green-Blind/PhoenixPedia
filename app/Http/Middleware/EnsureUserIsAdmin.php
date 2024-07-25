<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (!$request->user() || !$request->user()->roles->contains('name', 'admin')) {
            // On pourrait rediriger l'utilisateur vers une page d'accueil ou une page d'erreur
            return redirect('/home');
        }
        return $next($request);
    }
}
