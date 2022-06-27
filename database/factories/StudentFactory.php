<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $user_id = 1;
        return [
            'user_id' => $user_id++,
            'program_id' => 1,
            'scholarship_id' => 1,
            'stat_id' => 1,
            'foto' => 'profile_default.jpg',
            'nim' => rand(100000,999999),
            'nama_rekening' => $this->faker->name(),
            'no_hp' => '085244'.rand(111111,999999),
            'alamat' => $this->faker->address(),
            'tahun_beasiswa' => 2021,
        ];
    }
}
