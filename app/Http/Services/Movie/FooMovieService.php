<?php

namespace App\Http\Services\Movie;

use App\Http\Services\Movie\Contracts\FooMovieServiceContract;
use External\Foo\Exceptions\ServiceUnavailableException;
use External\Foo\Movies\MovieService;

class FooMovieService extends BaseBaseMovieService implements FooMovieServiceContract
{
    protected MovieService $service;

    public function __construct()
    {
        $this->service = new MovieService();
    }

    /**
     * @throws ServiceUnavailableException
     */
    protected function fetchTitles(): array
    {
        return $this->service->getTitles();
    }
}