<?php

namespace App\Http\Controllers;

use App\ControlReport;
use App\Invoice;
use Dnetix\Redirection\Exceptions\PlacetoPayException;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\Facades\DB;

class JsonController extends Controller
{


    /*
     * Identificador: 6dd490faf9cb87a9862245da41170ff2
        SecretKey: 024h1IlD
        Endpoint: https://test.placetopay.com/redirection/
     * */

    public function createJson(Invoice $invoice)
    {


        $placetopay = new PlacetoPay([
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => '024h1IlD',
            'url' => 'https://test.placetopay.com/redirection/',
        ]);
        $reference = $invoice->code;
//            'TEST_' . time();

// Request Information
        $request = [
//            Opcional
            "locale" => "es_CO",
//            COMPRADOR -> Opcional
            "payer" => [
                "name" => $invoice->client->first_name,
                "surname" => $invoice->client->last_name,
                "email" => $invoice->client->email,
                "documentType" => $invoice->client->document_type->documentType,
                "document" => $invoice->client->id,
                "mobile" => $invoice->client->phone_number,
                "address" => $invoice->client->address
            ],
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
                "description" => "Iusto sit et voluptatem.",
                "amount" => [
                    /* "taxes" => [
                         [
                             "kind" => "ice",
                             "amount" => 0,
                             "base" => 0
                         ],
                         [
                             "kind" => "valueAddedTax",
                             "amount" => 0,
                             "base" => 0
                         ]
                     ],
                     "details" => [
                         [
                             "kind" => "shipping",
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
//                VENDEDOR
                "shipping" => [
                    "name" => $invoice->seller->first_name,
                    "surname" => $invoice->seller->last_name,
                    "email" => $invoice->seller->email,
                    "documentType" => "CC",
                    "document" => "11111111111",
                    "mobile" => $invoice->seller->phone_number,
                    "address" => [
                        "street" => "703 Dicki Island Apt. 609",
                        "city" => "North Randallstad",
                        "state" => "Antioquia",
                        "postalCode" => "46292",
                        "country" => "US",
                        "phone" => "363-547-1441 x383"
                    ]
                ],
                "allowPartial" => false
            ],
            "expiration" => date('c', strtotime('+1 hour')),
            "ipAddress" => "127.0.0.1",
            "userAgent" => "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36",
            "returnUrl" => route('invoice.show', $invoice->id),
// "/json/$invoice->id/requestInformation/response?reference=" . $reference,
            "cancelUrl" => route('invoice.show', $invoice->id),
            "skipResult" => false,
            "noBuyerFill" => false,
            "captureAddress" => false,
            "paymentMethod" => null
        ];

        try {

            $response = $placetopay->request($request);

            if ($response->isSuccessful()) {
                // Redirect the client to the processUrl or display it on the JS extension
                $response = $placetopay->query($response->requestId);

                /*  $this->createReport(
                    $response->requestId,
                    $response->status()->status(),
                    $response->processUrl,
                    $invoice->id
                );*/
//                return redirect($response->processUrl());

            } else {
                // There was some error so check the message
                $response->status()->message();
            }
            var_dump($response);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

    }


    public function createReport($requestReportId, $requestStatus, $requestUrl, $id)
    {
        $controlReport = new ControlReport;

        $controlReport->requestId = $requestReportId;
        $controlReport->status = $requestStatus;
        $controlReport->processUrl = $requestUrl;
        $controlReport->save();

        $controlReport->invoices()->attach($id);

    }

    /* public function requestInformation($response2)
     {

         $response = $placetopay->query($response2);

         if ($response->isSuccessful()) {
             // In order to use the functions please refer to the Dnetix\Redirection\Message\RedirectInformation class

             if ($response->status()->isApproved()) {
                 // The payment has been approved
             }
         } else {
             // There was some error with the connection so check the message
             print_r($response->status()->message() . "\n");
         }*/


}
