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
        \App\Models\Category::create(['name' => 'T-Shirts', 'description' => 'Casual t-shirts']);
        \App\Models\Category::create(['name' => 'Jeans', 'description' => 'Denim jeans']);
        \App\Models\Category::create(['name' => 'Dresses', 'description' => 'Elegant dresses']);
        \App\Models\Category::create(['name' => 'Jackets', 'description' => 'Outerwear jackets']);
    }
}
