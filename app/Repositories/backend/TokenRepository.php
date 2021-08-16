<?php

namespace App\Repositories\backend;
use App\Models\Token;

class TokenRepository {
    public function get()
    {
        return Token::first();
    }

    public function updateToken($inputs)
    {
        $new_token = $inputs['token'];
        $token = Token::first();

        try {
            $token->update(["token" => $new_token]);
            return "Success";
        } catch (\Exception $e) {
            dd($e);
        }
    }
}