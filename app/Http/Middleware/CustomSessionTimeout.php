<?php

namespace App\Http\Middleware;

use Closure;

class CustomSessionTimeout
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
        $condition1 = Auth()->user()->level == 'admin'; 
        $condition2 = Auth()->user()->division == 'BCD'; 
        $condition3 = Auth()->user()->position == 'BE';


        if ($condition1 && $condition2 && $condition3) {
            $sessionLifetime = 180;
        } else {
            $sessionLifetime = 1; 
        }

        // Mengatur waktu habis sesi berdasarkan kondisi
        config(['session.lifetime' => $sessionLifetime]);

        return $next($request);      
    }
}
