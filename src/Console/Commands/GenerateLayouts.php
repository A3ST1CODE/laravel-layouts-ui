<?php

namespace a3stic0de\LayoutsUI\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use ZipArchive;

class GenerateLayouts extends Command
{
    protected $signature = 'layouts:generate';

    protected $description = 'Generate layout views and extract assets';

    public function handle()
    {
        // Generate views
        $sourcePath = __DIR__ . '/../../../src/Views/layout';
        $destinationPath = resource_path('views/layouts');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        File::copyDirectory($sourcePath, $destinationPath);

        $this->info('Layouts generated successfully!');

        // Extract assets
        $zipPath = __DIR__ . '/../../../src/assets.zip';
        $extractPath = public_path('assets');

        if (File::exists($zipPath)) {
            $zip = new ZipArchive;
            if ($zip->open($zipPath)) {
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
