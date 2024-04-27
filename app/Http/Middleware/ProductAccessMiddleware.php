<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenCheckerMiddleware
{
    // /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    //  */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next)
	{
    	$validToken = env('API_TOKEN');
 
        // Check if the request contains a token
        $token = $request->header('Authorization');
        if (!$token) {
            return response()->json(['error' => 'Token is missing.'], 401);
        }

        // Compare the token provided in the request with the valid token
        if ($token !== $validToken) {
            return response()->json(['error' => 'Token is invalid.'], 401);
        }

    	return $next($request);
	}
}
