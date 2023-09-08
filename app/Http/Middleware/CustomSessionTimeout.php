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
        if (auth()->user()->level == 'admin') {
            config(['session.lifetime' => 180]); // Menit
        } else if (auth()->user()->level == 'user'){
            config(['session.lifetime' => 1]); // Menit
        }
    
        return $next($request);
    }
}
