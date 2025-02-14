<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
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
    }
}