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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Mohamed Samir',
            'email' => 'gm.mohamedsamir@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '01122766533',
            'is_admin' => true,
        ]);
    }
}
