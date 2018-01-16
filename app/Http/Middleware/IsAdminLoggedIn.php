<?php

namespace App\Http\Middleware;

use Closure;

class IsAdminLoggedIn
{
    
    public function handle($request, Closure $next)
    {
        if (!\Session::has('IsAdminLoggedIn')) {
            return redirect("admin/signin");
        }
        
        return $next($request);    
    }
}
