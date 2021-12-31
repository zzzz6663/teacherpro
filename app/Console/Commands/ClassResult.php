<?php

namespace App\Console\Commands;

use App\Jobs\ClassResultJob6;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ClassResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ClassResult';

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
        // Log::info('1212');
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ClassResultJob6::dispatch();
        // Log::info('14');
    }
}
