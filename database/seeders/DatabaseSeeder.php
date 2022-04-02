<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Anuj Chauhan',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Alok Kumar'),
            'is_admin' => true
        ]);
    }
}
