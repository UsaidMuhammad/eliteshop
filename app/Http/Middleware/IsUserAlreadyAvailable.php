<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;

class IsUserAlreadyAvailable
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
        if ($request->session()->has('IsUserLoggedIn')) {
            return redirect('users/info');
        }
        return $next($request);
    }
}
