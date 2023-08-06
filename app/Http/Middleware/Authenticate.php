<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
        // if(Auth::user()){
        //     return $next($request);    
        // }
        // return redirect()->route('login');

        // if(Auth::user()){
        //     if(Auth::user()){
        //         $users = Auth::user();
        //         // return response()->view('auth.verify-otp', compact('users'));
        //     return $next($request);
        //     }
        //     return $next($request);
        // }
        // return $next($request);
    }
}
