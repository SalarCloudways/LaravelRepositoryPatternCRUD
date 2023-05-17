<?php

namespace App\Providers;

use App\Repositories\AuthorRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\AuthorInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthorInterface::class, AuthorRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
