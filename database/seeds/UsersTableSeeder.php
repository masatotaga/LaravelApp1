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
            'name' => 'taga',
            'email' => 'kaihou1gakugei2bj@gmail.com',
            'password' => bcrypt('testtest2bj'),
        ]);
    }
}
