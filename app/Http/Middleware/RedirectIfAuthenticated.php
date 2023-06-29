<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && auth()->user()->role == 'admin'){
                return redirect()->route('home.admin');
            }

            if (Auth::guard($guard)->check() && auth()->user()->role == 'creator'){
                return redirect()->route('home.creator');
            }

            if (Auth::guard($guard)->check() && auth()->user()->role == 'client'){
                return redirect()->route('home.client');
            }
        }

        return $next($request);
    }
}
