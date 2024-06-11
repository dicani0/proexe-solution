<?php

namespace App\Http\Factories;

use App\Http\Services\Movie\Contracts\BarMovieServiceContract;
use App\Http\Services\Movie\Contracts\BaseMovieServiceContract;
use App\Http\Services\Movie\Contracts\BazMovieServiceContract;
use App\Http\Services\Movie\Contracts\FooMovieServiceContract;

class MovieServiceFactory
{
    public static function make(string $system): ?BaseMovieServiceContract
    {
        return match ($system) {
            'FOO' => app(FooMovieServiceContract::class),
            'BAR' => app(BarMovieServiceContract::class),
            'BAZ' => app(BazMovieServiceContract::class),
            default => null,
        };
    }
}