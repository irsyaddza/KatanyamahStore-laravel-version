<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->is_admin != 1) {
            return redirect()->route('dashboard.user')
                ->with('error', 'You do not have permission to access admin dashboard');
        }
        
        return $next($request);
    }
}