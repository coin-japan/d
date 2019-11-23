<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    public function handle($request, Closure $next)
    {    
        $isUserAdmin = Auth::user()->role === 2;
        
        if($isUserAdmin)
            return $next($request);

        return response()->json(['error' => 'Unautorized']);
    }
}
