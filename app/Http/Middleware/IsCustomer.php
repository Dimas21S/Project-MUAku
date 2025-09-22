<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsCustomer
{
    public function handle(Request $request, Closure $next): Response
    {
        // Kalau user sudah login, langsung ijinkan
        if (Auth::check()) {
            return $next($request);
        }

        // Kalau belum login, arahkan ke halaman login
        return redirect()->route('login');
    }
}
