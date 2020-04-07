<?php

namespace App\Providers;

use App\Reportinvoices\UpdateReportStatus;
use Illuminate\Support\ServiceProvider;

class PayInvoiceServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UpdateReportStatus::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
