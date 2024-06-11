<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class FailureResponse extends BaseResponse
{
    public function __construct(public string $status = 'failure')
    {
        parent::__construct($status);
    }
}