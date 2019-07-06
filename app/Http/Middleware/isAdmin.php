<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
        $isAdmin=false;
        foreach (Auth::user()->roles as $role){
            if($role->isAdmin==1) $isAdmin=true;
        }

        if(Auth::check() && $isAdmin ){
            return $next($request);
        }
        else{
            return redirect('home')->with('error','You have not admin access');
        }
    }


}
