<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    public function test_report_page_displays_correct_information()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/reports');

        $response->assertStatus(200);
        $response->assertSee('Annual Sales Report');
    }
}
