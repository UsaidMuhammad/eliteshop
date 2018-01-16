<?php

namespace App\Http\Middleware;

use Closure;
use App;

class MenProductsChecker
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
        $get = App\Men::where('CategoryID',$request->route('CategoryID'))->first();
        
        if ($get == null) {
            return redirect('404');
        }
        
        return $next($request);
    }
}
