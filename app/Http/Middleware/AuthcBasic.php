<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthcBasic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $redirect = null, string ...$guards)
    {
        $authenticated = false;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::shouldUse($guard);
                $authenticated = true;
                break;
            }
        }
        // if (auth($guard)->viaRemember()) {
        //     return to_route($redirect);
        // }
        // if (!Auth::check()) {
        //     return to_route($redirect);
        // }
        if (!$authenticated) {
            return to_route($redirect);
        }

        return $next($request);
    }
}
