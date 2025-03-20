<?php

namespace a3stic0de\LayoutsUI;

use Illuminate\Support\ServiceProvider;
use a3stic0de\LayoutsUI\Console\Commands\GenerateLayouts;

class LayoutsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateLayouts::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/Views/layout' => resource_path('views/layouts'),
        ], 'layouts');
    }

    public function register()
    {
        //
    }
}
