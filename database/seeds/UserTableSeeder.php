<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
         'name' => str_random(10),
         'email' => str_random(10).'@gmail.com',
         'password' => bcrypt('123456'),
         'role' => 'admin'
        ]);

        DB::table('users')->insert([
         'name' => str_random(10),
         'email' => str_random(10).'@gmail.com',
         'password' => bcrypt('123456'),
         'role' => 'saler'
        ]);

        DB::table('users')->insert([
         'name' => str_random(10),
         'email' => str_random(10).'@gmail.com',
         'password' => bcrypt('123456'),
         'role' => 'employee'
        ]);
    }
}
