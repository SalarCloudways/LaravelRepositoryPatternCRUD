<?php

namespace App\Providers;

use App\Repositories\BookRepository;
use App\Repositories\PostRepository;
use App\Repositories\AuthorRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\BookInterface;
use App\Repositories\Interfaces\PostInterface;
use App\Repositories\Interfaces\AuthorInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthorInterface::class, AuthorRepository::class);
        $this->app->bind(PostInterface::class, PostRepository::class);
        $this->app->bind(BookInterface::class, BookRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
