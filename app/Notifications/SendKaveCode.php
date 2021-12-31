<?php

namespace App\Notifications;

use App\Notifications\channels\KaveCode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendKaveCode extends Notification
{

    use Queueable;
    public $code1;
    public $code2;
    public $code3;
    public $code4;
    public $code5;
    public $template;
    public $mobile;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mobile,$template,$code1,$code2,$code3, $code4=null,$code5=null)
    {
        $this->code1=$code1;
        $this->code2=$code2;
        $this->code3=$code3;
        $this->code4=$code4;
        $this->code5=$code5;
        $this->template=$template;
        $this->mobile=$mobile;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [KaveCode::class];
    }


    public function to_kave_code(){
        return [
            'code1'=>$this->code1,
            'code2'=>$this->code2,
            'code3'=>$this->code3,
            'code4'=>$this->code4,
            'code5'=>$this->code5,
            'template'=>$this->template,
            'mobile'=>$this->mobile
        ];
    }


}
