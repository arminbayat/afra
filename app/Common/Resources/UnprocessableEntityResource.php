<?php

namespace App\Common\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class UnprocessableEntityResource extends JsonResource
{
    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);

        parent::withResponse($request, $response);
    }
}
