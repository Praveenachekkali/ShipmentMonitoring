<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    //
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'shipment_id',
        'latitude',
        'longitude',
        'temperature',
        'timestamp',
        'device_id',
    ];

    public function shipment_status()
    {
        return $this->hasMany(ShipmentStatus::class);
    }

    public function temperature_deviation()
    {
        return $this->hasMany(TemperatureDeviation::class);
    }
}
