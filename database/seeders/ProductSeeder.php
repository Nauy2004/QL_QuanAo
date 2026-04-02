<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create([
            'name' => 'Blue T-Shirt',
            'slug' => 'blue-t-shirt',
            'description' => 'Comfortable blue cotton t-shirt',
            'price' => 19.99,
            'quantity' => 50,
            'category_id' => 1,
        ]);

        \App\Models\Product::create([
            'name' => 'Slim Fit Jeans',
            'slug' => 'slim-fit-jeans',
            'description' => 'Modern slim fit denim jeans',
            'price' => 49.99,
            'quantity' => 30,
            'category_id' => 2,
        ]);

        \App\Models\Product::create([
            'name' => 'Summer Dress',
            'slug' => 'summer-dress',
            'description' => 'Light summer dress',
            'price' => 39.99,
            'quantity' => 20,
            'category_id' => 3,
        ]);
    }
}
