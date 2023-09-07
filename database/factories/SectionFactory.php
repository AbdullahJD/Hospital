<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    protected $model = Section::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(['قسم المخ والاعصاب','قسم الجراحة','قسم الاطفال','قسم النساء والتوليد','قسم العيون','قسم الباطنة','قسم العناية المشددة']),
            'description'=>$this->faker->paragraph
        ];
    }
}
