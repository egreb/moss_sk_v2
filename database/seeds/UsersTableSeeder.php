<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'foo',
            'email' => 'foo@gmail.com',
            'password' => bcrypt('pw'),
        ]);
        DB::table('users')->insert([
            'name' => 'foo2',
            'email' => 'foo2@gmail.com',
            'password' => bcrypt('pw'),
        ]);
    }
}
