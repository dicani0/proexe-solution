<?php

namespace App\Http\Aggregators;

use App\Exceptions\DataSourceException;
use App\Http\Services\Movie\Contracts\BarMovieServiceContract;
use App\Http\Services\Movie\Contracts\BazMovieServiceContract;
use App\Http\Services\Movie\Contracts\FooMovieServiceContract;
use Exception;
use Illuminate\Support\Facades\Cache;

class MovieAggregator
{
    protected array $services;

    public function __construct(
        FooMovieServiceContract $fooMovieService,
        BarMovieServiceContract $barMovieService,
        BazMovieServiceContract $bazMovieService
    )
    {
        $this->services = [
            $fooMovieService,
            $barMovieService,
            $bazMovieService
        ];
    }

    public function getAllTitles(): array
    {
        // TTL could be set in the config file
        return Cache::remember('all_movies', 60, function () {
            $titles = [];
            $error = false;

            foreach ($this->services as $service) {
                    try {
                        $titles = array_merge($titles, $service->getTitles());
                    } catch (Exception $e) {
                        $error = true;
                    }
            }

            if ($error) {
                throw new DataSourceException();
            }

            return $titles;
        });
    }
}