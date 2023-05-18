<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateClickNumber
{
 
    public function handle(Request $request, Closure $next) {
        $clickNumber = $request->click_number; 

       if (!ctype_digit($clickNumber)) return response() ->json([
           'error' => 'Invalid click number'
       ], 400);
       return $next($request);
    }
}
