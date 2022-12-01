<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\MatterRepositoryInterface;
use App\Repositories\MatterRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() 
    {
        $this->app->bind(MatterRepositoryInterface::class, MatterRepository::class);
     }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
