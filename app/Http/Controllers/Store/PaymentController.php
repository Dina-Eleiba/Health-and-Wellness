<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;

class PaymentController extends Controller
{

    public function stripePayment(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => 100 * 100,

                "currency" => "EGP",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com."

        ]);

        Session::flash('success', 'Payment successful!');

        return back();

    }



}
