<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CashController extends Controller
{
	public function CashOrder(Request $request)
	{

		$cartTotal = Cart::total();
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

			'payment_type' => 'Cash On Delivery',
			'payment_method' => 'Cash On Delivery',
			'transaction_id' => 'No',
			'currency' =>  'eur',
			'amount' => $cartTotal,
			'order_number' => mt_rand(10000000, 99999999),


			'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
			'order_date' => Carbon::now()->format('d F Y'),
			'order_month' => Carbon::now()->format('F'),
			'order_year' => Carbon::now()->format('Y'),
			'status' => 'Pending',
			'created_at' => Carbon::now(),

		]);

		// Start Send Email 
		$invoice = Order::findOrFail($order_id);
		$data = [
			'invoice_no' => $invoice->invoice_no,
			'amount' => $cartTotal,
			'name' => $invoice->name,
			'email' => $invoice->email,
		];

		Mail::to($request->email)->send(new OrderMail($data));

		// End Send Email 


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
	} // end method 

}
