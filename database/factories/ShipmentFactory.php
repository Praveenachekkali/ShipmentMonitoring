<?php
namespace Database\Factories;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentFactory extends Factory
{
    protected $model = Shipment::class;

    public function definition()
    {
        return [
            // Define the default attributes for the Shipment model
            'shipment_id' => "SH001",
            'latitude' => "29.76",
            'longitude' => "-95.36",
            'temperature' => "4",
            'timestamp' => now(),
            'device_id' => "D101",
        ];
    }
}
