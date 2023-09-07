<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'Date_Birth' => $this->faker->date,
            'phone' => $this->faker->unique()->phoneNumber,
            'Gender' => $this->faker->randomElement(['ذكر','انثي']),
            'Blood_Group' => $this->faker->randomElement(['O-','O+','A-','A+','B-','B+','AB+','AB-']),
            'Address' => $this->faker->address,
        ];
    }
}
