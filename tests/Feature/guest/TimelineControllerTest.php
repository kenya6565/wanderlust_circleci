<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TimelineControllerTest extends TestCase
{
     //未ログイン時
    public function test_showTimelinePage_Guest()
    {
        $response = $this->get(route('guest_timeline'));
        
        $response->assertStatus(200)
            ->assertViewIs('guest.timeline.index');
    }
    
    public function test_showPostDetail_Guest()
    {
        
        $response = $this->get(route('guest_postdetail'));
        $response->assertStatus(200)
            ->assertViewIs('guest.timeline.show');
    }
    
   
    
    
}
