<?php

namespace App\Http\Services\Movie;

use App\Http\Services\Movie\Contracts\BaseMovieServiceContract;
use Exception;

abstract class BaseBaseMovieService implements BaseMovieServiceContract
{
    abstract protected function fetchTitles(): array;

    /**
     * @throws Exception
     */
    public function getTitles(): array
    {
        return retry(5, function () {
            return $this->fetchTitles();
        });
    }
}