<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthorizeRequest;
use App\Services\UserAuthorizeService;
use Illuminate\Http\Request;

class UserAuthorizeController extends Controller
{
    public function __construct(private UserAuthorizeService $authService)
    {
    }
    public function login(UserAuthorizeRequest $request)
    {
        $remember = $request->input('remember-me', 'off') == 'on';
        return $this->authService->login($request, $remember);
    }

    public function logout(Request $request)
    {
        return $this->authService->logout($request);
    }
}
