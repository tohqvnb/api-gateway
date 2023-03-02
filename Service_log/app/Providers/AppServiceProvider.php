<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LogService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LogService::class, function ($app) {
        return new LogService();
    });
    }
}
