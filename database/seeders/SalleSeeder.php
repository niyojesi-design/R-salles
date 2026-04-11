<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salles = [
            [
                'name' => 'Salle A',
                'capacity' => 50,
                'location' => 'Ground Floor',
                'description' => 'A modern conference room with state-of-the-art equipment.',
                'category_id' => 1, 
                'image_path' => null, // Assuming this is the ID for "Conference Room"
                'price' => 200.00
            ],
            [
                'name' => 'Salle B',
                'capacity' => 100,
                'description' => 'A spacious banquet hall suitable for large events.',
                'category_id' => 2,
                'location' => 'First Floor',
                'image_path' => null, // Assuming this is the ID for "Banquet Hall"
                'price' => 300.00
            ],
            [
                'name' => 'Salle C',
                'capacity' => 200,
                'location' => 'Second Floor',
                'description' => 'A grand auditorium perfect for presentations and performances.',
                'category_id' => 3, // Assuming this is the ID for "Auditorium"
                'image_path' => null,
                'price' => 500.00
            ],
        ];

        foreach ($salles as $salle) {
            \App\Models\Salle::create($salle);
        }
    }
}
