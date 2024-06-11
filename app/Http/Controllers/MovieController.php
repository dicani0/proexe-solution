<?php

namespace App\Http\Controllers;

use App\Exceptions\DataSourceException;
use App\Http\Aggregators\MovieAggregator;
use App\Http\Responses\FailureResponse;
use App\Http\Responses\MovieCollectionResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MovieController extends Controller
{
    public function __construct(private MovieAggregator $aggregator)
    {
    }

    public function getTitles(Request $request): Response
    {
        try {
            $titles = $this->aggregator->getAllTitles();
        } catch (DataSourceException $e) {
            return (new FailureResponse())->toResponse($request);
        }

        return (new MovieCollectionResponse($titles))->toResponse($request);
    }
}
