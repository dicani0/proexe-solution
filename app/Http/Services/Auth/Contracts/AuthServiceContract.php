<?php

namespace App\Http\Services\Auth\Contracts;

interface AuthServiceContract
{
    public function login(string $login, string $password): string;
}