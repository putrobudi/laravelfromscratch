<?php

namespace App\Providers;

use App\Models\Documentation\ExternalApiHelper;
use App\Models\Example;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // app()->bind('App\Models\Example', function () { write app() or $this-app
        // $this->app->bind('App\Models\Example', function () {
        // Note: why not bind('example') why bind(class) ? It's the same thing. With example, the key is shorter.
        // $this->app->singleton('App\Models\Example', function () { // singleton (return same instance everytime)
        //     $collaborator = new Collaborator();
        //     $foo = 'foobar';

        //     return new Example($collaborator, $foo);
        // });

        /* From Service Providers are the Missing Piece. */
        // if I removew this entirely, and just reference the class name in the ExampleFacade instead of key.
        // $this->app->bind('example', function() {
        //     return new Example();
        // });

        // Here is for telling Laravel what $apiKey is inside Example Constructor.
        $this->app->bind(Example::class, function () {
            return new Example('api-key-here');
        });

        $this->app->singleton(ExternalApiHelper::class, function () {
            return new ExternalApiHelper('Hello app!');
        });
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
