<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        $isLoggedIn = session()->has('user_id');

        $protectedRoutes = [
            
            'dashboard',

            'cart/add/*',

            'cart/view',

        ];

        foreach ($protectedRoutes as $route) {

            if ($request->is($route) && !$isLoggedIn) {
            
                return redirect('/login')->with('error', 'You must login first');
            
            }
        
        }


        if ($isLoggedIn && ($request->is('login') || $request->is('register'))) {

            return redirect('/dashboard');

        }

        return $next($request);
    }

}
