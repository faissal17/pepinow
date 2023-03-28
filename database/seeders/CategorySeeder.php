<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Category 1',
            'description' => 'Category 1 description',
            'vendeur_id' => 1,
        ]);
        Category::create([
            'name' => 'Category 2',
            'description' => 'Category 2 description',
            'vendeur_id' => 2,
        ]);
        Category::create([
            'name' => 'Category 3',
            'description' => 'Category 3 description',
            'vendeur_id' => 3,
        ]);
        Category::create([
            'name' => 'Category 4',
            'description' => 'Category 4 description',
            'vendeur_id' => 4,
        ]);
        Category::create([
            'name' => 'Category 5',
            'description' => 'Category 5 description',
            'vendeur_id' => 5,
        ]);
        Category::create([
            'name' => 'Category 6',
            'description' => 'Category 6 description',
            'vendeur_id' => 6,
        ]);
        Category::create([
            'name' => 'Category 7',
            'description' => 'Category 7 description',
            'vendeur_id' => 7,
        ]);
    }
}
