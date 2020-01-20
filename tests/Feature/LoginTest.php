<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    /*
     * @test
     */

    public function testLoginUnauthorized()
    {
        $response = $this->get(route('client.index'));
        $response->assertRedirect(route('login'));
    }

    public function testLoginSuccess()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)->get(route('client.index'));
        $this->assertAuthenticatedAs($user);
    }


}
