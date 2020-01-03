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

        
        
        
        factory(App\Client::class, 30)->create();
        factory(App\Seller::class, 30)->create();
        factory(App\Invoice::class, 30)->create();
        factory(App\Product::class, 30)->create();
        factory(App\Invoice_product::class, 100)->create();

        
        
    }
}
