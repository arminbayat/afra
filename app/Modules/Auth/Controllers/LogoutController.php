<?php


namespace App\Modules\Auth\Controllers;

use App\Common\Bases\Controller;
use App\Common\Resources\NoContentResource;
use App\Models\User;
use App\Modules\Auth\Services\logoutService;

class LogoutController extends Controller
{
    public function __construct(private LogoutService $logoutService)
    {
    }
    public function __invoke(): NoContentResource
    {
        /** @var User $user */
        $user = auth()->user();

        ($this->logoutService)($user);

        return NoContentResource::make();
    }
}
