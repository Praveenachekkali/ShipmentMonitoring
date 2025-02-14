<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;

class TemperatureDeviationEvaluationService
{
    public function evaluateTemperatureDeviation($shipmentId): string
    {
        // Get shipment data
        $shipmentData = DB::table('shipments')->where('shipment_id', $shipmentId)->first();

        // Evaluate temperature deviation
        if (abs($shipmentData->temperature) > 5) {
            return 'Temperature excursion detected';
        } else {
            return 'Temperature within normal range';
        }
    }
}