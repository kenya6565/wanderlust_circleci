<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Post([
            'post' => 'テスト１',
            'user_id' => '1',
     
            ]);
        $post->save();
        
        $post = new \App\Post([
            'post' => 'テスト１',
            'user_id' => '1',
     
            ]);
        $post->save();
        
        $post = new \App\Post([
            'post' => 'テスト2',
            'user_id' => '2',
     
            ]);
        $post->save();
        
        $post = new \App\Post([
            'post' => 'テスト3',
            'user_id' => '3',
     
            ]);
        $post->save();
        }
        
}
