<?php


namespace App\Modules\Auth\Services;


use App\Models\User;

class logoutService
{
    public function __invoke(User $user): void
    {
        $user->token()->revoke();
    }
}
