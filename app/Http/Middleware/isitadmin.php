<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isitadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       /* if(auth()->user()->admin == 1){
            return $next($request);
        }else{
            return redirect('home')->with('error','You have not admin access');

        } */


        if(auth()->check() && auth()->user()) {
            return $next($request); 
        }
        else{
            return redirect()->route('login')->with('error','You have no admin access');
        } 
    }
}
