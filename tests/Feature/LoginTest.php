<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    /**
     * @test
     */

    public function LoginUnauthorizedUserViewHome()
    {
        $response = $this->get(route('home'));
        $response->assertRedirect(route('login'));

    }

    /**
     * @test
     */
    public function LoginUnauthorizedUserViewClients()
    {
        $response = $this->get(route('client.index'));
        $response->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function LoginUnauthorizedUserViewProducts()
    {
        $response = $this->get(route('product.index'));
        $response->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function LoginUnauthorizedUserViewSellers()
    {
        $response = $this->get(route('seller.index'));
        $response->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function LoginUnauthorizedUserViewInvoices()
    {
        $response = $this->get(route('invoice.index'));
        $response->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function LoginUnauthorizedUserView()
    {
        $response = $this->get(route('invoice.index'));
        $response->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function LoginSuccess()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('home'));
        $response->assertOk(route('home'));

    }

    /**
     * @test
     */
    public function LoginSuccessViewClients()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('client.index'));
        $response->assertOk();

    }

    /**
     * @test
     */
    public function LoginSuccessViewProducts()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('product.index'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function LoginSuccessViewSellers()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('seller.index'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function LoginSuccessViewInvoices()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('invoice.index'));
        $response->assertOk();
    }
}
