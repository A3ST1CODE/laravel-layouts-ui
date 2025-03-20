<?php

namespace a3stic0de\LayoutsUI;

use Illuminate\Support\ServiceProvider;
use a3stic0de\LayoutsUI\Console\Commands\GenerateLayouts;
use Illuminate\Support\Facades\File;
use ZipArchive;

class LayoutsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish views
        $this->publishes([
            __DIR__.'/Views/layout' => resource_path('views/layouts'),
        ], 'layouts');

        // Publish and extract assets
        $this->publishes([
            __DIR__.'/assets.zip' => public_path('assets.zip'),
        ], 'assets');

        // Extract assets if running in console
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateLayouts::class,
            ]);

            $this->extractAssets();
        }
    }

    public function register()
    {
        //
    }

    protected function extractAssets()
    {
        $zipPath = __DIR__.'/assets.zip';
        $extractPath = public_path('assets');

        if (File::exists($zipPath)) {
            $zip = new ZipArchive;
            if ($zip->open($zipPath) {
                $zip->extractTo($extractPath);
                $zip->close();
                $this->info('Assets extracted successfully to ' . $extractPath);
            } else {
                $this->error('Failed to open assets.zip');
            }
        } else {
            $this->error('assets.zip not found in package.');
        }
    }
}