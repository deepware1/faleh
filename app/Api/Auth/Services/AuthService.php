<?php

namespace App\Api\Auth\Services;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Api\Base\Traits\HttpResponses;
use App\Api\Auth\Http\Resources\UsersResource;

class AuthService
{
    use HttpResponses;

    public function login($request)
    {
        $request->validated($request->all());

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error([], 'Credentials dose not match', Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => new UsersResource($user),
            'token' => $user->createToken('Api Token of ' . $user->name)->plainTextToken
        ], "Login Successful");
    }

    public function register($request)
    {
        $request->validated($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone'  => $request->phone,
            'about' => $request->about ?? null,
        ]);
        return $this->success([
            'user' => new UsersResource($user),
            'token' => $user->createToken('Api Token of ' . $user->name)->plainTextToken
        ], "User Created Successful");
    }

    public function changePassword($request)
    {
        $request->validated($request->all());

        $user = Auth::user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->password =  Hash::make($request->new_password);
            $user->save();
            return $this->success([
                new UsersResource($user),
            ], "Password Updated Successful");
        } else {
            return $this->error([], 'Old password is wrong ');
        }
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->success([], "You have logged out");
    }

    public function getProfile()
    {
        return $this->success([
            new UsersResource(Auth::user())
        ]);
    }
}
