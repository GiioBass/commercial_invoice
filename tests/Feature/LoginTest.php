<?php

namespace Tests\Feature;

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

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
    public function LoginSuccessRedirectHome()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('home'));
        $response->assertOk(route('home'));
    }

    /**
     * @test
     */
    public function LoginSuccessNoShowLinksNoRoleAsigned()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('home'));
        $response->assertDontSeeText('Facturas');
    }

    /**
     * @test
     */
    public function LoginSuccessShowLinksRoleAsigned()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();
        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);
        $response = $this->actingAs($user)->get(route('home'));
        $response->assertSeeText('Facturas');
    }

    /**
     * @test
     */
    public function LoginDeniedViewClients()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('client.index'));
        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function LoginDeniedViewProducts()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('product.index'));
        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function LoginDeniedViewSellers()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('seller.index'));
        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function LoginDeniedViewInvoices()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('invoice.index'));
        $response->assertStatus(403);
    }



    /**
     * @test
     */
    public function SuccessViewIndexInvoicesAsignedRole()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);
        $response = $this->actingAs($user)->get(route('invoice.index'));
        $response->assertOk();
    }



    /**
     * @test
     */
    public function SuccessViewCreateProductsAsignedRole()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);
        $response = $this->actingAs($user)->get(route('client.create'));
        $response->assertOk();
    }
}
