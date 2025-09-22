<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRole
{
     public function handle($request, Closure $next)
    {
        // kalau admin login dan bukan di route admin, arahkan ke admin dashboard
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            if (
                !$request->is('admin') && 
                !$request->is('admin/*') && 
                !$request->is('logout')
            ) {
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }
}