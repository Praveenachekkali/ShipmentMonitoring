<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShipmentStatus extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'status',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
