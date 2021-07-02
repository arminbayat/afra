<?php

namespace App\Modules\Auth\Services;

use App\Models\User;
use App\Modules\Auth\DTOs\TokenDTO;
use Carbon\Carbon;
use Laravel\Passport\Passport;

class IssueTokenService
{
    public const APP_TOKEN_NAME = 'app';

    public function __invoke(User $user, string $tokenName = self::APP_TOKEN_NAME, Carbon $expiresIn = null): TokenDTO
    {
        $defaultPersonalAccessTokenTTL = Passport::personalAccessTokensExpireIn();
        if ($expiresIn) {
            Passport::personalAccessTokensExpireIn($expiresIn);
        }

        $tokenDTO = new TokenDTO(
            $user->createToken($tokenName)->accessToken,
            now()
                ->add(Passport::personalAccessTokensExpireIn())
                ->getTimestamp(),
        );

        if ($expiresIn) {
            Passport::personalAccessTokensExpireIn(Carbon::now()->add($defaultPersonalAccessTokenTTL));
        }

        return $tokenDTO;
    }
}
