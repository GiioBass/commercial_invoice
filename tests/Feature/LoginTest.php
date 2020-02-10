<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    /**
     * @test
     */

    public function LoginUnauthorized()
    {
        $response = $this->get(route('client.index'));
        $response->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function LoginSuccess()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)->get(route('client.index'));
        $this->assertAuthenticatedAs($user);
    }
}
