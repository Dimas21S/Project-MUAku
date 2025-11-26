<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() && $request->hasCookie('user_id')) {
            try {
                $userId = decrypt($request->cookie('user_id'));
                $user = User::find($userId);
                if ($user) {
                    Auth::login($user);
                }
            } catch (\Exception $e) {
                Cookie::queue(Cookie::forget('user_id'));
            }
        }
        
        return $next($request);
    }
}
