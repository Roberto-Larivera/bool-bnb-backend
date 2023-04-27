<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Transaction;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentMail;

use App\Models\Apartment;
use App\Models\Sponsor;
use App\Models\ApartmentSponsor;
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
            } 
            else {
                return redirect()->route('admin.sponsors.index')->with('warning', 'Ci dispiace, la pagina non esiste, riprova di nuovo.');
            }

    }


    public function process(Request $request)
    {
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $sponsorId = request()->input('sponsor');
        $apartmentId = request()->input('apartment');
        $sponsor = Sponsor::where('id',$sponsorId)->first();

        $status = Transaction::sale([
            'amount' => $sponsor->price,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        $currentDate = date("Y-m-d H:i:s");
        $currentDateMin = date("Y-m-d H:i:s", strtotime('+'.$sponsor->duration.'hours', strtotime($currentDate)));

        

        if($status){
            $apartment_sponsor = new ApartmentSponsor();
            $apartment_sponsor->apartment_id = $apartmentId;
            $apartment_sponsor->sponsor_id = $sponsorId;
            $apartment_sponsor->deadline = $currentDateMin;
            $apartment_sponsor->save();
        }

        return response()->json($status);
    }
}
