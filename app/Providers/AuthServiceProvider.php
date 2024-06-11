<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Http\Services\Auth\BarAuthService;
use App\Http\Services\Auth\BazAuthService;
use App\Http\Services\Auth\FooAuthService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Binding interfaces to their respective implementations
        $this->app->bind('App\Http\Services\Auth\Contracts\BarAuthServiceContract', function ($app) {
            return new BarAuthService();
        });

        $this->app->bind('App\Http\Services\Auth\Contracts\BazAuthServiceContract', function ($app) {
            return new BazAuthService();
        });

        $this->app->bind('App\Http\Services\Auth\Contracts\FooAuthServiceContract', function ($app) {
            return new FooAuthService();
        });
    }


    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
