<?php

namespace Airondev\pCloud;

use Illuminate\Support\ServiceProvider;

class pCloudServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/app.cred' => config_path('app.cred'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('laravelpcloud', function ($app) {

            return new Airondev\pCloud\App($app->make("request"));

        });

        $this->app->alias('laravelpcloud', "Airondev\pCloud\App");
    }

    /**
    * Get the services provided by the provider
    *
    * @return array
    */
    public function provides()
    {
        return ['laravelpcloud'];
    }
}
