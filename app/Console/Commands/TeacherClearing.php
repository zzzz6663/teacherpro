<?php

namespace App\Console\Commands;

use App\Jobs\TeacherClearingJob;
use Illuminate\Console\Command;

class TeacherClearing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:TeacherClearing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command TeacherClearingJob';

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
    public function han6dle()
    {
        TeacherClearingJob::dispatch();
    }
}
