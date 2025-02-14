<?php

namespace Database\Seeders;

use App\Models\Shipment;
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
                'timestamp' => '2023-02-12 14:30:00',
                'device_id' => 'D001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shipment_id' => 'SH002',
                'latitude' => '37.7859',
                'longitude' => '-122.4364',
                'temperature' => '25',
                'timestamp' => '2023-02-12 14:30:00',
                'device_id' => 'D002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}