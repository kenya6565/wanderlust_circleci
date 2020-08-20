<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TimelineControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   
    
    //未ログイン時
    public function Test_showTimelinePage_Guest()
    {
        $response->assertRedirect(route('guest_timeline'));
    }
    
  
    
}
