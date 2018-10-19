<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('login',['state' => 'error']);
        }
        if (Auth::check() && Auth::user()->role < 1) {
            return $next($request);
        } else {
            return redirect()->route('home');
        }
    }
}
