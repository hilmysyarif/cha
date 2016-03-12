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
            'name' => 'Chacha',
            'email' => 'cha@cha.com',
            'password' => bcrypt('chacha'),
        ]);
    }
}
