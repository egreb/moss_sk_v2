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
            'name' => 'Torbjørn Henriksen',
            'email' => 'tbh@getmail.com',
            'password' => bcrypt('henriksentorbjorn'),
        ]);
        DB::table('users')->insert([
            'name' => 'Arnstein Johansen',
            'email' => 'arnstein.joh@gmail.com',
            'password' => bcrypt('johansenarnstein'),
        ]);
    }
}
