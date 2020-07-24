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
            'title' => 'ユーザー1',
            'post' => 'ユーザー1',
            'user_id' => '1',
     
            ]);
        $post->save();
        
        $post = new \App\Post([
            'title' => 'ユーザー1',
            'post' => 'ユーザー1',
            'user_id' => '1',
     
            ]);
        $post->save();
        
        $post = new \App\Post([
            'title' => 'ユーザー2',
            'post' => 'ユーザー2',
            'user_id' => '2',
     
            ]);
        $post->save();
        
        $post->save();
        
        $post = new \App\Post([
            'title' => 'ユーザー3',
            'post' => 'ユーザー3',
            'user_id' => '3',
     
            ]);
        $post->save();
        
        $post = new \App\Post([
            'title' => '55555',
            'post' => '55555',
            'user_id' => '5',
     
            ]);
        $post->save();
        }
        
}
