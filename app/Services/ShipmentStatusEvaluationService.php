<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ShipmentStatusEvaluationService
{
    public function evaluateShipmentStatus($shipmentId)
    {
        // Get shipment data
        $shipmentData = DB::table('shipments')->where('shipment_id', $shipmentId)->first();
        
        //dd($shipmentData);//logs
        //Check if data exists
        if(empty($shipmentData))
        {
            return 'Shipment not found';
        }
        // Calculate shipment duration
        $shipmentDuration = (strtotime($shipmentData->timestamp) - strtotime($shipmentData->created_at)) / 86400;

        // Evaluate shipment status
        if ($shipmentDuration > 2) {
            return 'delayed Delivery';
        } else {
            return 'on-time Delivery';
        }
    }
}