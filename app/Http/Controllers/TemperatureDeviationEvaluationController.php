<?php
namespace App\Http\Controllers;

use App\Services\TemperatureDeviationEvaluationService;
use Illuminate\Http\Request;
use App\Jobs\TemperatureUpdate;


class TemperatureDeviationEvaluationController extends Controller
{
    public function evaluateTemperatureDeviation(Request $request)
    {
        $deviceId = $request->input('device_id');
        //dd($deviceId);
        $temperatureDeviationEvaluationService = new TemperatureDeviationEvaluationService();
        $temperatureDeviation = $temperatureDeviationEvaluationService->evaluateTemperatureDeviation(deviceId: $deviceId);
        //return response()->json(['message' => $temperatureDeviation]);
        $pos = stripos($temperatureDeviation, 'Temperature excursion detected');
        if($pos !== false){
            $status = 'Temperature excursion detected';
            //dd($status);
            TemperatureUpdate::dispatch();
        }
        return response()->json([
            'device_id' => $deviceId,
            'temperature_deviation' => $temperatureDeviation,
        ]);
    }
}