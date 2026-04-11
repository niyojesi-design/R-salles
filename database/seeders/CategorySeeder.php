<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Conference Room'],
            ['name' => 'Banquet Hall'],
            ['name' => 'Auditorium'],
            ['name' => 'Meeting Room'],
            ['name' => 'Outdoor Space'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
