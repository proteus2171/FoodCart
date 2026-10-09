<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
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
    public function boot()
    {
        View::prependNamespace(
            'igniter-orange',
            resource_path('views/vendor/igniter-orange')
        );

        // TastyIgniter registers its stock homepage after routes/web.php.
        // Register our prototype landing page after all providers have booted
        // so '/' resolves to FoodCart instead of the stock location-search page.
        $this->app->booted(function (): void {
            Route::view('/', 'foodcart.home')->name('foodcart.home.override');
        });
    }
}
