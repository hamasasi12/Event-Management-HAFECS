<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRole
{
    public function handle(Request $request, Closure $next): Response
    {
        // If admin is authenticated and trying to access login page, redirect to dashboard
           // Kalau user login dan admin
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            // Izinkan akses hanya ke route admin/*
            if ($request->is('admin')) {
                return redirect()->route('admin.dashboard');
            }
        }


        return $next($request);
    }
}