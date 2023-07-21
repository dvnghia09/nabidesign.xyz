<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create admin
        User::create([
            'name' => 'admin',
            'password' => Hash::make('00000000'),
            'email' => 'daovannghia1392001@gmail.com',
            'role' => 1
        ]);
    }
}
