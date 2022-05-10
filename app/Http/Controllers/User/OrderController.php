<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function MyOrders(){

    	$orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
    	return view('user.orders.view_orders',compact('orders'));

    }

    public function OrderDetails($order_id){
        $totalAfterTax = Cart::total();
        $cartTax = Cart::tax();
        $totalBeforTax = Cart::subtotal();
    	$order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('user.orders.order_details',compact('order','orderItem','totalAfterTax','totalBeforTax','cartTax'));
    } 
    public function InvoiceDownload($order_id){
        $totalAfterTax = Cart::total();
        $cartTax = Cart::tax();
        $totalBeforTax = Cart::subtotal();
    	$order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        $pdf = Pdf::loadView('user.orders.invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    	// return view('user.orders.invoice',compact('order','orderItem','totalAfterTax','totalBeforTax','cartTax'));
    } 
}
