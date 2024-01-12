<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultiAuthUser
{
    public function handle(Request $request, Closure $next, $role)
    {
        if(Auth::check() && Auth::user()->role == $role)
        {
            return $next($request);
        }
        return response()->json(["You don't have permission to access this page"]);
    }
}
