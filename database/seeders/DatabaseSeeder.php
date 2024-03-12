<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         
        \DB::table('locations')->insert([
             'name' => 'JLT',
             'status' => 1,
         ]);

        \DB::table('vehicles')->insert([
            'plate_code' => 'A',
            'plate_number' => '123',
            'emirates' =>'Dubai'
        ]);
    }
}
