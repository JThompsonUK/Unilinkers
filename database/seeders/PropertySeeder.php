<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::factory()
            ->count(10)
            ->create()
            ->each(function ($property) {
                for ($i = 1; $i <= $property->no_of_rooms; $i++) {
                    Room::factory()->create([
                        'name' => 'P' . $property->id . 'R' . $i,
                        'property_id' => $property->id,
                    ]);
                }
            });
    }
}
