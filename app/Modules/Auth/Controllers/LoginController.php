<?php

namespace App\Modules\Auth\Controllers;

use App\Common\Bases\Controller;
use App\Modules\Auth\DTOs\LoginRequestDTO;
use App\Modules\Auth\Requests\LoginRequest;
use App\Modules\Auth\Resources\TokenResource;
use App\Modules\Auth\Services\LoginService;

class LoginController extends Controller
{
    public function __construct(private LoginService $loginService)
    {
    }

    public function __invoke(LoginRequest $loginRequest): TokenResource
    {
        $loginRequestDTO = LoginRequestDTO::fromArray($loginRequest->validated());

        return TokenResource::make(($this->loginService)($loginRequestDTO));
    }
}
