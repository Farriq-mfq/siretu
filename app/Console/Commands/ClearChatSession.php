<?php

namespace App\Console\Commands;

use App\Events\NotifWa;
use App\Models\SesiPesan;
use Illuminate\Console\Command;

class ClearChatSession extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chatSession:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear session of chat';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SesiPesan::truncate();
    }
}
