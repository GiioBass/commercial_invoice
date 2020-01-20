<?php

namespace Tests\Feature;

use  Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Client;
use App\User;

class LoginTest extends TestCase
{
    /*
     * @test
     */

    public function testLoginUnathorized()
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


    public function testViewClientIndexExist()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('client.index'));
        $response->assertOk();
    }

    public function testViewCreateClient()
    {
        $user = factory(User::class)->create();
        $client = factory(Client::class)->create();
        $response = $this->actingAs($user)->get(route('client.create'));
        $response->assertOk();
    }

    public function testViewEditClientExist()
    {
        $user = factory(User::class)->create();
        $client = Client::first();
        $response = $this->actingAs($user)->get(route('client.edit', $client));
        $response->assertOk();
    }

    public function testViewDeleteClientExist()
    {
        $user = factory(User::class)->create();
        $client = Client::first();
        $response = $this->actingAs($user)->get(route('client.destroy', $client));
        $response->assertOk();
    }

    public function testViewConfirmDeleteClientExist()
    {
        $user = factory(User::class)->create();
        $client = Client::first();
        $response = $this->actingAs($user)->get("client/$client->id/confirmDelete");
        $response = $this->actingAs($user)->get(route('client.destroy', $client));
        $response->assertOk();
    }

}
