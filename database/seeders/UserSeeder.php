<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Rafka Dyta',
            'email' => 'rafka@mail.com',
            'password' => '12345678',
            'gender' => 'male',
            'role' => 'user',
            'phone_number' => '812345678901',
            'birthdate' => '2009/12/02'
        ]);
        User::create([
            'name' => 'Elon Musk',
            'email' => 'elon@mail.com',
            'password' => '12345678',
            'gender' => 'male',
            'role' => 'user',
            'phone_number' => '812345678901',
            'birthdate' => '1999/12/02'
        ]);
        User::create([
            'name' => 'Olivia Musk',
            'email' => 'oliv@mail.com',
            'password' => '12345678',
            'gender' => 'female',
            'role' => 'user',
            'phone_number' => '812345678901',
            'birthdate' => '2000/12/02'
        ]);
    }
}
