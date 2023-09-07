<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors =  Doctor::factory()->count(20)->create();
//        $Appointments = Appointment::all();
//
//        foreach ($doctors as $doctor){
//            $Appointments = Appointment::all()->random()->id;
//            $doctor->doctorappointments()->attach($Appointments);
//        }
//        Doctor::all()->each(function ($doctor) use ($Appointments) {
//            $doctor->doctorappointments()->attach(
//                $Appointments->random(rand(1,7))->pluck('id')->toArray()
//            );
//        });
    }
}
