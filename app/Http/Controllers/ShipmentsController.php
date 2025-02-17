<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\ShipmentStatus;

class ShipmentsController extends Controller
{
    public function index()
    {
        $shipments = Shipment::all();
        return response()->json($shipments);
    }

    public function import()
    {
        $shipments = Shipment::query()->orderBy('created_at', 'desc')->paginate();
        return view('shipment.import', ['shipments' => $shipments]);        
    }    
}