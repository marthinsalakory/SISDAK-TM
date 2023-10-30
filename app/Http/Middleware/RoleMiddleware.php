<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $role = preg_replace("/[^0-9|]/", "", $role);
        $role = explode('|', $role);

        foreach ($role as $r) {
            if (Auth::user()->role_id == $r) {
                return $next($request);
            }
        }

        return abort(403);
    }
}
