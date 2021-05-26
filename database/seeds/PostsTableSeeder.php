<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('posts')->insert([
          [
              'user_id' => 1,
              'scategory_id' => 1,
              'tcategory_id' => 1,
              'title' => 'hoge',
              'content' => 'test'
          ],
          [
            'user_id' => 1,
            'scategory_id' => 2,
            'tcategory_id' => 2,
            'title' => 'hoge2',
            'content' => 'test2'
        ],
        ]);
    }
}
