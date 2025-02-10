<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_dashboard()
    {
        // If a guest tries to access the dashboard, they should be redirected
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_dashboard()
    {
        // Create a test user
        $user = User::factory()->create();

        // Act as the user and try to access the dashboard
        $response = $this->actingAs($user)->get('/dashboard');

        // Ensure the page loads successfully
        $response->assertStatus(200);
    }
}
