<?php

namespace Tests\Feature;

use App\Client;
use App\Invoice;
use App\Seller;
use App\User;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewsTest extends TestCase
{
    /**
     * @test
     * Test Views Client
     * */
    public function ViewClientIndexExist()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('client.index'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewCreateClient()
    {
        $user = factory(User::class)->create();
        $client = factory(Client::class)->create();
        $response = $this->actingAs($user)->get(route('client.create'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewEditClientExist()
    {
        $user = factory(User::class)->create();
        $client = Client::first();
        $response = $this->actingAs($user)->get(route('client.edit', $client));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewConfirmDeleteClientExist()
    {
        $user = factory(User::class)->create();
        $client = Client::first();
        $response = $this->actingAs($user)->get("client/$client->id/confirmDelete");
        $response = $this->actingAs($user)->get(route('client.destroy', $client));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewDeleteClientExist()
    {
        $user = factory(User::class)->create();
        $client = Client::first();
        $response = $this->actingAs($user)->get(route('client.destroy', $client));
        $response->assertOk();
    }

    /*
     * @test
     * Test Views Products
     * */

    public function ViewProductsIndexExist()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('product.index'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewCreateProducts()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();
        $response = $this->actingAs($user)->get(route('product.create'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewEditProductExist()
    {
        $user = factory(User::class)->create();
        $product = Product::first();
        $response = $this->actingAs($user)->get(route('product.edit', $product));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewConfirmDeleteProductExist()
    {
        $user = factory(User::class)->create();
        $product = Product::first();
        $response = $this->actingAs($user)->get("product/$product->id/confirmDelete");
        $response = $this->actingAs($user)->get(route('client.destroy', $product));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewDeleteProductExist()
    {
        $user = factory(User::class)->create();
        $product = Product::first();
        $response = $this->actingAs($user)->get(route('product.destroy', $product));
        $response->assertOk();
    }

    /**
     * @test
     * Test Views Sellers
     * */

    public function ViewSellerIndexExist()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('seller.index'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewSellerCreate()
    {
        $user = factory(User::class)->create();
        $seller = factory(Seller::class)->create();
        $response = $this->actingAs($user)->get(route('seller.create'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewEditSellerExist()
    {
        $user = factory(User::class)->create();
        $seller = Seller::first();
        $response = $this->actingAs($user)->get(route('seller.edit', $seller));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewConfirmDeleteSellerExist()
    {
        $user = factory(User::class)->create();
        $seller = Seller::first();
        $response = $this->actingAs($user)->get("seller/$seller->id/confirmDelete");
        $response = $this->actingAs($user)->get(route('seller.destroy', $seller));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewDeleteSellerExist()
    {
        $user = factory(User::class)->create();
        $seller = Seller::first();
        $response = $this->actingAs($user)->get(route('seller.destroy', $seller));
        $response->assertOk();
    }

    /**
     * Test Views Invoices
     * @test
     */
    public function ViewInvoiceIndexExist()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('invoice.index'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewCreateInvoice()
    {
        $user = factory(User::class)->create();
        $invoice = factory(Invoice::class)->create();
        $response = $this->actingAs($user)->get(route('invoice.create'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewEditInvoiceExist()
    {
        $user = factory(User::class)->create();
        $invoice = Invoice::first();
        $response = $this->actingAs($user)->get(route('invoice.edit', $invoice));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewConfirmDeleteInvoiceExist()
    {
        $user = factory(User::class)->create();
        $invoice = Invoice::first();
        $response = $this->actingAs($user)->get("invoice/$invoice->id/confirmDelete");
        $response = $this->actingAs($user)->get(route('invoice.destroy', $invoice));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function ViewDeleteInvoiceExist()
    {
        $user = factory(User::class)->create();
        $invoice = Invoice::first();
        $response = $this->actingAs($user)->get(route('invoice.destroy', $invoice));
        $response->assertOk();
    }
}
