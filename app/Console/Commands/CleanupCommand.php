<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'example:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleanup old data from the database';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Your cleanup logic here
        $this->info('Cleanup completed successfully!');
    }
}
