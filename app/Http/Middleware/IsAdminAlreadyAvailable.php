<?php

namespace App\Http\Middleware;

use Closure;

class IsAdminAlreadyAvailable
{
    //check to see if admin is already logged in 
    public function handle($request, Closure $next)
    {
        if (\Session::has('IsAdminLoggedIn')) {
            return redirect("admin/dashboard");
        }
        
        return $next($request);    
    }
}
