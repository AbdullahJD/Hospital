<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{

    public function run(): void
    {

          Service::factory()->count(5)->create();


//        $SingleService = new Service();
//        $SingleService->price = 500;
//        $SingleService->status = 1;
//        $SingleService->save();
//
//        // store trans
//        $SingleService->name = 'كشف';
//        $SingleService->save();
    }
}
