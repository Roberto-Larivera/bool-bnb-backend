<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Transaction;



class PaymentController extends Controller
{

    public function token(Request $request)
    {

        $gateway = new \Braintree\Gateway([
            'environment' => env("BRAINTREE_ENV"),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);
        $clientToken = $gateway->clientToken()->generate();
        return view('admin.payment.payment', ['token' => $clientToken]);
    }


    public function process(Request $request)
    {
        
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];

        $status = Transaction::sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return response()->json($status);
    }
}
