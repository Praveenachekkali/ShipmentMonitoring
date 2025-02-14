<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemperatureDeviation extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'temperature',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
