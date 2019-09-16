<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
/*
 * This Slack-Notification oriented by following tutorial
 * https://www.cloudways.com/blog/laravel-notification-system-on-slack-and-email/
 * ...good luck!
 * */
class slackNotification extends Notification
{
    use Queueable;


    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->content('A new visitor has visited to your application');
    }


}
