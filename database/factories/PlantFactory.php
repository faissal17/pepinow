<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plant>
 */
class PlantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(),
            'price' => $this->faker->integer(),
            'image' => $this->faker->image(storage_path(path: 'public/uploads/plants')),
            'categroie_id' => $this->faker->integer(),
        ];
    }
}