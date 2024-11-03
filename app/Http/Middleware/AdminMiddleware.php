<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in and has an admin role
        if (Auth::check() && Auth::user()->admin) {
            // If the user is an admin, allow the request to proceed to the next step in the middleware stack
            return $next($request);
        }

        // If the user is not an admin, redirect to the dashboard with an "Access denied" error message
        return redirect('/dashboard')->with('error', 'Access denied.');
    }
}
