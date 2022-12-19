<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $permission = 'platform.systems.debugbar';

        if ($request->user()->permissions[$permission]) {
            \Debugbar::enable();
            return $next($request);
        } elseif (count($request->user()->roles)) {
            foreach ($request->user()->roles as $role) {
                if ($role->permissions[$permission]) {
                    \Debugbar::enable();
                    return $next($request);
                }
            }
        }

        \Debugbar::disable();

        return $next($request);
    }
}
