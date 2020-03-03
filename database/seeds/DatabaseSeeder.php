<?php

use App\Client;
use App\Invoice;
use App\Invoice_product;
use App\Product;
use App\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('clients')->truncate();
        DB::table('sellers')->truncate();
        DB::table('products')->truncate();
        DB::table('invoices')->truncate();
        DB::table('invoice_product')->truncate();
        DB::table('document_types')->truncate();
        Schema::enableForeignKeyConstraints();

        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DocumentTypeSeeder::class);

        factory(Client::class, 30)->create();
        factory(Seller::class, 30)->create();
        factory(Invoice::class, 30)->create();
        factory(Product::class, 30)->create();
        factory(Invoice_product::class, 100)->create();
    }
}
