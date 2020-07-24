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
            'user_id' => '1',
            'following_id'  => '2'
        ]);
        $follow->save();
    
        $follow = new \App\Follow([
            'user_id' => '2',
            'following_id'  => '3'
        ]);
        $follow->save();
        
        $follow = new \App\Follow([
            'user_id' => '3',
            'following_id'  => '1'
        ]);
        $follow->save();
        
        $follow = new \App\Follow([
            'user_id' => '4',
            'following_id'  => '1'
        ]);
        $follow->save();
        
         $follow = new \App\Follow([
            'user_id' => '3',
            'following_id'  => '2'
        ]);
        $follow->save();
        
         $follow = new \App\Follow([
            'user_id' => '3',
            'following_id'  => '4'
        ]);
        $follow->save();
    }
}
