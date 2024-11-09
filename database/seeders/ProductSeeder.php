<?php

namespace Database\Seeders;

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

        Product::insert([
            [
                'name'=> 'Test product 1',
                'slug'=> 'Test-product-1',
                'sku'=> 'SKU-9846546519',
                'details'=> 'TEST product details',
                'quantity'=> 1,
                'amount'=> 10.00,
            ],
            [
                'name'=> 'Test product 2',
                'slug'=> 'Test-product-2',
                'sku'=> 'SKU-9846546545',
                'details'=> 'TEST product details 2',
                'quantity'=> 1,
                'amount'=> 10.00,
            ],
            [
                'name'=> 'Test product 3',
                'slug'=> 'Test-product-3',
                'sku'=> 'SKU-98465466565',
                'details'=> 'TEST product details 3',
                'quantity'=> 1,
                'amount'=> 10.00,
            ],
        ]);
    }
}
