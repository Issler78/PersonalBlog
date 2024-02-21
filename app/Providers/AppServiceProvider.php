<?php

namespace App\Providers;

use App\Repositories\Eloquent\PostEloquentORM;
use App\Repositories\Interfaces\PostRepositoryORMInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryORMInterface::class, PostEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
