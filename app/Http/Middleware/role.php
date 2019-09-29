<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , ...$roles)
    {
        $user = Auth::user();

        foreach ($roles as $role) {
            
            if($user->type_client == $role)
                return $next($request);
        }
    
        return redirect('/plats')->with('message','Vous n\'avez le droit pour acceder a cette page');
    }
}
