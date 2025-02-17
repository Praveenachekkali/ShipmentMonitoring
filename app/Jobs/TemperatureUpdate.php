<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Queue\TemperatureNotificationQueue;

class TemperatureUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        // This is where the job will be executed
        echo "Updated Temperature Info!
";
        // Create a new notification queue
        //$notificationQueue = new TemperatureNotificationQueue();

        // Push the notification queue to the RabbitMQ queue
        //Connector::create()->queue('notifications', $notificationQueue);
    }
}