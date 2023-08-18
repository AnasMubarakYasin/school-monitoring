<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthcGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $redirect = null, $guard = null)
    {
        if (Auth::guard($guard)->viaRemember() || Auth::guard($guard)->check()) {
            return to_route($redirect);
        }
        Auth::shouldUse($guard);

        return $next($request);
    }
}
