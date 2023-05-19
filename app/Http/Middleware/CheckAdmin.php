<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            abort(403);
        }

        if (Auth::user()->type !== 'admin' && Auth::user()->type !== 'super admin') {
            abort(403);
        }

        return $next($request);
    }
}
