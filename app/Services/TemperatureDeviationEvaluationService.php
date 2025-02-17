<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;

class TemperatureDeviationEvaluationService
{
    public function evaluateTemperatureDeviation($deviceId): string
    {
        // Get shipment data
        //dd($deviceId);
        //$shipmentData = DB::table('shipments')->where('device_id', $deviceId)->first();
        $shipmentData = DB::table('shipments')->where('device_id', $deviceId)->first();
        //dd($shipmentData);
        //Check if data exists
        if(empty($shipmentData))
        {
            return 'Shipment not found';
        }

        // Evaluate temperature deviation
        if (abs($shipmentData->temperature) > 5) {
            return 'Temperature excursion detected, shipment_id: ' . $shipmentData->shipment_id;
        } else {
            return 'Temperature within normal range, shipment_id: ' . $shipmentData->shipment_id;
        }
    }
}