<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Get user by email
        $user = User::where('email', $request->email)->first();

        // Check login
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['Unauthorized'], 401);
        }

        // Create token
        $token = $user->createToken($request->device_name ?? 'undefined')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user], 200);
    }

    /**
     * Handle a logout request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $user = $request->user();

        // Delete token
        foreach ($user->tokens as $token) {
            $token->delete();
        }

        return response()->json(['message' => 'logouted']);
    }

    /**
    * Check email existed on DB
    * false→not existed,　true→existed
    *
    * @param string $email
    */
    public function existEmail($email)
    {
        $check = User::where('email', $email)->exists();
        
        return response()->json($check);
    }
    
}
