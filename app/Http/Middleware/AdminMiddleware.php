<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // check if user is authenticated
        if (Auth::check()) {
            # check if user is an admin. i.e role=1
            if(Auth::user()->role == 1){
 return $next($request);
            }else{
return redirect('/verify')->with('message', 'Please come back later, your account is being verified by an Admin. This can take up to 24 hours.Thank you!!');
            }
        } else {
            # if user is not logined in
            return redirect('/login')->with('message', 'Access Denied Please Login!!');
      }
      return $next($request);  
        
    }
}
