<?php
namespace Tests\Feature\ShipmentStatus;

use Tests\TestCase;
use App\Models\Shipment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShipmentStatusEvaluationControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $shipment;

    public function setUp(): void
    {
        parent::setUp();

        $this->shipment = Shipment::factory()->create();
    }

    public function test_get_shipment_status()
    {
        $response = $this->get('/api/shipment-status?device_id=D001');

        $response->assertStatus(200);
    }    
}