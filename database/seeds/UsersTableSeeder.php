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
            'ministry_id' => 1,
            'member_id' => 1,
            'username' => 'jraymundo',
            'password' => Hash::make('99zappa99'),
        ]);
    }
}
