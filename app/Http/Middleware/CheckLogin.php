<?php

namespace App\Http\Middleware;

use Closure;
use AUth;
class CheckLogin
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
        
        if(Auth::check()){
            $user = Auth::user();
            if ( $user->role=='user' ) {
                return redirect('user'); 
           }
           else if ( $user->role=='admin' ) {
                return $next($request);
           }
        }
        else{
            return redirect('login');
        }
        echo "this is checklog middleware";  
        
    }
}
