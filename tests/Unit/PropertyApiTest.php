<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PropertyApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test fetching all properties.
     *
     * @return void
     */
    public function testGetAllProperties()
    {
        Property::factory()->count(3)->create();

        $response = $this->getJson('/api/properties');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data' => [
                    '*' => ['id', 'name', 'description', 'address', 'no_of_rooms']
                ]
            ])
            ->assertJsonCount(3, 'data');
    }

    /**
     * Test fetching a specific property.
     *
     * @return void
     */
    public function testGetSpecificProperty()
    {
        $property = Property::factory()->create();

        $response = $this->getJson('/api/properties/' . $property->id);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data' => ['id', 'name', 'description', 'address', 'no_of_rooms']
            ]);
    }

    /**
     * Test creating a new property.
     *
     * @return void
     */
    public function testCreateProperty()
    {
        $propertyData = [
            'name' => 'Test Property',
            'description' => 'Some property description',
            'address' => '123 Test St',
            'no_of_rooms' => 5,
        ];

        $response = $this->postJson('/api/properties', $propertyData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'data' => ['id', 'name', 'description', 'address', 'no_of_rooms'],
                'message'
            ]);

        $this->assertDatabaseHas('properties', $propertyData);
    }

    /**
     * Test updating an existing property.
     *
     * @return void
     */
    public function testUpdateProperty()
    {
        $property = Property::factory()->create();

        $updateData = [
            'name' => 'Updated Property',
            'description' => 'Some property description',
            'address' => '456 Updated St',
            'no_of_rooms' => 10,
        ];

        $response = $this->putJson('/api/properties/' . $property->id, $updateData);

        $response->assertStatus(201);

        $this->assertDatabaseHas('properties', $updateData);
    }

    /**
     * Test deleting a property.
     *
     * @return void
     */
    public function testDeleteProperty()
    {
        $property = Property::factory()->create();

        $response = $this->deleteJson('/api/properties/' . $property->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('properties', ['id' => $property->id]);
    }
}
