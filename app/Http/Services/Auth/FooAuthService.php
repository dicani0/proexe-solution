<?php

namespace App\Http\Services\Auth;

use App\Exceptions\AuthException;
use App\Http\Services\Auth\Contracts\FooAuthServiceContract;
use External\Foo\Auth\AuthWS;
use External\Foo\Exceptions\AuthenticationFailedException;

class FooAuthService extends AuthService implements FooAuthServiceContract
{
    public function __construct()
    {
        $this->auth = new AuthWS();
    }

    /**
     * @throws AuthException
     */
    public function login(string $login, string $password): string
    {
        try {
            $this->auth->authenticate($login, $password);
            return $this->createJWT($login);
        } catch (AuthenticationFailedException $e) {
            throw new AuthException();
        }
    }
}