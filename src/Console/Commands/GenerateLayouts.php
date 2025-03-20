<?php

namespace a3stic0de\LayoutsUI\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateLayouts extends Command
{
    protected $signature = 'layouts:generate';

    protected $description = 'Generate layout views';

    public function handle()
    {
        $sourcePath = __DIR__ . '/../../../src/Views/layout';
        $destinationPath = resource_path('views/layouts');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        File::copyDirectory($sourcePath, $destinationPath);

        $this->info('Layouts generated successfully!');
    }
}
