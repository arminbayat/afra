<?php


namespace App\Modules\Auth\DTOs;

use App\Common\Bases\DTO;

class LoginRequestDTO extends DTO
{
    public function __construct(public string $mobile, public string $password)
    {
    }
}
