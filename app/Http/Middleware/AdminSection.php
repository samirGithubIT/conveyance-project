<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminSection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->adminSection() ){

            return $next($request);

        }else if (Auth::check()){  // login thakle home a jabe
            return redirect()->to('/dashboard');
        }
        else {
            return redirect()->route('employee.login'); 
        }

    }
}
 