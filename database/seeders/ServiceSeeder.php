<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::factory()->create([
            'name' => 'Corte de Cabelo',
            'price' => 30.00,
            'description' => 'Corte de cabelo masculino ou feminino, com estilo personalizado.',
        ]);
    }
}
