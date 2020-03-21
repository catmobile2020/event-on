<?php

namespace App\Http\Middleware;

use Closure;

class ChangeGuardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $guard='api';
        if ($request->routeIs('admin.*'))
        {
            $guard = 'admin';
        }elseif ($request->routeIs('site.*'))
        {
            $guard = 'web';
        }
        auth()->shouldUse($guard);
        return $next($request);
    }
}
