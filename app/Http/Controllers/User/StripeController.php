<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        $cartTotal = Cart::total();
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51HvNjBA1Bljd4OgBbHxuWIolC47g3KRBXtxOmpZPvefzjMrTKTgbuVdyDJo0aAVdwE8QgIAM3hwOoeoRfhGW95vA00O4ufr8pe');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $cartTotal * 100,
            'currency' => 'eur',
            'description' => 'MetalSheet Test Payment',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        // dd($charge);
        if (Auth::check()) {
            $userId = Auth::id();
        } else {
            $userId = mt_rand(10000000, 99999999);
        }
        $order_id = Order::insertGetId([
            'user_id' => $userId,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $cartTotal,
            'order_number' => $charge->metadata->order_id,

            'invoice_no' => 'Inv' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),
        ]);
        // --------Mail --------------
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $cartTotal,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));
        // --------Mail --------------
        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        Cart::destroy();

        if (session()->get('language') == 'lithuanian') {
            $notification = array(
                'message' => 'Jūsų užsakymo vieta sėkmingai',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Your Order Place Successfully',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('dashboard')->with($notification);
    }
}
