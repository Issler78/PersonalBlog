<?php

namespace App\Providers;

use App\Repositories\Eloquent\{PostEloquentORM, ReplyEloquentORM};
use App\Repositories\Interfaces\{PostRepositoryORMInterface, ReplyRepositoryORMInterface};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryORMInterface::class, PostEloquentORM::class);
        $this->app->bind(ReplyRepositoryORMInterface::class, ReplyEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
