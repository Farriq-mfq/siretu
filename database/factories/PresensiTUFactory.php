<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PresensiTU>
 */
class PresensiTUFactory extends Factory
{
    protected $model = 'PresensiTu';
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NoFormulir' => fake()->randomNumber(),
            'TglFormulir' => fake()->dateTime()->format('d-m-Y H:i'),
            'NoTelp' => fake()->phoneNumber(),
            'KONDISI' => fake()->randomElement(['Sehat dan bahagia', 'Sakit', 'Tanpa Keterangan']),
            'DATANG' => fake()->address(),
            'NAMALENGKAP' => fake()->name(),
            'PANGGILAN' => 'Bapak ' . fake()->name(),
            'JABATAN' => fake()->company(),
            'MAPS_DATANG' => fake()->streetName(),
            'JARAK_DATANG' => '0 m (0 km)',
            'JAM_DATANG' => fake()->time(),
            // 'PULANG' => fake()->streetName(),
            'MAPS_PULANG' => fake()->streetAddress(),
            'JARAK_PULANG' => '0 m (0 km)',
            'JAM_PULANG' => fake()->time(),
            'AKTIFITAS' => 'ini hanya testing'
        ];
    }
}
