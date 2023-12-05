<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cart_items')->insert(
            [
                [
                    'cart_id' => 1,
                    'product_id' => 1,
                    'quantity' => 10
                ],
                [
                    'cart_id' => 1,
                    'product_id' => 2,
                    'quantity' => 13
                ],
                [
                    'cart_id' => 1,
                    'product_id' => 3,
                    'quantity' => 13
                ],
            ]
        );
    }
}
