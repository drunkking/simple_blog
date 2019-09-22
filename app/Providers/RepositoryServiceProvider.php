<?php

namespace App\Providers;

use App\Repositories\PostRepository;
use App\Repositories\Interfaces\PostRepositoryInterface;

use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PostRepositoryInterface::class, 
            PostRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class, 
            CategoryRepository::class
        );
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
