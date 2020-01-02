<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        
        // DB::table('clients')->truncate();
        // DB::table('sellers')->truncate();
        // DB::table('products')->truncate();
        // DB::table('invoices')->truncate();
        // DB::table('invoice_product')->truncate();
        
        factory(App\Client::class, 30)->create();
        factory(App\Seller::class, 30)->create();
        factory(App\Product::class, 30)->create();
        
        
       
    }
}
