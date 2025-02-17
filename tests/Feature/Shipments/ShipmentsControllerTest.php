<?php
namespace Tests\Feature\Shipments;

use Tests\TestCase;
use App\Models\Shipment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShipmentsControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $shipment;

    public function setUp(): void
    {
        parent::setUp();

        $this->shipment = Shipment::factory()->create();
    }

    public function test_get_shipments()
    {
        $response = $this->get('/api/shipments');

        $response->assertStatus(200);
    }    
}