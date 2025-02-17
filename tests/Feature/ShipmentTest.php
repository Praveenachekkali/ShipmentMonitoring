<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Shipment;
use Database\Factories\ShipmentFactory;

class ShipmentTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateShipment()
    {
        $shipment = ShipmentFactory::new()->create();

        $this->assertDatabaseHas('shipments', [
            'id' => $shipment->id,
        ]);
    }
}