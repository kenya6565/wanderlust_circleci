<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TimelineControllerTest extends TestCase
{
   
    //タイムライン表示
    public function test_showTimelinePage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('user_timeline'));
        $response->assertStatus(200)->assertViewIs('user.timeline.index');
    }
    
    //投稿
    public function test_post()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('user_timeline'));
        $response = $this->from('user_timeline')->post('user_timeline', ['post' => 'post'],['title' => 'title']);
        $this->assertDatabaseHas('posts',  ['post' => 'post'],['title' => 'title']);
        $response->assertStatus(200);
        $response->assertRedirect(route('user_timeline'));
    }
    
    
}
