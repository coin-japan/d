<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdminOrSelf
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
        $isUserSelf = $request->route()->parameter('id') == Auth::user()->id;
        
        $isUserAdmin = Auth::user()->role === 2;
        
        if($isUserAdmin || $isUserSelf)
            return $next($request);

        return response()->json(['error' => 'Unautorized']);
    }
}
