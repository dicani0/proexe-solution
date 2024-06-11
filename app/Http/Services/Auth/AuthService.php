<?php

namespace App\Http\Services\Auth;

use App\Http\Services\Auth\Contracts\AuthServiceContract;
use Illuminate\Support\Str;

abstract class AuthService implements AuthServiceContract
{
    protected $auth;

    protected function createJWT(string $login): string
    {
        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT',
        ];

        $payload = [
            'system' => $this->getSystemFromLogin($login),
            'login' => $login,
        ];

        // Dummy JWT, misses secret, the signature etc so every token is the same.
        return base64_encode(json_encode($header)) . '.' . base64_encode(json_encode($payload));
    }

    private function getSystemFromLogin(string $login): string
    {
        return Str::before($login, '_');
    }
}