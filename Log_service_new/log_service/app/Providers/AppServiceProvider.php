<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\OAuth2\Server\Repositories\ClientRepositoryInterface;
use App\Repositories\ClientRepository;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
