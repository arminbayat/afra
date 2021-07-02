<?php

namespace App\Common\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response;

class NoContentResource extends JsonResource
{
    #[Pure] public function __construct()
    {
        parent::__construct(null);
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_NO_CONTENT);

        parent::withResponse($request, $response);
    }
}
