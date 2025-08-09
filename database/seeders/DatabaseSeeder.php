<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        
        $this->call(RoleSeeder::class);

        User::factory()->create([
            'name' => 'Admin',
            'role_id' => 2,
            'email' => 'admin@gmail.com',
            'password' => '12345678',
        ]);
        
        $this->call(SiswaSeeder::class);
        $this->call(KriteriaSiswaSeeder::class);

    }
}
