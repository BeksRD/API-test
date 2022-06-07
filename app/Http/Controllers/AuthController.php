<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserCreateRequest;

class AuthController extends Controller
{
    public function register(UserCreateRequest $request, User $user)
    {
        return $user->saveUser($request)
            ->generateAndSaveApiAuthToken();
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            return Auth::guard('web')
                ->user()
                ->generateAndSaveApiAuthToken();
        }

        return response()->json(['message' => 'Error.....'], 401);
    }


    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['Success' => 'Logged out'], 200);
    }
}
