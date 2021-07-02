<?php

namespace App\Modules\Auth\Services;

use App\Models\User;

use App\Repository\UserRepository;
use Illuminate\Contracts\Hashing\Hasher;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class ValidateAndGetUserByCredentialsService
{
    private Hasher $hash;
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository, Hasher $hash)
    {
        $this->userRepository = $userRepository;
        $this->hash = $hash;
    }

    public function __invoke(string $mobile, string $password): User
    {
        /** @var User $user */
        $user = $this->userRepository->findBy('mobile', $mobile);

        if (!$user || !$this->hash->check($password, $user->password) || !$user->is_admin) {
            throw new UnauthorizedHttpException("user or password is invalid or user is not admin");
        }

        return $user;
    }
}
