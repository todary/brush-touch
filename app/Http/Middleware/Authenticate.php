<?php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    public function handle($request, \Closure $next, ...$guards)
    {
        try {
            return parent::handle($request, $next, ...$guards);
        } catch (\Illuminate\Auth\AuthenticationException $e) {
            return response()->json(['message' => __('messages.unauthorized')], 401);
        }
    }
}
