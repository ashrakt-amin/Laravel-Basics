<?php

namespace App\Listeners;

use App\Mail\createPost;
use App\Events\CreateUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailCreateUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateUser  $event
     * @return void
     */
    public function handle(CreateUser $post)
    {
        $user =Auth::user();
       Mail::to("$user->email")->send(new createPost($post));

    }
}
