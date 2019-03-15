<?php

namespace App\Http\Middleware;

use Closure;

class CleanArchitectureMiddleware
{
    public static $view;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        return $response;
    }
}
