<?php

namespace App\Jobs;

use App\Models\Fave;
use App\Models\Language;
use App\Models\Meet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class ClassResultJob6 implements ShouldQueue
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

        $meets=Meet::where('status','down')->where('model','not_free')->whereNull('pair')->get();
        foreach ($meets as $meet){
            // Log::info('21');
            $teacher=User::find($meet->user_id);
            if ($meet->status=='down'){
                $bill=$meet->bill()->first();
                $amount=$bill->amount;
                $com=$bill->com;
                if ($bill->count>0){
                    $unit_price=($amount/$bill->count)-$com;
                }else{
                    $unit_price=($amount-$com);
                }
                $unit_com=$bill->com;
                $newBill_teacher = $bill->replicate();
                $newBill_teacher->user_id = $teacher->id; // the new project_id
                $newBill_teacher->com = 0; // the new project_id
                $newBill_teacher->type = 'deposit_teacher'; // the new project_id
                $newBill_teacher->remain = $unit_price+$teacher->total_cash(); // the new project_id
                $newBill_teacher->amount = $unit_price; // the new project_id
                $newBill_teacher->save();
                $teacher->change_cash(    $newBill_teacher->type,$unit_price);

                $admin=User::where('level','admin')->first();
                $newBill_admin = $bill->replicate();
                $newBill_admin->user_id = $admin->id; // the new project_id
                $newBill_admin->com = 0; // the new project_id
                $newBill_admin->type = 'site_share'; // the new project_id
                $newBill_admin->remain = $unit_com +$admin->total_cash(); // the new project_id
                $newBill_admin->amount = $unit_com; // the new project_id
                $newBill_admin->save();
                $admin->change_cash(    $newBill_admin->type, $unit_com);
            }

            $meet->update(['status'=>'passed']);
            if ($meet->type !='free'){
                $new_meet= $teacher->meets()->whereModel('not_free')->whereStart(Carbon::parse($meet->start)->addMinutes(30))->first();
                $new_meet->update(['status'=>'passed']);
            }

        }
        foreach ($meets as $meet){
            Log::info('21');
            $teacher=User::find($meet->user_id);
            if ($meet->status=='down'){
                $bill=$meet->bill()->first();
                $amount=$bill->amount;
                $com=$bill->com;
                if ($bill->count>0){
                    $unit_price=($amount/$bill->count)-$com;
                }else{
                    $unit_price=($amount-$com);
                }
                $unit_com=$bill->com;
                $newBill_teacher = $bill->replicate();
                $newBill_teacher->user_id = $teacher->id; // the new project_id
                $newBill_teacher->com = 0; // the new project_id
                $newBill_teacher->type = 'deposit_teacher'; // the new project_id
                $newBill_teacher->remain = $unit_price+$teacher->total_cash(); // the new project_id
                $newBill_teacher->amount = $unit_price; // the new project_id
                $newBill_teacher->save();
                $teacher->change_cash(    $newBill_teacher->type,$unit_price);

                $admin=User::where('level','admin')->first();
                $newBill_admin = $bill->replicate();
                $newBill_admin->user_id = $admin->id; // the new project_id
                $newBill_admin->com = 0; // the new project_id
                $newBill_admin->type = 'site_share'; // the new project_id
                $newBill_admin->remain = $unit_com +$admin->total_cash(); // the new project_id
                $newBill_admin->amount = $unit_com; // the new project_id
                $newBill_admin->save();
                $admin->change_cash(    $newBill_admin->type, $unit_com);
            }

            $meet->update(['status'=>'passed']);
            if ($meet->type !='free'){
                $new_meet= $teacher->meets()->whereModel('not_free')->whereStart(Carbon::parse($meet->start)->addMinutes(30))->first();
                $new_meet->update(['status'=>'passed']);
            }

        }

    }
}
