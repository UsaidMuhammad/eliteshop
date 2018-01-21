<?php

namespace App\Http\Middleware;

use Closure;

class DoesUserExsist
{
    
    public function handle($request, Closure $next)
    {
        // check to see if user was disabled or deleted and proceede as so
        if (\Session::has('IsUserLoggedIn')) {
            $user = \DB::table('users')
                    ->where('UserID', \Session::get('UserID'))
                    ->first();
            if (!$user) {
                $this->killSession();   
            }

            if ($user->Status == 0) {
                $this->killSesssion();

                return redirect("/disabled");
            }
        }  
        
        return $next($request);    
    }

    private function killSesssion()
        {
            \Session::forget("UserID");
            \Session::forget("Name");
            \Session::forget("Email");
            \Session::forget("Address");
            \Session::forget("Cell");
            \Session::forget("IsUserLoggedIn");
            \Cart::destroy();
        }
}
