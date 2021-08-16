<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Token;
use Illuminate\Http\Request;

class APIAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->bearerToken()) {
            $token = $request->bearerToken();
            $serverToken = Token::first()->token;
            if ($token !== $serverToken) {
                return response()->json(['status' => "Unauthrozied!"]);
            } else {
                return $next($request);
            }
        } else {
            return response()->json(['status' => "Unauthrozied!"]);
        }
    }
}
