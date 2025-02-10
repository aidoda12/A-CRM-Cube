<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Lead;
use App\Models\Contact;
use App\Models\User;

class GlobalSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_global_search_finds_data_across_modules()
    {
        $user = User::factory()->create();

        // Create test data in different modules
        Lead::factory()->create(['name' => 'Michael Lead']);
        Contact::factory()->create(['name' => 'Sarah Contact']);

        // Search for "Michael"
        $response = $this->actingAs($user)->get('/search?query=Michael');

        // Ensure the lead appears but the contact does not
        $response->assertSee('Michael Lead');
        $response->assertDontSee('Sarah Contact');
    }
}
