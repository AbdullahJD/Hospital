<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('appointments')->delete();
        $Appointments = [
            ['name' => 'السبت'],
            ['name' => 'الاحد'],
            ['name' => 'الاثنين'],
            ['name' => 'الثلاثاء'],
            ['name' => 'الاربعاء'],
            ['name' => 'الخميس'],
            ['name' => 'الجمعة'],
        ];
        foreach ($Appointments as $Appointment) {
            Appointment::create($Appointment);
        }
    }

}
