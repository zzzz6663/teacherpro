<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

//        Log::info('slam3');

//        $schedule->command('queue:work --daemon')->everyMinute()->withoutOverlapping();
        $schedule->command('queue:listen')->everyMinute()->withoutOverlapping();
        // Log::info('slam18');
        $schedule->command('command:ClassResult')->everyMinute();
//        $schedule->command('command:TeacherClearing')->everyMinute();
        $schedule->command('command:SevenEveryDay')->dailyAt('7:00');
//        $schedule->command('queue:work --daemon')->everyMinute()->withoutOverlapping();
        // Log::info('slam11');



        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
