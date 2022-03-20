<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Token;
use Illuminate\Http\Request;

class APIAuthSingle
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
                return response()->json([
                    'id' => 99999,
                    'author_id' => 99999,
                    'album_id' => "99999",
                    'song_name_mm' => "Application Error",
                    'song_name_en' => "Application Error",
                    'file' => "https://winxstudio.xyz/mmguitarchords/public/storage/songs/system_error.jpg",
                    'is_new' => true,
                    'is_popular' => true,
                    'view_count' => 1,
                    "created_at" => "2022-03-06T05:51:53.000000Z",
                    "updated_at" => "2022-03-19T16:09:44.000000Z",
                    "author" => [
                        "id" => 114,
                        "author_name_en" => "System Error",
                        "author_name_mm" => "System Error",
                        "created_at" => "2022-03-06T05 =>51:06.000000Z",
                        "updated_at" => "2022-03-06T05:51:06.000000Z"
                    ],
                    "album" => null
                ]);
            } else {
                return $next($request);
            }
        } else {
            return response()->json(['status' => "Unauthrozied!"]);
        }
    }
}
