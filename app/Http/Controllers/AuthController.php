<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {

        
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'access_token' => $token
        ]);
    }

    public function register(RegisterRequest $request)
    {
        
        $user = User::create([
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'user_type' => "guest",
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'access_token' => $token
        ]);
    }

    public function unsubscribe(Request $request) {
        $user = $request->user();
        $user->delete();

        return response()->json([
            "status" => "success"
        ]);
    }
}
