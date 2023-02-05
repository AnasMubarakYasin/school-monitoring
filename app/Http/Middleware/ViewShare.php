<?php

namespace App\Http\Middleware;

use App\Models\Administrator;
use App\Models\Operator;
use App\Panel\Context;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ViewShare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $user = Auth::user();
        // $context = Context::create($user::class);

        // View::share('context', $context);
        // View::share('user', $user);

        return $next($request);
    }
}
