<?php
namespace App\Services;

//use Beanstalkd\Beanstalkd;

class RealTimeUpdatesService
{
    public function sendRealTimeUpdate($shipmentId)
    {
        // Create a new Beanstalkd client
        //$beanstalkd = new Beanstalkd('localhost', 11300);

        // Put a job into the queue
        //$beanstalkd->put('shipment_update', $shipmentId);
    }
}