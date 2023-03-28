<?php

namespace Database\Seeders;

use App\Models\Plant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class plantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plant::create([
            'name' => 'Plant 1',
            'description' => 'Plant 1 description',
            'price' => 1,
            'category_id' => 1,
        ]);
        Plant::create([
            'name' => 'Plant 2',
            'description' => 'Plant 2 description',
            'price' => 2,
            'category_id' => 2,
        ]);
        Plant::create([
            'name' => 'Plant 3',
            'description' => 'Plant 3 description',
            'price' => 3,
            'category_id' => 1,
        ]);
        Plant::create([
            'name' => 'Plant 4',
            'description' => 'Plant 4 description',
            'price' => 4,
            'category_id' => 1,
        ]);
        Plant::create([
            'name' => 'Plant 5',
            'description' => 'Plant 5 description',
            'price' => 5,
            'category_id' => 2,
        ]);
        Plant::create([
            'name' => 'Plant 6',
            'description' => 'Plant 6 description',
            'price' => 6,
            'category_id' => 3,
        ]);
        Plant::create([
            'name' => 'Plant 7',
            'description' => 'Plant 7 description',
            'price' => 7,
            'category_id' => 3,
        ]);
    }
}
