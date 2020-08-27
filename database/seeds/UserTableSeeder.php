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
            'name' => '田中太郎',
            'email' => 'user1@user.com',
            'password' => bcrypt('tarou')
            ]);
        $user->save();
        
        $user = new \App\User([
            'name' => '藤田達郎',
            'email' => 'user2@user.com',
            'password' => bcrypt('tatsurou')
            ]);
            
        $user->save();
        
        $user = new \App\User([
            'name' => '今井美樹',
            'email' => 'user3@user.com',
            'password' => bcrypt('mikimiki')
            ]);
        $user->save();
        
        $user = new \App\User([
            'name' => 'テストユーザー',
            'email' => 'test@user.com',
            'password' => bcrypt('testuser'),
            'profile' => '旅行が好きでいろいろな国に興味があります。よろしくお願いします。',
            ]);
        $user->save();
        
        $user = new \App\User([
            'name' => '吉田ジェシカ',
            'email' => 'user5@user.com',
            'password' => bcrypt('yoshijeshika')
            ]);
        $user->save();
        
        $user = new \App\User([
            'name' => '村田光',
            'email' => 'hikari@user.com',
            'password' => bcrypt('hikari1')
            ]);
        $user->save();
        
        $user = new \App\User([
            'name' => '近藤貴大',
            'email' => 'kondoutakahiro@user.com',
            'password' => bcrypt('kontaka')
            ]);
        $user->save();
        
        $user = new \App\User([
            'name' => 'James',
            'email' => 'james@user.com',
            'password' => bcrypt('james1234')
            ]);
        $user->save();
        
        $user = new \App\User([
            'name' => 'Tom',
            'email' => 'tom@user.com',
            'password' => bcrypt('tommy')
            ]);
        $user->save();
            
        $user = new \App\User([
            'name' => 'Mike',
            'email' => 'mike@user.com',
            'password' => bcrypt('mikey')
            ]);
        $user->save();
    }
    
}
