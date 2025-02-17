<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Shipment;
use App\Models\ShipmentStatus;
use App\Models\TemperatureDeviation;
use Illuminate\Support\Facades\Storage;

class DataIngestionService
{
    public function ingestData($csvFile)
    {
        // Read CSV file
        $data = array_map('str_getcsv', file($csvFile));

        // Insert data into database
        foreach ($data as $row) {
            DB::table('shipments')->insert([
                'shipment_id' => $row[0],
                'latitude' => $row[1],
                'longitude' => $row[2],
                'temperature' => $row[3],
                'timestamp' => $row[4],
                'device_id' => $row[5],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Get the newly created shipments
        $shipments = Shipment::all();

        // Insert data into the shipment_status table
        $shipment_statuses = [];
        foreach ($shipments as $shipment) {
             $shipment_statuses[] = [
            'device_id' => $shipment->device_id,
            'status' => 'on_time',
            'created_at' => now(),
            'updated_at' => now(),
            ];
        }
        ShipmentStatus::insert($shipment_statuses);

        // Insert data into the shipment_status table
        $temperature_deviations = [];
        foreach ($shipments as $shipment) {
             $shipment_statuses[] = [
            'device_id' => $shipment->device_id,
            'temperature' => $shipment->temperature,
            'created_at' => now(),
            'updated_at' => now(),
            ];
        }
        TemperatureDeviation::insert($temperature_deviations);
    }
}