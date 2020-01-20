<?php

namespace Tests\Feature;

use App\Client;
use App\Invoice;
use App\Seller;
use App\User;
Use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewsTest extends TestCase
{
    /*
     * Test Views Client
     * */
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


    public function testViewConfirmDeleteClientExist()
    {
        $user = factory(User::class)->create();
        $client = Client::first();
        $response = $this->actingAs($user)->get("client/$client->id/confirmDelete");
        $response = $this->actingAs($user)->get(route('client.destroy', $client));
        $response->assertOk();
    }

    public function testViewDeleteClientExist()
    {
        $user = factory(User::class)->create();
        $client = Client::first();
        $response = $this->actingAs($user)->get(route('client.destroy', $client));
        $response->assertOk();
    }

    /*
     * Test Views Products
     * */

    public function testViewProductsIndexExist()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('product.index'));
        $response->assertOk();
    }

    public function testViewCreateProducts()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();
        $response = $this->actingAs($user)->get(route('product.create'));
        $response->assertOk();
    }

    public function testViewEditProductExist()
    {
        $user = factory(User::class)->create();
        $product = Product::first();
        $response = $this->actingAs($user)->get(route('product.edit', $product));
        $response->assertOk();
    }


    public function testViewConfirmDeleteProductExist()
    {
        $user = factory(User::class)->create();
        $product = Product::first();
        $response = $this->actingAs($user)->get("product/$product->id/confirmDelete");
        $response = $this->actingAs($user)->get(route('client.destroy', $product));
        $response->assertOk();
    }

    public function testViewDeleteProductExist()
    {
        $user = factory(User::class)->create();
        $product = Product::first();
        $response = $this->actingAs($user)->get(route('product.destroy', $product));
        $response->assertOk();
    }

    /*
     * Test Views Sellers
     * */

    public function testViewSellerIndexExist()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('seller.index'));
        $response->assertOk();
    }

    public function testViewSellerCreate()
    {
        $user = factory(User::class)->create();
        $seller = factory(Seller::class)->create();
        $response = $this->actingAs($user)->get(route('seller.create'));
        $response->assertOk();
    }

    public function testViewEditSellerExist()
    {
        $user = factory(User::class)->create();
        $seller = Seller::first();
        $response = $this->actingAs($user)->get(route('seller.edit', $seller));
        $response->assertOk();
    }


    public function testViewConfirmDeleteSellerExist()
    {
        $user = factory(User::class)->create();
        $seller = Seller::first();
        $response = $this->actingAs($user)->get("seller/$seller->id/confirmDelete");
        $response = $this->actingAs($user)->get(route('seller.destroy', $seller));
        $response->assertOk();
    }

    public function testViewDeleteSellerExist()
    {
        $user = factory(User::class)->create();
        $seller = Seller::first();
        $response = $this->actingAs($user)->get(route('seller.destroy', $seller));
        $response->assertOk();
    }

    /*
     * Test View Invoices
     * */

    public function testViewInvoiceIndexExist()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('invoice.index'));
        $response->assertOk();
    }

    public function testViewCreateInvoice()
    {
        $user = factory(User::class)->create();
        $invoice = factory(Invoice::class)->create();
        $response = $this->actingAs($user)->get(route('invoice.create'));
        $response->assertOk();
    }

    public function testViewEditInvoiceExist()
    {
        $user = factory(User::class)->create();
        $invoice = Invoice::first();
        $response = $this->actingAs($user)->get(route('invoice.edit', $invoice));
        $response->assertOk();
    }


    public function testViewConfirmDeleteInvoiceExist()
    {
        $user = factory(User::class)->create();
        $invoice = Invoice::first();
        $response = $this->actingAs($user)->get("invoice/$invoice->id/confirmDelete");
        $response = $this->actingAs($user)->get(route('invoice.destroy', $invoice));
        $response->assertOk();
    }

    public function testViewDeleteInvoiceExist()
    {
        $user = factory(User::class)->create();
        $invoice = Invoice::first();
        $response = $this->actingAs($user)->get(route('invoice.destroy', $invoice));
        $response->assertOk();
    }
}

