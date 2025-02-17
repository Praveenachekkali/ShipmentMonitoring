<?php
namespace Tests\Feature\TemperatureStatus;

use Tests\TestCase;
use App\Models\Shipment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TemperatureDeviationEvaluationControllerTest extends TestCase
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
        $response = $this->get('/api/temperature-deviation?device_id=D001');

        $response->assertStatus(200);
    }    
}