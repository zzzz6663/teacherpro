<?php


namespace App\Notifications\channels;


use App\Notifications\SendSms;
use App\User;
use Illuminate\Notifications\Notification;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar;
class KaveCode
{

    const FORMAT = "%s = %s <br/>";
    private function format($result)
    {
        if($result){
//            echo "<pre>";
            foreach($result as $r){
//                echo sprintf(self::FORMAT, "messageid", $r->messageid);
//                echo sprintf(self::FORMAT, "message", $r->message);
//                echo sprintf(self::FORMAT, "status", $r->status);
//                echo sprintf(self::FORMAT, "statustext", $r->statustext);
//                echo sprintf(self::FORMAT, "sender", $r->sender);
//                echo sprintf(self::FORMAT, "receptor", $r->receptor);
//                echo sprintf(self::FORMAT, "date", $r->date);
//                echo sprintf(self::FORMAT, "cost", $r->cost);
//                echo "<hr/>";


            }
//            echo "</pre>";
        }
    }

    public function send($notifiable,Notification $notification){
        if (!method_exists($notification,'to_kave_code')){
            throw  new \Exception('sms not found!!!!');
        }
        $template=$notification->to_kave_code()['template'];
        $token=$notification->to_kave_code()['code1'];
        $token2=$notification->to_kave_code()['code2'];
        $token3=$notification->to_kave_code()['code3'];
        $token4=$notification->to_kave_code()['code4'];
        $token5=$notification->to_kave_code()['code5'];
        $receptor=$notification->to_kave_code()['mobile'];
        $admin=auth()->user();
        try{
//            $sender = "10008663";
//            $message = $messagey;
//            $receptor = $mobile;
//            $result = Kavenegar::Send($sender,$receptor,$message);


//            $receptor =  "";
//            $template =  "";
            $type =  "sms";
//            $token =  "";
//            $token2 =  "";
//            $token3 =  "";
            $token = str_replace(' ', '', $token);
            $result = Kavenegar::VerifyLookup($receptor,($token),$token2,$token3,$template,$type,$token4,$token5);
            $this->format($result);



        }
        catch(ApiException $e){
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            // throw $e ;
        }
        catch(HttpException $e){
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            // throw $e ;
        }

    }
}
