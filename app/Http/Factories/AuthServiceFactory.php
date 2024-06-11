<?php

namespace App\Http\Factories;

use App\Exceptions\InvalidSystemException;
use App\Http\Services\Auth\Contracts\AuthServiceContract;
use App\Http\Services\Auth\Contracts\BarAuthServiceContract;
use App\Http\Services\Auth\Contracts\BazAuthServiceContract;
use App\Http\Services\Auth\Contracts\FooAuthServiceContract;

class AuthServiceFactory
{

    const MAP = [
        'FOO' => FooAuthServiceContract::class,
        'BAR' => BarAuthServiceContract::class,
        'BAZ' => BazAuthServiceContract::class,
    ];

    /**
     * @throws InvalidSystemException
     */
    public static function make(?string $system): AuthServiceContract
    {
        if (!array_key_exists($system, self::MAP) || !interface_exists(self::MAP[$system])) {
            throw new InvalidSystemException();
        }

        $service = self::MAP[$system];

        if (!is_subclass_of($service, AuthServiceContract::class)) {
            throw new InvalidSystemException();
        }

        return app(self::MAP[$system]);
    }
}