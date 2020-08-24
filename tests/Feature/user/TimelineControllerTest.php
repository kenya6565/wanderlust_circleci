<?php

namespace Tests\Feature;

use App\User;
use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TimelineControllerTest extends TestCase
{
  
    //use RefreshDatabase;

    //タイムライン表示
    public function test_LoggedIn()
    {
        $user = factory(User::class)->create();
        
        //ログイン状態でタイムラインに遷移しているか
        $response = $this->actingAs($user)->get(route('user_timeline'));
        $response->assertStatus(200)->assertViewIs('user.timeline.index');
        
        //ログイン状態であるか
        $this->assertAuthenticated($guard = null);
    }
    
    public function test_showPostDetail()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('user_postdetail',['id' => '2']));
        $response->assertStatus(200)->assertViewIs('user.timeline.detail');
        // /$response->dump();
         //postテーブルのidが1である投稿に正しくアクセスできているか確認
        $response->assertSee('ピラミッド エジプト'); 
    }
    
    public function test_showMyPage()
    {
        //ログイン状態でマイページにアクセスできているか
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('mypage',['id' => '4']));
        $response->assertStatus(200)->assertViewIs('user.users.index');
        $response->assertSee('テストユーザー'); 
    }
    
    //投稿
    public function test_post()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();
        $response = $this->actingAs($user)->get(route('user_timeline'));
        $response->assertStatus(200)->assertViewIs('user.timeline.index');
        $this->assertDatabaseHas('posts', [
            'post' => $post['post'],
            'title' => $post['title'],
        ]);
    }
    
    public function test_postDelete()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();
        $response = $this->actingAs($user)->get(route('user_postdetail',['id' => $post['id']]));
        \App\Post::where('title', $post['title'])->delete();
        $response->assertStatus(200);
       
        $this->assertDatabaseMissing('posts', [
            'title' => $post['title'],
        ]);
    }
    // public function test_sortAsc()
    // {
    //     $user = factory(User::class)->create();
    //     $response = $this->actingAs($user)->get(route('user_timeline',['sort'=>'asc']));
        
    //     //タイムラインに遷移しているか
    //     $response->assertStatus(200)->assertViewIs('user.timeline.index');
    //     $response->assertSeeText('エッフェル塔'); 

        
       
   // }
    
    public function test_sortDesc()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('user_timeline',['sort'=>'desc']));
        
        //タイムラインに遷移しているか
        $response->assertStatus(200)->assertViewIs('user.timeline.index');
        $response->assertDontSee('ピラミッド エジプト'); 
    }
    
    
}
