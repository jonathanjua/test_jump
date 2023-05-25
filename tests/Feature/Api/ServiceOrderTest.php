<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ServiceOrder;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceOrderTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_service_orders_list(): void
    {
        $serviceOrders = ServiceOrder::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('service-orders.index'));

        $response->assertOk()->assertSee($serviceOrders[0]->vehiclePlate);
    }

    /**
     * @test
     */
    public function it_stores_the_service_order(): void
    {
        $data = ServiceOrder::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('service-orders.store'), $data);

        $this->assertDatabaseHas('service_orders', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_service_order(): void
    {
        $serviceOrder = ServiceOrder::factory()->create();

        $user = User::factory()->create();

        $data = [
            'vehiclePlate' => $this->faker->text(7),
            'entryDateTime' => $this->faker->dateTime()->format('Y-m-d H:i:s'),
            'exitDateTime' => $this->faker->dateTime()->format('Y-m-d H:i:s'),
            'priceType' => $this->faker->text(55),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'user_id' => $user->id,
        ];
        // dd($data);
        $response = $this->putJson(
            route('service-orders.update', $serviceOrder),
            $data
        );

        $data['id'] = $serviceOrder->id;

        $this->assertDatabaseHas('service_orders', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_service_order(): void
    {
        $serviceOrder = ServiceOrder::factory()->create();

        $response = $this->deleteJson(
            route('service-orders.destroy', $serviceOrder)
        );

        $this->assertModelMissing($serviceOrder);

        $response->assertNoContent();
    }
}
