<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Transaction;
use Illuminate\Support\Facades\Auth;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class PaymentController extends Controller
{

    public function token(Request $request)
    {
        if (request()->input('apartment_id') && request()->input('sponsor_id')) {
            $apartmentId = request()->input('apartment_id');
            $sponsorId = request()->input('sponsor_id');

            $user = Auth::user();
            // $apartment = Apartment::where('id', $apartmentId)->get();
            $apartment = $user->apartments->where('id', $apartmentId);
            if($apartment->isEmpty() || ($sponsorId > 3 || $sponsorId <= 0)){
                return redirect()->route('admin.sponsors.index')->with('warning', 'Ci dispiace, la pagina non esiste, riprova di nuovo.');
            }

            $gateway = new \Braintree\Gateway([
                'environment' => env("BRAINTREE_ENV"),
                'merchantId' => env("BRAINTREE_MERCHANT_ID"),
                'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
                'privateKey' => env("BRAINTREE_PRIVATE_KEY")
            ]);
            $clientToken = $gateway->clientToken()->generate();
            return view('admin.payment.payment', ['token' => $clientToken]);
        } else {
            return redirect()->route('admin.sponsors.index')->with('warning', 'Ci dispiace, la pagina non esiste, riprova di nuovo.');
        }
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
