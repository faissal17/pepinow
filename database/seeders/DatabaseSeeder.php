<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\plantSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PermissionsSeeder;
use Database\Seeders\AdminSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionsSeeder::class,
            CategorySeeder::class,
            AdminSeeder::class,
            VendeurSeeder::class
        ]);
    }
}
