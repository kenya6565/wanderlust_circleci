<?php

use Illuminate\Database\Seeder;

class FollowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $follow = new \App\Follow([
            'following_id' => '1',
            'followed_id'  => '2'
        ]);
        $follow->save();
    
        $follow = new \App\Follow([
            'following_id' => '2',
            'followed_id'  => '3'
        ]);
        $follow->save();
        
        $follow = new \App\Follow([
            'following_id' => '3',
            'followed_id'  => '1'
        ]);
        $follow->save();
    }
}
