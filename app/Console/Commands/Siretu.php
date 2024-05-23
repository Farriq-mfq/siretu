<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class Siretu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siretu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup siretu application';
    protected $tasks = ['clear', 'setupFrontend', 'setupBackend', 'setupTemplateExcel'];
    public function clear()
    {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        // $this->info("\nClearing");
    }

    public function setupFrontend()
    {
        // step 1: frontend setup
        \exec('npm install', $npminstall, $resI);
        \exec('npm run build', $npmbuild, $resB);
        if ($resI != 0) {
            $this->error('npm install failed');
        }
        if ($resB != 0) {
            $this->error('npm build failed');
        }

        // $this->info("\n1. frontend setup successful");

    }
    public function setupBackend()
    {
        // step 2: backend setup
        \exec('cp .env.example .env');
        \exec('composer install', $composer, $resComposer);
        if ($resComposer != 0) {
            $this->error('composer install failed');
        }

        Artisan::call('key:generate');
        Artisan::call('storage:link');
        // $this->info("\n2. backend setup successful");
    }
    public function setupTemplateExcel()
    {
        // step 3 : excel template setup
        $allFiles = File::allFiles(base_path('template'));
        foreach ($allFiles as $file) {
            Storage::disk('public')->put(basename($file->getPathname()), file_get_contents($file->getPathname()));
        }
        // $this->info("\n3. excel template setup successful");
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $output = new ConsoleOutput();
        $progressBar = new ProgressBar($output, count($this->tasks));

        $progressBar->start();
        foreach ($this->tasks as $task) {
            $this->{$task}();
            $progressBar->advance();
        }

        $progressBar->finish();
        $this->info("\nSetup siretu berhasil!");

    }
}
