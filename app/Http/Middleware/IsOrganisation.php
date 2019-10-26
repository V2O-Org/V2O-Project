<?php

namespace App\Http\Middleware;

use Closure;

class IsOrganisation
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
        if (auth()->user()->role == 'ORGANISATION') { 
            return $next($request);
        }

        return redirect('home')->with('error', "You are not a registered organisation.");
    }
}
