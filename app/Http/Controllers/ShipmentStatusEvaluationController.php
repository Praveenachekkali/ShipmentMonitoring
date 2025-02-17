<?php
namespace App\Http\Controllers;

use App\Services\ShipmentStatusEvaluationService;
use Illuminate\Http\Request;
use App\Jobs\StatusUpdate;

class ShipmentStatusEvaluationController extends Controller
{
    public function evaluateShipmentStatus(Request $request)
    {
        $deviceId = $request->input('device_id');
        //dd($deviceId);
        $shipmentStatusEvaluationService = new ShipmentStatusEvaluationService();
        $shipmentStatus = $shipmentStatusEvaluationService->evaluateShipmentStatus(deviceId: $deviceId);
        $pos = stripos($shipmentStatus, 'delayed Delivery');
        //dd($shipmentStatus);
        //dd($pos);
        if($pos !== false){
            $status = 'delayed Delivery';
            //dd($status);
            StatusUpdate::dispatch();
        }
        return response()->json([
            'device_id' => $deviceId,
            'shipment_status' => $shipmentStatus,
        ]);
    }
}