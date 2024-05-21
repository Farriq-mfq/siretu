<?php

namespace App\Console\Commands;

use App\Models\OutBox;
use Illuminate\Console\Command;

class OutboxClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'outbox:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'outbox:clear';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        OutBox::truncate();
    }
}
