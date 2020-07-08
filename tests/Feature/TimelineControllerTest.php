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
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function Test_showTimelinePage()
    {
        $user = factory(User::class)->create();
        $response->assertRedirect(route('/timeline'));
    }
    
    public function Test_post()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('/timeline'));

        $response->assertStatus(200)->assertViewIs('/timeline');
    }
}
