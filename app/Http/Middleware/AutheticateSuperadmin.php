<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutheticateSuperadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return $next($request);    // Redirect ke login jika tidak terautentikasi
        }
        return redirect('/login'); 

    }


         // public function handle(Request $request, Closure $next): Response
    // {
    //     // // Check if the user is authenticated and is an admin
    //     // if (Auth::guard('superadmin')->check() && Auth::guard('superadmin')->user()->level_id == 1) {
    //     //     return $next($request);
    //     // }
        

    //     // // If not authenticated or not an admin, redirect to login
        // return redirect('/login');
    // }
}
