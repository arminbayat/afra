<?php

namespace App\Common\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class ForbiddenResource extends JsonResource
{
    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_FORBIDDEN);

        parent::withResponse($request, $response);
    }
}
