<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1レコード
        $user = new \App\User([
        'name' => 'PHP',
        'email' => 'user1@user.com',
        'password' => bcrypt('11111111')
        ]);
        
    $user->save();
    
    
      // 2レコード
    $user = new \App\User([
        'name' => 'JavaScript',
        'email' => 'user2@user.com',
        'password' => bcrypt('22222222')
        ]);
        
        $user->save();
    $user = new \App\User([
        'name' => 'PHP',
        'email' => 'user3@user.com',
        'password' => bcrypt('33333333')
        ]);
        
    $user->save();
    
    }
}
