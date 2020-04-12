<?php

namespace App\Console\Commands;

use App\Reportinvoices\UpdateReportStatus;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class UpdateReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reports:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update state report consult status place to pay';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = App::make(UpdateReportStatus::class);
        $response->updateReportStatusInvoice();
    }
}
