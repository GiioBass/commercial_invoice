<?php

namespace App\Http\Controllers;

use App\Invoice;
use Dnetix\Redirection\PlacetoPay;

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
        $reference = $invoice->id;
//            'TEST_' . time();

// Request Information
        $request = [
            "locale" => "es_CO",
//            COMPRADOR
            "payer" => [
                "name" => $invoice->client->first_name,
                "surname" => $invoice->client->last_name,
                "email" => $invoice->client->email,
                "documentType" => $invoice->client->document_type->documentType,
                "document" => $invoice->client->id,
                "mobile" => "3006108300",
                "address" => $invoice->client->address
            ],
            "buyer" => [
                "name" => "Julia",
                "surname" => "Snow",
                "email" => "julia@snow.com",
                "documentType" => "CC",
                "document" => "222222222",
                "mobile" => "3006108300",
                "address" => [
                    "street" => "703 Dicki Island Apt. 609",
                    "city" => "North Randallstad",
                    "state" => "Antioquia",
                    "postalCode" => "46292",
                    "country" => "US",
                    "phone" => "363-547-1441 x383"
                ]
            ],
            "payment" => [
                "reference" => $reference,
                "description" => "Iusto sit et voluptatem.",
                "amount" => [
                    "taxes" => [
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
                    ],
                    "currency" => "COP",
                    "total" => $invoice->total
                ],
                "items" => [
                    [
                        "sku" => 26443,
                        "name" => "Qui voluptatem excepturi.",
                        "category" => "physical",
                        "qty" => 1,
                        "price" => 940,
                        "tax" => 89.3
                    ]
                ],
                "shipping" => [
                    "name" => "Violet",
                    "surname" => "Rose",
                    "email" => "violer@rose.com",
                    "documentType" => "CC",
                    "document" => "11111111111",
                    "mobile" => "3006108300",
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
            "cancelUrl" => route('invoice.show', $invoice->id),
            "skipResult" => false,
            "noBuyerFill" => false,
            "captureAddress" => false,
            "paymentMethod" => null
        ];

        try {
//            $placetopay = placetopay();
            $response = $placetopay->request($request);
            if ($response->isSuccessful()) {
                // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
                // Redirect the client to the processUrl or display it on the JS extension
                header('Location: ' . $response->processUrl());
            } else {
                // There was some error so check the message and log it
                $response->status()->message();
            }
            var_dump($response);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }


//        TODO ERROR!!!
        dd();

    }


}
