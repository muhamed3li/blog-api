<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    public function login(Request $request)
    {
        $this->validation([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user['token'] = $user->createToken('auth')->plainTextToken;
            return $this->sendResponse($user);
        }
        return $this->sendError('Unauthorized', 401);

    }
}
