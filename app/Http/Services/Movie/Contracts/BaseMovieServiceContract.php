<?php

namespace App\Http\Services\Movie\Contracts;

interface BaseMovieServiceContract
{
    public function getTitles(): array;
}