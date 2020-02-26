<?php

namespace App\Providers;

use App\Http\View\Composers\CachedDocumentType;
use http\Client;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\CachedProducts;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        se debe colocar el path donde se encuentra el archivo create
        View::composer(
            'InvoiceProducts.create',
            CachedProducts::class
        );

        View::composer(
            'Clients.create',
            CachedDocumentType::class
        );
    }
}
