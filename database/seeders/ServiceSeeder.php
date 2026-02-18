<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Service::create([
            'name' => 'Corte Masculino',
            'price' => 50.00
        ]);
        Service::create([
            'name' => 'Barba',
            'price' => 30.00
        ]);
    }
}
