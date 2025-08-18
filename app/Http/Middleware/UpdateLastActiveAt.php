<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UpdateLastActiveAt
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            Auth::user()->forceFill(['last_active_at' => now()])->save();
        }

        return $next($request);
    }
}
