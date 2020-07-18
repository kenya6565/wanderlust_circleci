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
        $user = new \App\User([
        'name' => 'PHP',
        'email' => 'user1@user.com',
        'password' => bcrypt('11111111')
        ]);
    $user->save();
    
    $user = new \App\User([
        'name' => 'JavaScript',
        'email' => 'user2@user.com',
        'password' => bcrypt('22222222')
        ]);
        
    $user->save();
    
    $user = new \App\User([
        'name' => 'Ruby',
        'email' => 'user3@user.com',
        'password' => bcrypt('33333333')
        ]);
    $user->save();
    
     $user = new \App\User([
        'name' => 'testuser',
        'email' => 'test@user.com',
        'password' => bcrypt('testuser')
        ]);
    $user->save();
    }
}
