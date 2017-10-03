<?php

use Illuminate\Database\Seeder;

class ExploreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('explore')->insert([
            'title' => str_random(10),
            'content' => str_random(200),
            'user_id' => random_int(1,100),
            'topic_id' => random_int(1,100),
            'comments_count' => random_int(1,100),
            'goods_count' => random_int(1,100),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
