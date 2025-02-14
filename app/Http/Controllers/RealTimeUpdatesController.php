<?php
namespace App\Http\Controllers;

use App\Services\RealTimeUpdatesService;
use Illuminate\Http\Request;

class RealTimeUpdatesController extends Controller
{
    public function sendRealTimeUpdate(Request $request)
    {
        $shipmentId = $request->input('shipment_id');
        $realTimeUpdatesService = new RealTimeUpdatesService();
        $realTimeUpdatesService->sendRealTimeUpdate($shipmentId);
        return response()->json(['message' => 'Real-time update sent successfully']);
    }
}