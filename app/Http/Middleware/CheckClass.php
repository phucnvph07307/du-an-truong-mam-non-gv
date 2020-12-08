<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckClass
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
       if(Auth::user()->profile == null){
            return redirect('logout');
        }elseif (Auth::user()->profile->lop_id == null && Auth::user()->profile->lop_id == 0) {
            return redirect('profile');
        }else{
            return $next($request);
        }
    }
}
