<?php

namespace App\Providers;

use App\Jobs\ProcessJob;
use App\Services\Job\JobModifierService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bindMethod([ProcessJob::class, 'handle'], function (ProcessJob $job, Application $app) {
            return $job->handle($app->make(JobModifierService::class));
        });
    }
}
