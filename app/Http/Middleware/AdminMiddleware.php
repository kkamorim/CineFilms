<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_gm) {
            return $next($request);
        }

        if (Auth::check()) {
            return redirect('/')->with('error', 'Acesso restrito a administradores.');
        }

        return redirect()->route('admin.login');
    }
}
