<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' =>'required',
            'password' =>'required'
        ]);

        $user_data = $request->only('email', 'password');
        if(Auth::attempt($user_data)){

            return response(['message' =>'You have successfully logged in'], 200);
        }

        return response(['message' =>'You have entered invalid credentials.'], 422);
    }
}
