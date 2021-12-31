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

class BeforeHourJob implements ShouldQueue
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
        $meets=Meet::where('model','not_free')->where('status','reserved')->where('pair',null)->where('start','>',Carbon::now())->latest()->get();
        if ($meets){
            foreach ($meets as $meet){
                $teacher=$meet->user;
                $student=User::find($meet->student_id);
                $start=Carbon::parse($meet->start);
                $diff=$start->diffInMinutes(Carbon::now());
                if ($diff<=60){
                    if ($teacher->save_attr($meet->id.'_udeer_60',Carbon::now()->toDateTime())){
                        $student->sms_code('hour-one-remain-teacher',$student->name??'دانشجو','','',$teacher->name??"استاد",'');
                        $teacher->sms_code('hour-one-remain-student',$teacher->name??'استاد','','',$student->name??"دانشجو",'');
                    }
                }
            }
        }
    }
}
