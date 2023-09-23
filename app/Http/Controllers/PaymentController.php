<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;
use App\Models\User;

class PaymentController extends Controller
{

    /**
     * Payment function using laravel cashier stripe
     *
     * @param  \Illuminate\Http\Request  $request     
     */
    public function stripe_payment(Request $request)
    {
        try {            
            $amount = $request->amount;
            $amount = $amount * 100;
            $paymentMethod = $request->payment_method;
            
            $user = auth()->user();
            $user->createOrGetStripeCustomer();
            $paymentMethod = $user->addPaymentMethod($paymentMethod);            
            $stripeCharge = $user->charge($amount, $paymentMethod->id, ['description' => $request->description]);
                        
            return redirect()->route('products');    
                    
        } catch (IncompletePayment $exception) {
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('products')]
            );
        }
    }
}
