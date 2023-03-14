<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\plants;

class plant extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        plants::create([
            'name' => 'plants 1',
            'description' => 'plants 1 description',
            'price' =>'10.99$'
        ]);
        plants::create([
            'name' => 'plants 2',
            'description' => 'plants 2 description',
            'price' =>'10.99$'
        ]);
        plants::create([
            'name' => 'plants 3',
            'description' => 'plants 3 description',
            'price' =>'10.99$'
        ]);
        plants::create([
            'name' => 'plants 4',
            'description' => 'plants 4 description',
            'price' =>'10.99$'
        ]);
        plants::create([
            'name' => 'plants 5',
            'description' => 'plants 5 description',
            'price' =>'10.99$'
        ]);
        plants::create([
            'name' => 'plants 6',
            'description' => 'plants 6 description',
            'price' =>'10.99$'
        ]);
    }
}
