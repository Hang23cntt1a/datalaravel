<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mf;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $array = [
            'xe1.jpg',
            'xe2.jpg',
            'xe3.jpg',
            'xe4.jpg',
            'xe5.jpg',
            'xe6.jpg',
            'xe7.jpg',
        ];
        return [
            'description' => fake()->name(),
            'model' => fake()->bothify('?????-#####'),
            'produced_on' => now(),
            'mf_id' => Mf::inRandomOrder()->first()->id ?? 5,
            'image' => fake()->randomElement($array),
        ];
    }
}
