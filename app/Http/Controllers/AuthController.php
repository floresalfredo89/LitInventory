<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Register new user
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => new UserResource($user)
        ];
    }

    // Authenticates a user
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if(Auth::attempt($credentials)) {

            $user = User::find(Auth::user()->id);

            return [
                'token' => $user->createToken('token')->plainTextToken,
                'user' => new UserResource($user)
            ];
        }

        return response([
            'errors' => ['El correo o la constraseña son incorrectos']
        ],422);
    }

    // Loguot
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return [
            'logout' => 'ok'
        ];
    }

    // Logout in all devices
    public function logoutAll(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'logout' => 'ok'
        ];
    }
}
