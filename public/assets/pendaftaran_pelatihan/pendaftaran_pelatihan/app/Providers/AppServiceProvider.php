<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use SocialiteProviders\Microsoft\Provider as MicrosoftProvider;
use SocialiteProviders\Apple\Provider as AppleProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // You can register additional services here if needed
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register Microsoft driver
        Socialite::extend('microsoft', function ($app) {
            $config = $app['config']['services.microsoft'];
            return new MicrosoftProvider($app['request'], $config);
        });

        // Register Apple driver
        Socialite::extend('apple', function ($app) {
            $config = $app['config']['services.apple'];
            return new AppleProvider($app['config'], $config);
        });
    }
}