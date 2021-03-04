<?php

namespace App\Providers;

use App\Models\Collaborator;
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
        $this->app->singleton('App\Models\Example', function () { // singleton (return same instance everytime)
            $collaborator = new Collaborator();
            $foo = 'foobar';
        
            return new Example($collaborator, $foo);
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
