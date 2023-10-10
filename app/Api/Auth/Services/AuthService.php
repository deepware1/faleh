<?php

namespace App\Api\Auth\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Api\Base\Traits\HttpResponses;
use App\Api\Auth\Requests\LoginUserRequest;
use App\Api\Auth\Requests\StoreUserRequest;
use Illuminate\Http\Response;

class AuthService
{
    use HttpResponses;
    
    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        if(!Auth::attempt($request->only('email', 'password'))){
            return $this->error([],'Credentials dose not match', Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Api Token of ' . $user->name)->plainTextToken
        ],"Login Successful");
    }

    public function register(StoreUserRequest $request)
    {
        $request->validated($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Api Token of ' . $user->name)->plainTextToken
        ],"User Created Successful");
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->success([],"You have logged out");
    }
}