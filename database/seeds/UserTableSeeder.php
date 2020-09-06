<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Sola',
                'email' => 'adv@mail.com',
                'password' => bcrypt('1234'),  
                'api_token' => Str::random(60),
            ],
        ]);
    }
}
