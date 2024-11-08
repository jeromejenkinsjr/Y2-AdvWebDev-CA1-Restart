<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Assuming you have an `is_admin` field in your users table.
        if (auth()->user() && auth()->user()->is_admin) {
            return $next($request);
        }

        // If not an admin, redirect or abort with 403 forbidden
        return abort(403, 'Unauthorized');
    }
}
