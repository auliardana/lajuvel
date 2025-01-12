<?php

namespace App\Http\Middleware;

use App\Models\User; // Add this line if necessary


use Closure;
use Illuminate\Http\Request;
use Auth;

class MemberMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        if (Auth::check() && $user ->role == $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
