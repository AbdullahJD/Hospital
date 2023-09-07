<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AdminTableSeeder;
use Database\Seeders\ImageTableSeeder;
use Database\Seeders\AppointmentSeeder;
use Database\Seeders\DoctorTableSeeder;
use Database\Seeders\SectionTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AdminTableSeeder::class,
//            AppointmentSeeder::class,
            SectionTableSeeder::class,
            DoctorTableSeeder::class,
            ImageTableSeeder::class,
            ServiceTableSeeder::class,
            PatientSeeder::class,
            RayEmployeeSeeder::class,
            LaboratorieSeeder::class,
        ]);

    }
}
