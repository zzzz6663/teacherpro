<?php

namespace App\Console\Commands;

use App\Jobs\BeforeHourJob;
use Illuminate\Console\Command;

class BeforeHour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:BeforeHour';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       BeforeHourJob::dispatch();
    }
}
