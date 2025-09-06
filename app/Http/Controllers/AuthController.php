<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $auth = Auth::attempt($data);
        if ($auth) {
            $user = Auth::user();
            $token = $user->createToken('login');
            $user['token'] = $token->plainTextToken;
            return $user;
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
