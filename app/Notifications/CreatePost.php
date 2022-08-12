<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatePost extends Notification
{
    use Queueable;

    protected $post_id , $post_title , $user_name ;
    public function __construct($post_id , $post_title , $user_name)
    {
        $this->post_id = $post_id ;  
        $this->post_title = $post_title ;  
        $this->user_name = $user_name ;  

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            
            'user-creater'=>$this->user_name,
            'post-title'  =>$this->post_title,
            'post-id'     =>$this->post_id

        ];
    }
}
