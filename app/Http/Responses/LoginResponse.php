<?php

namespace App\Http\Responses;

class LoginResponse extends BaseResponse
{
    public function __construct(public string $token, public string $status = 'success')
    {
        parent::__construct($status);
        $this->data['token'] = $token;
    }
}