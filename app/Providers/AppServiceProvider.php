<?php

namespace App\Providers;

use App\Http\Services\Auth\BarAuthService;
use App\Http\Services\Auth\BazAuthService;
use App\Http\Services\Auth\FooAuthService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
