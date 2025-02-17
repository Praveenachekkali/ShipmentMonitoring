<?php

namespace App\Queue;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusNotificationQueue implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle()
    {
        // Send a notification to the user
        echo "Sent Notification to the User related to Updated Shipment Status!
";
    }
}