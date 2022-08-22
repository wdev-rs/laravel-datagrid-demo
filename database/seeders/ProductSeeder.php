<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 50; $i++) {
            Product::create([
                'name' => 'Yellow Bunny Dots ' . $i,
                'code' => 'BB ' . $i,
                'description' => 'Yellow',
                'price' => rand(100, 300) * 1000,
                'status' => rand(0, 1),
                'sort_order' => ($i + 1) * 10
            ]);
        }
    }
}
