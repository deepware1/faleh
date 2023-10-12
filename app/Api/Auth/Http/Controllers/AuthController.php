<?php

namespace App\Api\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Api\Auth\Services\AuthService;
use App\Api\Auth\Requests\LoginUserRequest;
use App\Api\Auth\Requests\StoreUserRequest;
use App\Api\Auth\Requests\ChangePasswordUserRequest;

class AuthController extends Controller
{
   
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    
    public function login(LoginUserRequest $request)
    {
        return $this->authService->login($request);
    }

    public function register(StoreUserRequest $request)
    {
        return $this->authService->register($request);
    }

    public function changePassword(ChangePasswordUserRequest $request)
    {
        return $this->authService->changePassword($request);
    }

    public function logout()
    {
        return $this->authService->logout();
    }

    public function getProfile()
    {
        return $this->authService->getProfile();
    }
}
