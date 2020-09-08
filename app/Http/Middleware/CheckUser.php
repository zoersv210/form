<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser
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
        $user = Auth::user();
        $role = $user->role->toArray();

        if(Auth::check() && $role[0]['name'] == 'guest') {

           return $next($request);

        } else {
          return redirect('/home');
            
        }


        
    }
}
