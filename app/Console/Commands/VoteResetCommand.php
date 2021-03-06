<?php

namespace App\Console\Commands;

use App\Jobs\VoteResetJob;
use Illuminate\Console\Command;

class VoteResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vote:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        VoteResetJob::dispatch();
    }
}
