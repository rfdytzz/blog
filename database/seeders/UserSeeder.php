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
    }
}
