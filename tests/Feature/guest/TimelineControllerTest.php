<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TimelineControllerTest extends TestCase
{
    //use RefreshDatabase;
     //未ログイン時
    public function test_showTimelinePage_Guest()
    {
        $response = $this->get(route('guest_timeline'));
        
        //タイムラインに遷移しているか
        $response->assertStatus(200)->assertViewIs('guest.timeline.index');
        
        //ゲストとして画面遷移しているか
        $this->assertGuest($guard = null);
    }
    
    public function test_showPostDetail_Guest()
    {
        $response = $this->get(route('guest_postdetail',['id' => '1']));
        $response->assertStatus(200)->assertViewIs('guest.timeline.detail');
            
         //postテーブルのidが1である投稿に正しくアクセスできているか確認
        $response->assertSee('エッフェル塔 フランス'); 
    }
    
    public function test_sortAsc_Guest()
    {
        $response = $this->get(route('guest_timeline',['sort'=>'asc']));
        
        //タイムラインに遷移しているか
        $response->assertStatus(200)->assertViewIs('guest.timeline.index');
        
        //ゲストとして画面遷移しているか
        $this->assertGuest($guard = null);
    }
    
    public function test_sortDesc_Guest()
    {
        $response = $this->get(route('guest_timeline',['sort'=>'desc']));
        
        //タイムラインに遷移しているか
        $response->assertStatus(200)->assertViewIs('guest.timeline.index');
        
        //ゲストとして画面遷移しているか
        $this->assertGuest($guard = null);
    }
    
    public function test_getRecentPhoto_Guest()
    {
        $response = $this->get(route('guest_postdetail',['id' => '1']));
        
        
        //タイムラインに遷移しているか
        $response->assertStatus(200)->assertViewIs('guest.timeline.index');
        
        //ゲストとして画面遷移しているか
        $this->assertGuest($guard = null);
    }
    
   
    
    
}
