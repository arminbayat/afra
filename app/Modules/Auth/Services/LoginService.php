<?php


namespace App\Modules\Auth\Services;

use App\Modules\Auth\DTOs\LoginRequestDTO;
use App\Modules\Auth\DTOs\TokenDTO;

class LoginService
{
    public function __construct(
        private ValidateAndGetUserByCredentialsService $validateAndGetUserByCredentialsService,
        private IssueTokenService $issueTokenService
    ) {
    }

    public function __invoke(LoginRequestDTO $loginRequestDTO): TokenDTO
    {
        $user = ($this->validateAndGetUserByCredentialsService)($loginRequestDTO->mobile, $loginRequestDTO->password);

        return ($this->issueTokenService)($user, IssueTokenService::APP_TOKEN_NAME);
    }
}
