<?php

namespace App\Providers;

use App\Jobs\ProcessArticle;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(RepositoryServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('title', 'My Simple App');
        $this->app->bindMethod([ProcessArticle::class, 'handle'], function (ProcessArticle $job, Application $app) {
            return $job->handle($app->make(User::class));
        });
    }
}
