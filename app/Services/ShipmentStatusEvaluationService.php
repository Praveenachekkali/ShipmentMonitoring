<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ShipmentStatusEvaluationService
{
    public function evaluateShipmentStatus($deviceId)
    {
        // Get shipment data
        $shipmentData = DB::table('shipments')->where('device_id', $deviceId)->first();
        
        //dd($shipmentData);//logs
        //Check if data exists
        if(empty($shipmentData))
        {
            return 'Shipment not found';
        }
        // Calculate shipment duration
        $shipmentDuration = (strtotime($shipmentData->timestamp) - strtotime($shipmentData->created_at)) / 86400;
        //dd($shipmentDuration);
        // Evaluate shipment status
        if($shipmentDuration < 0) return 'Already Delivered, shipment_id: ' . $shipmentData->shipment_id;
        if ($shipmentDuration > 2) {
            return 'delayed Delivery, shipment_id: ' . $shipmentData->shipment_id;
        } else {
            return 'on-time Delivery, shipment_id: ' . $shipmentData->shipment_id;
        }
    }
}