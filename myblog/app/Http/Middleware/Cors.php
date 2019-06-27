<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
       $request->header('Accept','application/json');
        $requestHeader = $next($request);
        $requestHeader->header('Access-Control-Allow-Origin', '*');
        $requestHeader->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, X-CSRF-TOKEN, Accept, Authorization, X-XSRF-TOKEN,X-Custom-Header');
        $requestHeader->header('Access-Control-Expose-Headers', 'Authorization, authenticated');
        $requestHeader->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
        $requestHeader->header('Access-Control-Allow-Credentials', 'true');
        return $requestHeader;


    }
}
