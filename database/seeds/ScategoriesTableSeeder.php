<?php

use Illuminate\Database\Seeder;

class ScategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scategories')->insert([
          ['scategory_name' => '春'],
          ['scategory_name' => '夏'],
          ['scategory_name' => '秋'],
          ['scategory_name' => '冬']
        ]);
    }
}
