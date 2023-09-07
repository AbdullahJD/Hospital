<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LaboratorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laboratorie_employees')->delete();
        DB::table('laboratorie_employees')->insert([
            'name' => 'sami',
            'email' => 'sami@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
