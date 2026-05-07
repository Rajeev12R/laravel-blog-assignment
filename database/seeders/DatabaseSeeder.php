<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        $categories = ['Admit Card', 'Result', 'Technology', 'Education', 'News'];
        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
                'slug' => \Illuminate\Support\Str::slug($category)
            ]);
        }
    }
}
