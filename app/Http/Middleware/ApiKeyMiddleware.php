<?php

namespace App\Http\Middleware;

use Closure;
use Exception;

class ApiKeyMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        $token = $request->header('API-TOKEN');

        if(!$token) {
            // Unauthorized response if token not there
            return response()->json([
                'error' => 'Token not provided.'
            ], 401);
        }
        if('VALIDTOKEN' !== $token) {
            // Unauthorized response if token not there
            return response()->json([
                'error' => 'Token not valid.'
            ], 401);
        }

        return $next($request);
    }
}