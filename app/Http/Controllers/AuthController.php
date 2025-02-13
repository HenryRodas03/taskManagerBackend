<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\ValidationLogin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(ValidationLogin $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            $user = User::where('email', $credentials['email'])->first();

            if (!$user || !Hash::check($credentials['password'], $user->password)) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $user = User::getUserByEmail($request['email']);

            $existingToken = $user->tokens()->first();

            if ($existingToken) {
                $existingToken->delete();
            }
            $token = $user->createToken('authToken')->plainTextToken;

            $data = [
                'information_user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer'
            ];

            return ['status' => true, 'message' => 'success', 'data' => $data];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => "error", 'error' => $e->getMessage()];
        }
    }

    public function logout(ValidationLogin $request)
    {
        try {
            $user = User::getUserByEmail($request['email']);

            $token = $user->tokens()->first();

            if ($token) {

                $token->delete();

                return [true, 'success', []];
            }
        } catch (\Exception $e) {
            return [false, "error", $e->getMessage()];
        }
    }
}
