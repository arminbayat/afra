<?php

namespace App\Modules\Auth\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TokenResource
 * @property string type
 * @property string access_token
 * @property int expires_at
 */
class TokenResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'type' => $this->type,
            'access_token' => $this->access_token,
            'expires_at' => $this->expires_at,
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_CREATED);

        parent::withResponse($request, $response);
    }
}
