<?php


namespace App\Reportinvoices;

use App\ConnectionPlacetopay\Redirection;
use App\ControlReport;
use Illuminate\Support\Facades\DB;

class UpdateReportStatus
{
    public function updateReportStatusInvoice()
    {
        $instance = Redirection::getInstance();
        $placetopay = $instance->getConn();
        $reports = ControlReport::all();
//            Invoices with the status 'OK' or 'PENDING' if status is check  status in the platform place to pay with the requestId
//              and  update status report and the status invoice
        try {
            foreach ($reports as $report) {
                $response = $placetopay->query($report->requestId);

                if ($report->status == 'OK' or $report->status == 'PENDING') {
                    foreach ($report->invoices as $invoice) {
                        DB::table('invoices')
                            ->where('id', $invoice->id)
                            ->update(['state' => 'Pagado']);

//                        TODO realizar cambio del id por el requestId en tabla control_reports

                        DB::table('control_reports')
                            ->where('id', $report->id)
                            ->update(['status' => $response->status()->status(),
                                'message' => $response->status()->message()
                            ]);
                    }
                } else {
                    var_dump('approved');
                }
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
