<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'Tee Shirt',
                'description' =>'Shirt of size L',
                'cost' => 5.00,
                'quantity' => 1,
                'image' => '1.jpg',
                'availability' => 'in stock',
            ],
        ]);
    }
}
