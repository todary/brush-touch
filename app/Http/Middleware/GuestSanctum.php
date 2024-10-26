<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestSanctum
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->expectsJson() && auth('sanctum')->check()) {
            return response()->json([
                'message' => 'You are already authenticated.'
            ], 403);
        }

        return $next($request);
    }
}
