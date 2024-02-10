<?php

namespace App\Services;

use App\Http\Requests\UserAuthorizeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthorizeService
{
    public function login(UserAuthorizeRequest $request, bool $remember)
    {
        $data = $request->validated();
        if (Auth::attempt($data, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }
        return back()->with('error', 'Username or password wrong!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate(true);
        return redirect()->route('login');
    }
}
