<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseResponse implements Responsable
{
    protected array $data;

    public function __construct(public string $status = 'success')
    {
        $this->data = [
            'status' => $status,
        ];
    }

    public function toResponse($request): Response
    {
        return new JsonResponse($this->data);
    }
}