<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendDailyMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily message send to the users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        echo "Hii i am from schedule";
    }
}
