<?php

namespace App\Notifications;

use App\Models\AcademicActivity;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;

class AcademicActivityReleased extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public AcademicActivity $academic_activity)
    {
        //
    }

    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title('Academic Activity Released!')
            ->icon('/logo.png')
            ->body('New Academic Activity has ben Released!')
            ->action('View Academic Activity', route('web.student.academic_activity.list'))
            ->tag('academic_activity')
            ->renotify()
            ->data($this->academic_activity->toArray())
            ->options(['TTL' => 1000]);
        // ->badge()
        // ->dir()
        // ->image()
        // ->lang()
        // ->requireInteraction()
        // ->vibrate()
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->academic_activity->toArray();
    }
}
