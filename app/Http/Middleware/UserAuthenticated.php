<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UserAuthenticated
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
        if( Auth::check() )
        {
            $user = Auth::user();
            if ( $user->role=='admin' ) {
                return redirect('home');
           }

           // allow user to proceed with request
           else if ( $user->role=='admin' ) {
                return $next($request);
           }
        }

        abort(404);  // for other user throw 404 error
    }
}
