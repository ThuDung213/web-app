<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Creator
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
        if(!Auth::check()) {
            return redirect() ->route('login');
        }

        if(Auth::user()->role == 'client') {
            return redirect() -> route('home.client');
        }

        if(Auth::user()-> role == 'creator') {
            return $next($request);
        }

        if(Auth::user() -> role == 'admin') {
            return redirect() -> route('home.admin');
        }
    }
}
