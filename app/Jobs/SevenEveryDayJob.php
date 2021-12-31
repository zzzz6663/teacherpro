<?php

namespace App\Jobs;

use App\Models\Meet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SevenEveryDayJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('seven_eveery day' );
        $meets=Meet::where('model','not_free')->where('status','reserved')->where('pair',null)->whereDate('start', Carbon::today())->distinct()->get(['user_id']);
        foreach ($meets as  $meet){
            $user =$meet->user;
            $count= $user->meets()->where('model','not_free')->where('status','reserved')->where('pair',null)->whereDate('start', Carbon::today())->count();
            $user->sms_code('start7clock',$user->name??'استاد','','',$count,'');
        }
        $meets=Meet::where('model','not_free')->where('status','reserved')->where('pair',null)->whereDate('start', Carbon::today())->distinct()->get([  'student_id']);
        foreach ($meets as  $meet){
            $user =$meet->student;
            $count= $user->smeets()->where('model','not_free')->where('status','reserved')->where('pair',null)->whereDate('start', Carbon::today())->count();
            $user->sms_code('start7clock',$user->name??'دانشجو','','',$count,'');
        }
    }
}
