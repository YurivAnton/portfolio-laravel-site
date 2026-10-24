<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_homepage_is_accessible_to_guest(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_guests_are_redirected_to_login_from_dashboard(): void
    {
        $response = $this->get('/app');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_users_can_access_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();

        $response = $this->actingAs($user)->get('/app');

        $response->assertOk();
    }

    public function test_users_are_logged_out_successfully(): void
    {
        $user = \App\Models\User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertRedirect('/');

        $this->assertGuest();

        $this->get('/app')->assertRedirect('/login');
    }
}
