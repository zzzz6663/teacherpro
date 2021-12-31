<?php


namespace App\Notifications\channels;


use App\Models\User;
use App\Notifications\SendSms;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar;
class KaveSms
{




    public function send($notifiable,Notification $notification){
        if (!method_exists($notification,'to_kave_sms')){
            throw  new \Exception('sms not found!!!!');
        }
        $messagey=$notification->to_kave_sms()['text'];
        $mobile=$notification->to_kave_sms()['mobile'];
        try{
            $user=User::whereMobile($mobile)->first();
            $messagey=str_replace('فلانی',$user->name ,$messagey);
            $sender = "10007000800200";
            $message = $messagey;
            $receptor = $mobile;
            $result = Kavenegar::Send($sender,$receptor,$message);


            if($result){
                foreach($result as $r){
//                    echo "messageid = $r->messageid";
//                    echo "message = $r->message";
//                    echo "status = $r->status";
//                    echo "statustext = $r->statustext";
//                    echo "sender = $r->sender";
//                    echo "receptor = $r->receptor";
//                    echo "date = $r->date";
//                    echo "cost = $r->cost";


                }

            }
        }
        catch(ApiException $e){
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            throw $e ;
        }
        catch(HttpException $e){
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            throw $e ;
        }

    }
}
