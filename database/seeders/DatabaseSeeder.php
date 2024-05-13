<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Api\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i=0; $i < 50; $i++) {   
            Product::create([
                'name' => 'Product - ' .$i,
                'price' => 2 * $i,
            ]);
        }
    }
}
