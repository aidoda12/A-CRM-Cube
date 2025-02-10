<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Contact;

class ContactSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_finds_correct_contact()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Contact::factory()->create([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'phone' => '123-456-7890',
        ]);

        $response = $this->get('/contacts?search=Alice');

        $response->assertSee('Alice Johnson');
    }
}
