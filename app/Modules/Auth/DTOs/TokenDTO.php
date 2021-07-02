<?php

namespace App\Modules\Auth\DTOs;

use App\Common\Bases\DTO;

class TokenDTO extends DTO
{
    public const TYPE_BEARER = 'bearer';
    public string $type;

    public function __construct(public string $access_token, public int $expires_at, $type = self::TYPE_BEARER)
    {
        $this->type = $type;
    }
}
