<?php

namespace App\Providers;

use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('login-mua.post', function (HttpRequest $request) {
            return Limit::perMinute(3)->by($request->ip() . ':' . $request->input('email'));
        });

        RateLimiter::for('register-mua.post', function (HttpRequest $request) {
            return Limit::perMinute(3)->by($request->ip() . ':' . $request->input('email'));
        });

        RateLimiter::for('post-pendaftaran', function (HttpRequest $request) {
            return Limit::perMinute(3)->by($request->ip() . ':' . $request->input('email'));
        });

        RateLimiter::for('login.post', function (HttpRequest $request) {
            return Limit::perMinute(3)->by($request->ip() . ':' . $request->input('email'));
        });

        RateLimiter::for('register.post', function (HttpRequest $request) {
            return Limit::perMinute(3)->by($request->ip() . ':' . $request->input('email'));
        });
    }
}
