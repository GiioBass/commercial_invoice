<?php

namespace Tests\Feature;

use App\Seller;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SellerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function SuccessViewIndexSeller()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);
        $response = $this->actingAs($user)->get(route('seller.index'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function SuccessViewEditSeller()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();
        $seller = factory(Seller::class)->create();
        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);
        $response = $this->actingAs($user)->get(route('seller.edit', $seller->id));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function SuccessStoreSeller()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);

        $data = [

            'id' => 666999666,
            'first_name' => 'Seller name',
            'last_name' => 'Seller last name',
            'phone_number' => '66699666',
            'email'  => 'seller@test.com',

        ];

        $this->actingAs($user)->post(route('seller.store'), $data )
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('sellers', $data);
    }


    /**
     * @test
     */
    public function SuccessDeleteSeller(){
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);

        $seller = factory(Seller::class)->create();

        $this->actingAs($user)->delete(route('seller.destroy', $seller))->assertSessionHasNoErrors();
    }



    /**
     * @test
     */
    public function SuccessUpdateSeller(){
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();
        $seller = factory(Seller::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);

        $data = [
            'id' => $seller->id,
            'first_name' => 'seller name',
            'last_name' => $seller->last_name,
            'phone_number' => $seller->phone_number,
            'email'  => 'seller@test.com',
        ];

        $this->actingAs($user)->put(route('seller.update', $seller), $data)->assertSessionHasNoErrors();

        $this->assertDatabaseHas('sellers', $data);
    }

}
