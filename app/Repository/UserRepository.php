<?php

namespace App\Repository;

use App\Models\User;

class UserRepository extends BaseRepository
{
    protected array $fillable = [
        'first_name',
        'last_name',
        'email',
        'is_admin',
        'password',
    ];

    protected function model(): string
    {
        return User::class;
    }

    public function setPassword(User $user, string $password): User
    {
        $user->password = bcrypt($password);
        $user->save();

        return $user;
    }
}
