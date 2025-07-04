<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();
        
        if (!$user || !$user->hasAnyRole($roles)) {
            
            // dd($user);
            // abort(403, 'No tienes permiso para acceder a esta página.');
            return response()->view('error.403', [], 403);
        }
    
        return $next($request);
    }
}
