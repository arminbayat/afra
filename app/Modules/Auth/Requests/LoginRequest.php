<?php


namespace App\Modules\Auth\Requests;

use App\Common\Bases\Request;

class LoginRequest extends Request
{
    protected function postRules(): array
    {
        return [
            'mobile' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6'],
        ];
    }
}
