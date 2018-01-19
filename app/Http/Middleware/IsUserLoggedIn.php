<?php

namespace App\Http\Middleware;

use Closure;

class IsUserLoggedIn
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
        if (!\Session::has('IsUserLoggedIn')) {
            return redirect("/users/login");
        }

        return $next($request);
    }
}
