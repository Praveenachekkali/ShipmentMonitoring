<?php
namespace App\Http\Controllers;

use App\Services\TemperatureDeviationEvaluationService;
use Illuminate\Http\Request;

class TemperatureDeviationEvaluationController extends Controller
{
    public function evaluateTemperatureDeviation(Request $request)
    {
        $shipmentId = $request->input('shipment_id');
        $temperatureDeviationEvaluationService = new TemperatureDeviationEvaluationService();
        $temperatureDeviation = $temperatureDeviationEvaluationService->evaluateTemperatureDeviation($shipmentId);
        //return response()->json(['message' => $temperatureDeviation]);
        //if($shipmentStatus == 'Temperature excursion detected'){ //Send Real time update if Temperature excursion detected
        //    return to_route('shipment.sendRealTimeUpdate');
        //}
        return response()->json([
            'shipment_id' => $shipmentId,
            'temperature_deviation' => $temperatureDeviation,
        ]);
    }
}