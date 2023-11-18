<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class HasTokenApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $prefix = 'base64:';
        $token = $request->bearerToken();
        $message = response([
            'status' => false,
            'message' => 'API Token tidak valid'
        ], HttpResponse::HTTP_UNAUTHORIZED);
        $is_authorized = !empty($token) && $prefix . $token == env('APP_KEY');
        if (!$is_authorized) return $message;
        return $next($request);
    }
}
