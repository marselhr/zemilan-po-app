<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()->count(100)->create();

        foreach ($users as $user) {
            UserAddress::factory()
                ->create(['user_id' => $user->id]);

            DB::table('user_shoping_carts')->insert([
                'user_id' => $user->id
            ]);
        }
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
                    'quantity' => 10
                ],
            ]
        );
    }
}
