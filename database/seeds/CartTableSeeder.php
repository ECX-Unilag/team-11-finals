<?php

use Illuminate\Database\Seeder;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
            [
                'user_id' => 1,
                'product_id' => 1,
                'price' => 5.00,
                'quantity' => 1,  
            ],
        ]);
    }
}
