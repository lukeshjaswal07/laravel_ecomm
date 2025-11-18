<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {

        if (!session()->has('user_id') && ($request->path() == 'dashboard')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        if (session()->has('user_id') && ($request->path() == 'login' || $request->path() == 'register')) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
