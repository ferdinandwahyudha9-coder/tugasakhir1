<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('=== NEW REQUEST ===', [
            'method' => $request->method(),
            'path' => $request->path(),
            'ip' => $request->ip(),
            'url' => $request->url(),
            'timestamp' => now()
        ]);

        $response = $next($request);

        Log::info('=== REQUEST RESPONSE ===', [
            'status' => $response->status(),
            'path' => $request->path(),
            'timestamp' => now()
        ]);

        return $response;
    }
}
