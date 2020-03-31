<?php

namespace Tests\Feature;

use App\DocumentType;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use App\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function SuccessViewIndexClients()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);
        $response = $this->actingAs($user)->get(route('client.index'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function SuccessViewEditClients()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();
        factory(DocumentType::class)->create();
        $client = factory(Client::class)->create();
        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);
        $response = $this->actingAs($user)->get(route('client.edit', $client->id));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function SuccessStoreClient()
    {
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();
        $documentType = factory(DocumentType::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);

        $data = [

            'id' => 666999666,
            'document_type_id' => 1,
            'first_name' => 'Client name',
            'last_name' => 'Client last name',
            'phone_number' => '66699666',
            'address' => 'address test 1',
            'email'  => 'client@test.com',

        ];

        $this->actingAs($user)->post(route('client.store'), $data )
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('clients', $data);
    }


    /**
     * @test
    */
    public function SuccessDeleteClient(){
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();
        $documentType = factory(DocumentType::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);

        $client = factory(Client::class)->create();

        $this->actingAs($user)->delete(route('client.destroy', $client))->assertSessionHasNoErrors();
    }



    /**
     * @test
    */
    public function SuccessUpdateClient(){
        $user = factory(User::class)->create();
        $roleAdmin = factory(Role::class)->create();
        $documentType = factory(DocumentType::class)->create();
        $client = factory(Client::class)->create();

        DB::table('role_user')->insert([
            'role_id' => $roleAdmin->id,
            'user_id' => $user->id
        ]);

        $data = [
            'id' => $client->id,
            'document_type_id' => 1,
            'first_name' => 'Client name',
            'last_name' => 'Client last name',
            'phone_number' => $client->phone_number,
            'address' => $client->address,
            'email'  => 'client@test.com',
        ];

        $this->actingAs($user)->put(route('client.update', $client), $data)->assertSessionHasNoErrors();

        $this->assertDatabaseHas('clients', $data);
    }


}
