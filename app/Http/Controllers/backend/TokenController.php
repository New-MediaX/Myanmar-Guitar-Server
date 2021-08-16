<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Repositories\backend\TokenRepository;
use App\Http\Requests\token\EditTokenRequest;

class TokenController extends Controller
{
    public function __construct(TokenRepository $tokenRepo)
    {
        $this->tokenRepo = $tokenRepo;
    }

    public function get()
    {
        return $this->tokenRepo->get();
    }

    public function edit()
    {
        return view("app.token.edit");
    }

    public function update(EditTokenRequest $request)
    {
        return $this->tokenRepo->updateToken($request);
    }
}
