<?php

namespace Database\Seeders;

use App\Models\Barber;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        $user = User::factory()->create([
            'name' => 'Barber',
            'email' => 'barber@email.com',
            'role' => 'barber',
            'password' => bcrypt('password'),
        ]);

        $barber = Barber::create([
            'user_id' => $user->id,
        ]);

        User::factory()->create([
            'name' => 'Client',
            'email' => 'client@email.com',
            'role' => 'client',
            'password' => bcrypt('password'),
        ]);
    }
}
