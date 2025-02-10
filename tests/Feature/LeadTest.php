<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Lead;
use App\Models\User;

class LeadTest extends TestCase
{
    use RefreshDatabase; // Ensures database is fresh for each test

    public function test_a_user_can_create_a_new_lead()
    {
        // Simulate a logged-in user
        $user = User::factory()->create();

        // Simulate creating a new lead
        $response = $this->actingAs($user)->post('/leads', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
        ]);

        // The user should be redirected back to the leads list
        $response->assertRedirect('/leads');

        // Check if the new lead exists in the database
        $this->assertDatabaseHas('leads', ['email' => 'john@example.com']);
    }

    public function test_a_user_can_update_a_lead()
    {
        $user = User::factory()->create();
        $lead = Lead::factory()->create(['name' => 'Old Name']);

        // Update the lead's name
        $response = $this->actingAs($user)->put("/leads/{$lead->id}", [
            'name' => 'Updated Name',
            'email' => $lead->email,
        ]);

        // Ensure the user is redirected after update
        $response->assertRedirect('/leads');

        // Check if the database was updated correctly
        $this->assertDatabaseHas('leads', ['name' => 'Updated Name']);
    }

    public function test_a_user_can_delete_a_lead()
    {
        $user = User::factory()->create();
        $lead = Lead::factory()->create();

        // Send delete request
        $response = $this->actingAs($user)->delete("/leads/{$lead->id}");

        // Ensure the user is redirected after deletion
        $response->assertRedirect('/leads');

        // Confirm that the lead was deleted from the database
        $this->assertDatabaseMissing('leads', ['id' => $lead->id]);
    }
}
