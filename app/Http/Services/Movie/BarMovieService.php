<?php

namespace App\Http\Services\Movie;

use App\Http\Services\Movie\Contracts\BarMovieServiceContract;
use External\Bar\Exceptions\ServiceUnavailableException;
use External\Bar\Movies\MovieService;

class BarMovieService extends BaseBaseMovieService implements BarMovieServiceContract
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
        $titles = $this->service->getTitles();

        return array_map(function (array $movie) {
            return $movie['title'];
        }, $titles['titles']);
    }
}