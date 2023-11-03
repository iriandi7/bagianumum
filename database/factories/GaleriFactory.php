<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Galeri>
 */
class GaleriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 'akjsdnsajd-asdasdsa-asd',
            'galeri_judul' => 'Galeri - ' . fake()->name(),
            'galeri_desc' => fake()->paragraph(3),
            'galeri_foto' => fake()->randomElement(['image/gQOG7fEuOYf9Sk9fYeC9dLkKhoHnWg39gcm0ZzOY.png', 'image/Xa3aRnyS0Ore0BYQDYpAViPL2DKMOY37DMlctYsy.png'])
        ];
    }
}
