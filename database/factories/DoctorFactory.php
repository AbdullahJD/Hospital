<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;


class DoctorFactory extends Factory
{

    protected $model = Doctor::class;

    public function definition(): array
    {
        return [

            'name' => $this->faker->unique()->name,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' => $this->faker->phoneNumber,
            'section_id' => Section::all()->random()->id,
            'number_of_statements' => 5,
        ];
    }
}
