<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (Auth::check() && $user->isAdmin()) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
