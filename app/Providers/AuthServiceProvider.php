<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Http\Services\Auth\BarAuthService;
use App\Http\Services\Auth\BazAuthService;
use App\Http\Services\Auth\FooAuthService;
use External\Bar\Auth\LoginService;
use External\Baz\Auth\Authenticator;
use External\Foo\Auth\AuthWS;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Binding interfaces to their respective implementations
        $this->app->bind('App\Http\Services\Auth\Contracts\BarAuthServiceContract', function (Application $app) {
            return new BarAuthService($app->make(LoginService::class));
        });

        $this->app->bind('App\Http\Services\Auth\Contracts\BazAuthServiceContract', function (Application $app) {
            return new BazAuthService($app->make(Authenticator::class));
        });

        $this->app->bind('App\Http\Services\Auth\Contracts\FooAuthServiceContract', function (Application $app) {
            return new FooAuthService($app->make(AuthWS::class));
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
