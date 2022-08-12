<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{
   
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->status == 0){
          return response("sorry user must be active");
        }
            return $next($request);

        

    }
}
