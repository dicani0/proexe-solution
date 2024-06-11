<?php

namespace App\Http\Services\Auth;

use App\Exceptions\AuthException;
use App\Http\Services\Auth\Contracts\BazAuthServiceContract;
use External\Baz\Auth\Authenticator;
use External\Baz\Auth\Responses\Failure;

class BazAuthService extends AuthService implements BazAuthServiceContract
{

    public function __construct()
    {
        $this->auth = new Authenticator();
    }

    /**
     * @throws AuthException
     */
    public function login(string $login, string $password): string
    {
        $response = $this->auth->auth($login, $password);
        if ($response instanceof Failure) {
            throw new AuthException();
        }
        return $this->createJWT($login);
    }
}