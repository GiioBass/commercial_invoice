<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function SuccessViewIndexProducts()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);
        $response = $this->actingAs($user)->get(route('product.index'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function SuccessViewEditProducts()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();
        $product = factory(Product::class)->create();
        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);
        $response = $this->actingAs($user)->get(route('product.edit', $product->id));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function SuccessStoreProduct()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);

        $data = [

            'id' => 666999666,
            'name' => 'Producto Test',
            'description' => 'Descripcion test',
            'unit_value'  => 6000000,

        ];

        $this->actingAs($user)->post(route('product.store'), $data)
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('products', $data);
    }


    /**
     * @test
     */
    public function SuccessDeleteProduct()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);

        $product = factory(product::class)->create();

        $this->actingAs($user)->delete(route('product.destroy', $product))->assertSessionHasNoErrors();
    }



    /**
     * @test
     */
    public function SuccessUpdateProduct()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();
        $product = factory(Product::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);

        $data = [
            'id' => $product->id,
            'name' => 'Producto',
            'description' => $product->description,
            'unit_value'  => 1000000,
        ];

        $this->actingAs($user)->put(route('product.update', $product), $data)->assertSessionHasNoErrors();

        $this->assertDatabaseHas('products', $data);
    }
}
