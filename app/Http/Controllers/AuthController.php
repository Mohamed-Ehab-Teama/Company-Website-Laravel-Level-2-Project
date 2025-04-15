<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        
        $data['token'] = $user->createToken("RegisteredUser")->plainTextToken;

        if($user)
        {
            return ApiResponse::sendResponse(201, "Registered Successfully", $data);
        }
    }



    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        
        if(Auth::attempt( ['email' => $data['email'], 'password' => $data['password'] ]))
        {
            $user = Auth::user();
            $data['token'] = $user->createToken("LoggedInUser")->plainTextToken;
            return ApiResponse::sendResponse(200, "LoggedIn Successfully", $data);
        }
        return ApiResponse::sendResponse(401, "Credentials are not Correct", []);
    }



    public function logout (Request $request) 
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::sendResponse(200, "LoggedOut Successfully", []);
    }

}
