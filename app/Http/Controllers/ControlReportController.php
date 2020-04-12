<?php

namespace App\Http\Controllers;

use App\ConnectionPlacetopay\Redirection;
use App\ControlReport;
use App\Invoice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class ControlReportController extends Controller
{

    /**
     * @param Invoice $invoice
     * @return RedirectResponse|Redirector
     */
    public function redirectPlatformPay(Invoice $invoice, Request $request)
    {

        $instance = Redirection::getInstance();
        $placetopay = $instance->getConn();

        $reference = $invoice->id;
//            'TEST_' . time();

        // Request Information
        $request = [
         /*   Opcional
            "locale" => "es_CO",
            COMPRADOR -> Opcional
            "payer" => [
                "name" => $invoice->client->first_name,
                "surname" => $invoice->client->last_name,
                "email" => $invoice->client->email,
                "documentType" => $invoice->client->document_type->documentType,
                "document" => $invoice->client->id,
                "mobile" => $invoice->client->phone_number,
                "address" => $invoice->client->address
            ],*/
            "buyer" => [
                "name" => $invoice->client->first_name,
                "surname" => $invoice->client->last_name,
                "email" => $invoice->client->email,
                "documentType" => $invoice->client->document_type->documentType,
                "document" => $invoice->client->id,
                "mobile" => $invoice->client->phone_number,
                "address" => $invoice->client->address
            ],
            "payment" => [
                "reference" => $reference,
                "description" => "Factura de venta N°: " . $invoice->id  ,
//                factura de venta # XXXX cod_num

                "amount" => [
                    /* "taxes" => [
                         [

                    iva
                             "kind" => "ice",
                             "amount" => 0,
                             "base" => 0
                         ],
                    base del iva
                    valor neto * 0.19
                     ],
                     "details" => [
                         [
                             "kind" => "shipping", costo envio
                             "amount" => 0
                         ],

                         [
                             "kind" => "tip",
                             "amount" => 0
                         ],
                         [
                             "kind" => "subtotal",
                             "amount" => $invoice->client->subTotal
                         ]
                     ],*/
//                    TODO Mostrar tipo moneda al crear o pagar la cuenta
                    "currency" => "COP",
                    "total" => $invoice->total
                ],
                /* "items" => [
                     [

                         "sku" => 26443,
                         "name" => "Qui voluptatem excepturi.",
                         "category" => "physical",
                         "qty" => 1,
                         "price" => 940,
                         "tax" => 89.3
                     ]
                 ],*/
                "shipping" => [
                    "name" => $invoice->client->first_name,
                    "surname" => $invoice->client->last_name,
                    "email" => $invoice->client->email,
                    "documentType" => $invoice->client->document_type->documentType,
                    "document" => $invoice->client->id,
                    "mobile" => $invoice->client->phone_number,
                    "address" => $invoice->client->address
                ],
                "allowPartial" => false
            ],
            "expiration" => date('c', strtotime('+1 hour')),
//TODO error curl...
            "ipAddress" => "127.0.0.1",
//                $request->ip(),
            "userAgent" => $request->userAgent(),
            "returnUrl" => route('url.redirection', $invoice->id),
            "cancelUrl" => route('url.redirection', $invoice->id),

        ];

        try {
            $response = $placetopay->request($request);

            if ($response->isSuccessful()) {
                // Redirect the client to the processUrl or display it on the JS extension
                // $response->processUrl();
                $this->storePayReport(
                    $response->requestId,
                    $response->status()->status(),
                    $response->status()->message(),
                    $response->processUrl,
                    $invoice->id
                );
//                return redirect($response->processUrl());
            } else {
                // There was some error so check the message
//                $response->status()->message();
                return view('errors.404');
            }
            var_dump($response);
        } catch (Exception $e) {
//      manejo de excepciones

//            var_dump($e->getMessage());
return view('errors.404');

        }
    }


    /**
     * @param $requestReportId
     * @param $requestStatus
     * @param $requestUrl
     * @param $requestMessage
     * @param $id
     */
    public function storePayReport($requestReportId, $requestStatus, $requestMessage, $requestUrl, $id)
    {
        $controlReport = new ControlReport;

        $controlReport->requestId = $requestReportId;
        $controlReport->status = $requestStatus;
        $controlReport->processUrl = $requestUrl;
        $controlReport->message = $requestMessage;
        $controlReport->save();

        $controlReport->invoices()->attach($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
//    implicit model binding
    public function show($id)
    {
        $invoices = Invoice::findOrFail($id);

        return view('ControlReport.show', compact('invoices'));
    }


    /**
     * @param Invoice $invoice
     * @return RedirectResponse
     */
    public function updatePayReport(Invoice $invoice)
    {
//        return view('ControlReport.update');
        $instance = Redirection::getInstance();
        $placetopay = $instance->getConn();

        $requestId = $invoice->controlReport->last()->requestId;

        try {
            $response = $placetopay->query($requestId);

            if ($response->isSuccessful()) {
                // In order to use the functions please refer to the RedirectInformation class

                if ($response->status()->isApproved()) {
                    // The payment has been approved
//                    $message = ($requestId .$response->status()->message() . "\n");
//                    return $message;
                    $this->edit($response->status()->status(), $invoice->controlReport->last()->id);
                    $state = Invoice::findOrFail($invoice->id);
                    $state->state = "Pagado";
                    $state->save();
                    $report = ControlReport::findorFail($invoice->controlReport->last()->id);
                    $report->status = $response->status()->status();
                    $report->message = $response->status()->message();
                    $report->save();
                // This is additional information about it
//                    print_r($response->toArray());
                } else {
                    /*$message = ($requestId . ' ' . $response->status()->message() . "\n");
//                    return $message;
                    dd($message);
                    $this->edit($response->status()->status(), $invoice->controlReport->last()->id);*/
                    $report = ControlReport::findorFail($invoice->controlReport->last()->id);
                    $report->status = $response->status()->status();
                    $report->message = $response->status()->message();
                    $report->save();
                }

                $this->edit($response->status()->status(), $invoice->controlReport->last()->id);
                return redirect()->route('invoice.show', $invoice->id);
//                return back();
            } else {
                // There was some error with the connection so check the message
                print_r($response->status()->message() . " Error de conexion \n");
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($status, $id)
    {
        $report = ControlReport::findOrFail($id);
        $report->status = $status;
        $report->save();
    }



    public function updateStateInvoice()
    {

//        TODO por arreglar

        $instance = Redirection::getInstance();
        $placetopay = $instance->getConn();

        $controlReport = ControlReport::all();
        $invoice = Invoice::all();
        foreach ($controlReport as $controlReports) {
            $requestId = $controlReports->requestId;

            try {
                $response = $placetopay->query($requestId);
                if ($response->status()->isApproved()) {
                    $state = Invoice::findOrFail($controlReports->invoices);
                    dd($state->state);
                    $state->state = "Pagado";
                    $state->save();

                    $report = ControlReport::findorFail($controlReports->id);
                    $report->status = $response->status()->status();
                    $report->message = $response->status()->message();
                    $report->save();
                } else {
                    $report = ControlReport::findorFail($controlReports->id);
                    $report->status = $response->status()->status();
                    $report->message = $response->status()->message();
                    $report->save();
                    return back();
                }
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }
}
