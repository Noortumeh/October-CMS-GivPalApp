<?php
namespace Noor\Content\Providers;

use Illuminate\Support\ServiceProvider;
use Noor\Content\Services\SectionService;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton(SectionService::class, function ($app) {
            return new SectionService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
    }
}
