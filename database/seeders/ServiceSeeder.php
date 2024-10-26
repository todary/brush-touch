<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfRecords = 10;

        for ($i = 1; $i <= $numberOfRecords; $i++) {
            Service::create([
                'name' => 'Service ' . $i,
                'price' => rand(1000, 9999) / 100,
                'status' =>1,
            ]);
        }
    }
}
