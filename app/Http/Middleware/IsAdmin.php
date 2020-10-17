<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class IsAdmin
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



        if(auth()->user() ==null){

            return redirect('login');
        }
        else
        {
            if(auth()->user()->type_client=='admin')
                return $next($request);

            else
                return redirect('login');
        }


    }
}
