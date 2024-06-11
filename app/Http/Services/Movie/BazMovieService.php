<?php

namespace App\Http\Services\Movie;

use App\Http\Services\Movie\Contracts\BazMovieServiceContract;
use External\Baz\Exceptions\ServiceUnavailableException;
use External\Baz\Movies\MovieService;

class BazMovieService extends BaseBaseMovieService implements BazMovieServiceContract
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
        return $this->service->getTitles()['titles'];
    }
}