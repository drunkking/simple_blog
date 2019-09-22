<?php

namespace App\Providers;

use App\Repositories\PostRepository;
use App\Repositories\Interfaces\PostRepositoryInterface;

use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

use App\Repositories\TagRepository;
use App\Repositories\Interfaces\TagRepositoryInterface;

use App\Repositories\HomePageRepository;
use App\Repositories\Interfaces\HomePageRepositoryInterface;

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

        $this->app->bind(
            TagRepositoryInterface::class, 
            TagRepository::class
        );

        $this->app->bind(
            HomePageRepositoryInterface::class, 
            HomePageRepository::class
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
