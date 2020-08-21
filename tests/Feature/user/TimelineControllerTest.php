<?php

namespace Tests\Feature;

use App\User;
use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TimelineControllerTest extends TestCase
{
  
    use RefreshDatabase;

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
        $post = factory(Post::class)->create();
        // $response = $this->actingAs($user)->get(route('user_postdetail',$post->id));
        $response = $this->actingAs($user)->get(route('user_postdetail',$post->id));
        $response->assertStatus(200)->assertViewIs('user.timeline.detail');
            
         //postテーブルのidが1である投稿に正しくアクセスできているか確認
        $response->assertSee('エッフェル塔 フランス'); 
    }
    
    // public function test_showMyPage()
    // {
    //     //ログイン状態でマイページにアクセスできているか
    //     $user = factory(User::class)->create();
    //     $response = $this->actingAs($user)->get(route('mypage',['id' => '4']));
    //     $response->assertStatus(200)->assertViewIs('user.users.index');
    //     $response->assertSee('テストユーザー'); 
    // }
    
    //投稿
    public function test_post()
    {
        // $user = factory(User::class)->create();
        //  $response = $this->actingAs($user)->get(route('user_timeline'));
        // $response = $this->from('user_timeline')->post('user_timeline', ['post' => 'post'],['title' => 'title']);
        // $this->assertDatabaseHas('posts',  ['post' => 'post'],['title' => 'title']);
        // $post = factory(Post::class)->create();
        // $this->assertDatabaseHas('posts',  ['post' => 'post'],['title' => 'title']);
       
        $response = $this->post(route('post'),[
            'posts' =>[
                ['post' => 'post'],
                ['title' => 'title']
            ]
        ]);

        //登録処理が完了して、一覧画面にリダイレクトすることを検証
      
       
       
       
       
       
         $response->assertStatus(302);
        $response->assertRedirect('/');
        
    }
    
    
}
