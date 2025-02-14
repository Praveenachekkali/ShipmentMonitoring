<?php
namespace App\Http\Controllers;

use App\Services\ShipmentStatusEvaluationService;
use Illuminate\Http\Request;

class ShipmentStatusEvaluationController extends Controller
{
    public function evaluateShipmentStatus(Request $request)
    {
        $shipmentId = $request->input('shipment_id');
        //dd($shipmentId);
        $shipmentStatusEvaluationService = new ShipmentStatusEvaluationService();
        $shipmentStatus = $shipmentStatusEvaluationService->evaluateShipmentStatus($shipmentId);
        //return response()->json(['message' => $shipmentStatus]);
        //if($shipmentStatus == 'delayed Delivery'){ //Send Real time update if Delayed Devlivery
        //    return to_route('shipment.sendRealTimeUpdate');
        //}
        return response()->json([
            'shipment_id' => $shipmentId,
            'shipment_status' => $shipmentStatus,
        ]);
    }
}