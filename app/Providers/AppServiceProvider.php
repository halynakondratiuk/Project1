<?php

namespace App\Providers;

use App\Repositories\EloquentTask;
use App\Repositories\NotesRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('\App\Repositories', EloquentTask::class);
        $this->app->singleton('App\Repositories', NotesRepository::class);
    }
}
