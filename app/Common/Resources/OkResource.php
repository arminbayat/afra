<?php

namespace App\Common\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class OkResource extends JsonResource
{
    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_OK);

        parent::withResponse($request, $response);
    }
}
