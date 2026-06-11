<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        User::create([
            'name' => 'Admin DonutHub',
            'email' => 'admin@donuthub.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'phone' => '+60123456789',
        ]);

        // Create Staff
        User::create([
            'name' => 'Staff DonutHub',
            'email' => 'staff@donuthub.com',
            'password' => bcrypt('password'),
            'role' => 'staff',
            'phone' => '+60198765432',
        ]);

        // Create Customer
        User::create([
            'name' => 'John Doe',
            'email' => 'customer@donuthub.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
            'phone' => '+60112233445',
        ]);

        $this->call([
            CategorySeeder::class,
            DonutSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
