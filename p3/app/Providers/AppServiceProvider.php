<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
<<<<<<< HEAD
        if (env('APP_ENV') == 'production') {
=======
         if (env('APP_ENV') == 'production') {
>>>>>>> 376b489b98362dfc93e5218c5db595666170e0a3
            $url->forceScheme('https');
        }
    }
}