<?php

namespace App\Http\Middleware;

use Closure;

class TypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$type)
    {
        if (auth()->user()->type == $type)
        {
            return $next($request);
        }
        if ($request->wantsJson())
        {
            $result = [
                'type' => request()->fullUrl(),
                'title' => "Unauthorized, You Didn't Have Permission To Do It.",
            ];
            return response()->json($result , 401);
        }
        return abort(401);
    }
}
