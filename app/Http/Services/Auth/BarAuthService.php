<?php

namespace App\Http\Services\Auth;

use App\Exceptions\AuthException;
use App\Http\Services\Auth\Contracts\BarAuthServiceContract;
use External\Bar\Auth\LoginService;
use Illuminate\Auth\AuthenticationException;

class BarAuthService extends AuthService implements BarAuthServiceContract
{
    public function __construct(protected LoginService $auth)
    {
    }

    /**
     * @throws AuthException
     */
    public function login(string $login, string $password): string
    {
        if (!$this->auth->login($login, $password)) {
            throw new AuthException();
        }

        return $this->createJWT($login);
    }
}