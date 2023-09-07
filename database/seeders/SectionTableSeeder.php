<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionTableSeeder extends Seeder
{

    public function run(): void
    {
        Section::factory()->count(7)->create();
    }
}
