<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Menggunakan locale Indonesia agar konten lebih natural
        $categories = ['story', 'article'];

        for ($i = 1; $i <= 20; $i++) {
            $title = $faker->sentence(6);

            DB::table('posts')->insert([
                'title' => $title,
                'category' => $categories[array_rand($categories)], // Random antara story/article
                'subtitle' => $faker->paragraph(1),
                'content' => $faker->paragraphs(3, true), // Menghasilkan 3 paragraf teks
                'user_id' => rand(1, 3), // Random user_id antara 1, 2, atau 3
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
