<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $category = Category::updateOrCreate(
            ['slug' => Str::slug('Food')],
            [
                'name'       => 'Food',
                'image_path' => 'categories/03eCZddkwb7cea4QwLOk054vcTzRn1TPXguew0bn.jpg',
            ]
        );

        $category_two = Category::updateOrCreate(
            ['slug' => Str::slug('Drinks')],
            [
                'name'       => 'Drinks',
                'image_path' => 'categories/03eCZddkwb7cea4QwLOk054vcTzRn1TPXguew0bn.jpg',
            ]
        );

        Product::updateOrCreate(
            ['slug' => Str::slug('Burger')],
            [
                'name'           => 'Burger',
                'quantity'       => 10,
                'sell_price'     => 50,
                'purchase_price' => 35,
                'image_path'     => 'products/RLR2wljHCaw9NXAEqU0vIOA0uV6NO0rbwCBtIO8v.jpg',
                'category_id'    => $category->id,
            ]
        );

        Product::updateOrCreate(
            ['slug' => Str::slug('Pizza')],
            [
                'name'           => 'Pizza',
                'quantity'       => 10,
                'sell_price'     => 800,
                'purchase_price' => 650,
                'image_path'     => 'products/QEXCGsbWWnSMpoc8gVfjmKr0ACFeYgwLPmIsnzJL.jpg',
                'category_id'    => $category->id,
            ]
        );

        Product::updateOrCreate(
            ['slug' => Str::slug('Tehari')],
            [
                'name'           => 'Tehari',
                'quantity'       => 10,
                'sell_price'     => 150,
                'purchase_price' => 80,
                'image_path'     => 'products/QEXCGsbWWnSMpoc8gVfjmKr0ACFeYgwLPmIsnzJL.jpg',
                'category_id'    => $category->id,
            ]
        );

          Product::updateOrCreate(
            ['slug' => Str::slug('CocoCola 500m')],
            [
                'name'           => 'CocoCola 500m',
                'quantity'       => 50,
                'sell_price'     => 50,
                'purchase_price' => 45,
                'image_path'     => 'products/QEXCGsbWWnSMpoc8gVfjmKr0ACFeYgwLPmIsnzJL.jpg',
                'category_id'    => $category_two->id,
            ]
        );

        Product::updateOrCreate(
            ['slug' => Str::slug('Borhani')],
            [
                'name'           => 'Borhani',
                'quantity'       => 100,
                'sell_price'     => 70,
                'purchase_price' => 50,
                'image_path'     => 'products/QEXCGsbWWnSMpoc8gVfjmKr0ACFeYgwLPmIsnzJL.jpg',
                'category_id'    => $category_two->id,
            ]
        );
    }
}
