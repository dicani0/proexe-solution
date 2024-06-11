<?php

namespace App\Providers;

use App\Http\Services\Movie\BarMovieService;
use App\Http\Services\Movie\BazMovieService;
use App\Http\Services\Movie\FooMovieService;
use Illuminate\Support\ServiceProvider;

class MovieServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Http\Services\Movie\Contracts\FooMovieServiceContract', function ($app) {
            return new FooMovieService();
        });

        $this->app->bind('App\Http\Services\Movie\Contracts\BarMovieServiceContract', function ($app) {
            return new BarMovieService();
        });

        $this->app->bind('App\Http\Services\Movie\Contracts\BazMovieServiceContract', function ($app) {
            return new BazMovieService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
