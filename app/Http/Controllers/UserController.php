<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $message = 'logged in';
        $user = User::where('name', $request->name)->first();
        if (!$user) {
            $message = 'created';
            $user = User::create(['name' => $request->name]);
        }

        $token = $user->createToken('logintoken');
        $data = [
            'user' => $user,
            'token' => $token->plainTextToken
        ];
        return $this->successResponse($message, $data);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
    }
}
