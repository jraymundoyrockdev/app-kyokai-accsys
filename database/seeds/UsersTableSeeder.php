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
            'name' => 'Chumong',
            'email' => 'jraymundo.yrockdev@gmail.com',
            'password' => Hash::make('99zappa99'),
        ]);
    }
}
