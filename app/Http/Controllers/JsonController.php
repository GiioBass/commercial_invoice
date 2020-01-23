<?php

namespace App\Http\Controllers;

use Dnetix\Redirection\PlacetoPay;

class JsonController extends Controller
{


    /*
     * Identificador: 6dd490faf9cb87a9862245da41170ff2
        SecretKey: 024h1IlD
        Endpoint: https://test.placetopay.com/redirection/
     * */

    public function createJson()
    {
       $placetopay = new PlacetoPay([
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => '024h1IlD',
            'url' => 'https://test.placetopay.com/redirection/',
        ]);

        $reference = 'TEST_' . time();

        $request = [
            'payer' => [
                'name' => 'John',
                'surname' => 'Doe',
                'email' => 'john.doe@example.com',
                'document' => '1040035000',
                'documentType' => 'CC',
                'mobile' => '3006108300'
            ],
            'payment' => [
                'reference' => $reference,
                'description' => 'Testing payment',
                'amount' => [
                    'currency' => 'COP',
                    'total' => 120000,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => route('invoice.show', 1) ,
//            . $reference,
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        $response = $placetopay->request($request);
        if ($response->isSuccessful()) {
            // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
            // Redirect the client to the processUrl or display it on the JS extension
            header('Location: ' . $response->processUrl());
        } else {
            // There was some error so check the message and log it
            $response->status()->message();
        }

        dd($placetopay);
    }


}
