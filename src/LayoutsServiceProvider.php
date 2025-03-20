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
        $zipPath = public_path('assets.zip');
        $extractPath = public_path('assets');

        if (File::exists($zipPath)) {
            $zip = new ZipArchive;
            if ($zip->open($zipPath)) {
                if (!File::exists($extractPath)) {
                    File::makeDirectory($extractPath, 0755, true);
                }

                $zip->extractTo($extractPath);
                $zip->close();

                File::delete($zipPath); // Hapus file zip setelah diekstrak

                $this->info('Assets extracted successfully to ' . $extractPath);
            } else {
                $this->error('Failed to open assets.zip');
            }
        } else {
            $this->error('assets.zip not found in public folder.');
        }
    }
}