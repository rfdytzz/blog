<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
            'gender' => 'male',
            'role' => 'admin',    
            'phone_number' => '812345678901',
            'birthdate' => '2009-12-02'
        ]);

        $existingUsers = [
            ['name' => 'Rafka Dyta', 'email' => 'rafka@mail.com', 'gender' => 'male'],
            ['name' => 'Elon Musk', 'email' => 'elon@mail.com', 'gender' => 'male'],
            ['name' => 'Olivia Musk', 'email' => 'oliv@mail.com', 'gender' => 'female'],
        ];

        foreach ($existingUsers as $data) {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('12345678'),
                'gender' => $data['gender'],
                'role' => 'user',
                'phone_number' => '812345678901',
                'birthdate' => '1999-12-02'
            ]);
        }

        $additionalUsers = [
            ['John Doe', 'john@mail.com', 'male'],
            ['Jane Smith', 'jane@mail.com', 'female'],
            ['Michael Scofield', 'michael@mail.com', 'male'],
            ['Sarah Tancredi', 'sarah@mail.com', 'female'],
            ['Arthur Morgan', 'arthur@mail.com', 'male'],
            ['Sadie Adler', 'sadie@mail.com', 'female'],
            ['Peter Parker', 'peter@mail.com', 'male'],
            ['Gwen Stacy', 'gwen@mail.com', 'female'],
            ['Bruce Wayne', 'bruce@mail.com', 'male'],
            ['Diana Prince', 'diana@mail.com', 'female'],
            ['Clark Kent', 'clark@mail.com', 'male'],
            ['Lois Lane', 'lois@mail.com', 'female'],
            ['Tony Stark', 'tony@mail.com', 'male'],
            ['Natasha Romanoff', 'natasha@mail.com', 'female'],
            ['Steve Rogers', 'steve@mail.com', 'male'],
            ['Wanda Maximoff', 'wanda@mail.com', 'female'],
        ];

        foreach ($additionalUsers as $user) {
            User::create([
                'name' => $user[0],
                'email' => $user[1],
                'password' => Hash::make('12345678'),
                'gender' => $user[2],
                'role' => 'user',
                'phone_number' => '812345678' . rand(100, 999),
                'birthdate' => rand(1990, 2005) . '-01-01'
            ]);
        }
    }
}