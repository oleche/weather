<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Cache;
use Closure;

class ResponseCacheMiddleware
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
        $key = 'request|'.$request->url();

        return Cache::remember($key, 300, fn() => $next($request));
    }
}
