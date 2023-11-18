<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function auth(Request $request)
    {
        $creadentials = $request->validate(['username' => 'required', 'password' => 'required']);
        $user = User::with('role')->where('username', $creadentials['username'])->first();
        if (!$user) {
            return response([
                'status' => false,
                'message' => 'Tidak ditemukan username ' . $creadentials['username']
            ], HttpResponse::HTTP_UNAUTHORIZED);
        }
        $check_password = Hash::check($creadentials['password'], $user->password);
        if (!$check_password) {
            return response([
                'status' => false,
                'message' => 'Password tidak valid'
            ], HttpResponse::HTTP_UNAUTHORIZED);
        }
        $user->token = $user->createToken('token')->plainTextToken;
        return response([
            'status' => true,
            'message' => 'Login berhasil',
            'data' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response([
            'status' => true,
            'message' => 'Logout'
        ]);
    }

    public function currentUser(Request $request)
    {
        $user = $request->user();
        return response([
            'status' => true,
            'message' => 'Oke',
            'data' => $user->with('role')->where('username', $user->username)->first(),
        ]);
    }
}
