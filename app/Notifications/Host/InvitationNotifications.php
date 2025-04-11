<?php

namespace App\Notifications\Host;

use Illuminate\Support\Arr;
use Illuminate\Bus\Queueable;
use App\Mail\WeddingInvitations;
use App\Notifications\Channels\MSG91EmailChannel;
use App\Notifications\Channels\MSG91SmsChannel;
use App\Notifications\Channels\MSG91WatsappChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;

class InvitationNotifications extends Notification
{
    use Queueable;

    public $host, $profile, $invitation, $status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($host, $invitation, $status)
    {
        //dd($invitation);
        $this->afterCommit();
        $this->host = $host;
        $this->profile = $host->profile;
        $this->invitation = $invitation;
        $this->status = $status;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //dd('abc');
        //return ['database', MSG91EmailChannel::class];
        //return ['database', 'mail'];
        //dd(Auth::getDefaultDriver());
        // if(Auth::getDefaultDriver() == 'web'){
        //     $user = auth()->guard('web')->user();
        //     if($user->email == $notifiable->email){
        //         return ['database', MSG91EmailChannel::class, MSG91SmsChannel::class, WebPushChannel::class];
        //     }
        // }
        return ['database', MSG91EmailChannel::class, MSG91SmsChannel::class, WebPushChannel::class];
        //return [MSG91WatsappChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // dd($notifiable->routeNotificationFor('database'));
        //return (new WeddingInvitations('http://wedding.test/login', $notifiable->name, $notifiable->email))
        //        ->to($notifiable->email);
        // return (new MailMessage)
        //             ->greeting('welcome to marriage')
        //             ->subject('New Invitation')
        //             ->line('login to view intivation using login: youremailId and password:123')
        //             ->action('login', url('/login'))
        //             ->line('Look forward to see you at the weeding!')
        //             ->line('Thanks from all of us');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'host' =>$this->host,
            'profile' => $this->profile,
            'invitation'  => $this->invitation,
            'status' => $this->status

        ];
    }

    public function toMSG91Watsapp($notifiable){
        $invi = Crypt::encrypt($this->invitation->slug);
        $mob = Crypt::encrypt($notifiable->mobile);
        return [
            'template' => 'invitation_template_v0',
            'data' => [
                ['type' => 'text', 'text' => $this->invitation->brideName],
                ['type' => 'text', 'text' => $this->invitation->groomName],
                ['type' => 'text', 'text' => date("d-m-Y", strtotime($this->invitation->startDate))],
                ['type' => 'text', 'text' => 'https://happywed.in'],
                ['type' => 'text', 'text' => 123],
                ['type' => 'text', 'text' => route('view-invitation', ['id' => $this->invitation->id, 'slug' => $invi, 'num' => $mob])],
            ]
        ];
       
    }

    public function toMSG91($notifiable)
    {
        //dd('into msdg91', $notifiable);
        //return $this->message;
        $invi = Crypt::encrypt($this->invitation->slug);
        $mob = Crypt::encrypt($notifiable->mobile);
        return [ 'data' =>[ "userName" => $notifiable->name,
           "userEmail" => $notifiable->name,
           "userPassword" => 123,
           "brideName"=> $this->invitation->brideName,
           "groomName"=> $this->invitation->groomName, "actionLink" => route('view-invitation', ['id' => $this->invitation->id, 'slug' => $invi, 'num' => $mob])], 'template' => 'Invitation_Template_Happywed',
        ];
        // return [
        //    "userName" => $notifiable->name,
        //    "brideName"=> $this->invitation->brideName,
        //    "groomName"=> $this->invitation->groomName
        // ];
    }

    public function toMSG91Sms($notifiable)
    {
        //dd('into msdg91', $notifiable);
        //return $this->message;
        $invi = Crypt::encrypt($this->invitation->slug);
        $mob = Crypt::encrypt($notifiable->mobile);
        return [ 
           "weddingDate" => date("d-m-Y", strtotime($this->invitation->startDate)),
           "password" => 123,
           "brideName"=> $this->invitation->brideName,
           "groomName"=> $this->invitation->groomName, 
           'flow_id' => '64d48fddd6fc05032c629812',
           'mobiles' => '91'.$notifiable->mobile,
           'loginLink' => 'https://happywed.co.in/login',
           'actionLink' => route('view-invitation', ['id' => $this->invitation->id, 'slug' => $invi, 'num' => $mob]),
           'short_url' => 1,
           'sender' => 'LASIEX'];
        // return [
        //    "userName" => $notifiable->name,
        //    "brideName"=> $this->invitation->brideName,
        //    "groomName"=> $this->invitation->groomName
        // ];
    }

    public function toWebPush($notifiable, $notification)
    {
        //dd($notifiable, $notification);
        return (new WebPushMessage)
            ->title('Heloooo'. $notifiable->name)
            ->icon('/assets/login/logo.png')
            ->badge('/assets/login/logo.png')
            ->body('You are invited')
            //->action('View App', 'notification_action')
            ->data(['type' => 'Invitation', 'for' => 'guest', 'sub_id' => $notifiable->pushSubscriptions, 'id' => $notifiable->id]);
            //->action('View App', 'notification_action');
    }
}
