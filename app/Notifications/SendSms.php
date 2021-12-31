<?php

namespace App\Notifications;

use App\Notifications\channels\KaveSms;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSms extends Notification
{
    use Queueable;
    public $txt;
    public $mobile;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($txt,$mobile  )
    {
      $this->txt=$txt;
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
        return [KaveSms::class];
    }


    public function to_kave_sms(){
        return [
            'text'=>$this->txt,
            'mobile'=>$this->mobile,
        ];
    }

}
