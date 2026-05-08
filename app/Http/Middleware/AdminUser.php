<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminUser
{
    /**
     * Handle an incoming request.
     * Solo permite el paso a usuarios con role = 'Admin'.
     * Los Customers son redirigidos al dashboard.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'Admin') {
            return $next($request);
        }

        return redirect('dashboard')->with('error', 'Access denied. Admin only.');
    }
}