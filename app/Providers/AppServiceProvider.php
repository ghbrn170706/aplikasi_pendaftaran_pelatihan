<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


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
        // Share profil ke semua view
        View::composer('*', function ($view) {
            $user = Auth::user();
            $profil = $user ? $user->profil : null;
            $view->with('profil', $profil);
        });
    
        // Socialite Microsoft
        \Laravel\Socialite\Facades\Socialite::extend('microsoft', function ($app) {
            $config = $app['config']['services.microsoft'];
            return new \SocialiteProviders\Microsoft\Provider($app['request'], $config);
        });
    
        // Socialite Apple
        \Laravel\Socialite\Facades\Socialite::extend('apple', function ($app) {
            $config = $app['config']['services.apple'];
            return new \SocialiteProviders\Apple\Provider($app['config'], $config);
        });
    }
    
}