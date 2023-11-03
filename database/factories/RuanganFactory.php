<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ruangan>
 */
class RuanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ruangan_nama' => fake()->name(),
            'ruangan_kapasitas' => fake()->numberBetween(100, 10000) . ' Mobil',
            'ruangan_fasilitas' => fake()->name(),
            'ruangan_foto' => fake()->randomElement(['image/gQOG7fEuOYf9Sk9fYeC9dLkKhoHnWg39gcm0ZzOY.png', 'image/Xa3aRnyS0Ore0BYQDYpAViPL2DKMOY37DMlctYsy.png'])
        ];
    }
}
