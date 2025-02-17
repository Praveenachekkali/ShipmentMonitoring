<?php

namespace Database\Seeders;

use App\Models\Shipment;
use App\Models\ShipmentStatus;
use App\Models\TemperatureDeviation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('shipments')->insert([
            [
                'shipment_id' => 'SH001',
                'latitude' => '37.7749',
                'longitude' => '-122.4194',
                'temperature' => '20',
                'timestamp' => '2025-02-25 14:30:00',
                'device_id' => 'D001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shipment_id' => 'SH002',
                'latitude' => '37.7859',
                'longitude' => '-122.4364',
                'temperature' => '4',
                'timestamp' => '2025-02-17 14:30:00',
                'device_id' => 'D002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

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
             $temperature_deviations[] = [
            'device_id' => $shipment->device_id,
            'temperature' => $shipment->temperature,
            'created_at' => now(),
            'updated_at' => now(),
            ];
        }
        TemperatureDeviation::insert($temperature_deviations);
    }
}