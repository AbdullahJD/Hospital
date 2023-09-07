<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;


class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'price' => $this->faker->unique()->randomElement([1000,1500,2000,2500,3000]),
            'description'=>$this->faker->paragraph,

            'name' => $this->faker->unique()->randomElement(['خدمة طب اسنان','كشف مخفض','تكلفة يوم السبت','جراحة مع اسنان','كشف لاكثر من فردين بالعائلة']),
        ];
    }
}
