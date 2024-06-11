<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class MovieCollectionResponse implements Responsable
{
    public function __construct(public array $titles)
    {
    }

    public function toResponse($request)
    {
        // Could be a resource class instead of array
        return response()->json($this->titles);
    }
}