<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ArticleDailyView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:daily-view {user?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sum views of articles daily';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $username = $this->argument('user') ?? Null;

        if (!$username) {
            $this->warn("username option is empty");
            return;
        }

        $this->info("We calculate for {$username} daily article views");
    }
}
