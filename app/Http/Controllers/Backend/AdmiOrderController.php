<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmiOrderController extends Controller
{
    public function ViewPendingOrders()
    {
        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('admin.orders.pending_orders', compact('orders'));
    }
    public function ViewProcessingOrders()
    {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('admin.orders.processing_orders', compact('orders'));
    }
    public function ViewShippedOrders()
    {
        $orders = Order::where('status', 'shipped')->orderBy('id', 'DESC')->get();
        return view('admin.orders.shipped_orders', compact('orders'));
    }
    public function ViewConfirmedOrders()
    {
        $orders = Order::where('status', 'confirmed')->orderBy('id', 'DESC')->get();
        return view('admin.orders.confirmed_orders', compact('orders'));
    }
    public function ViewDeliveredOrders()
    {
        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('admin.orders.delivered_orders', compact('orders'));
    }
    public function ViewCanceledOrders()
    {
        $orders = Order::where('status', 'cancelled')->orderBy('id', 'DESC')->get();
        return view('admin.orders.canceled_orders', compact('orders'));
    }
    public function ViewPendingOrderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('admin.orders.pending_orders_details', compact('order', 'orderItem'));
    }

    public function ConfirmOrder($id) {
        $order_detalis = OrderItem::where('order_id',$id)->get();

        foreach($order_detalis as $row){
            DB::table('products')->where('id',$row->product_id)->update(['product_qty' => DB::raw('product_qty-'.$row->qty)]);
        }
        Order::findOrFail($id)->update(['status' => 'confirmed']);

        $notifications = array(
            'message' => 'You confirmed the order successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view.pending.orders')->with($notifications);
    }
    public function ProcessOrder($id) {
        Order::findOrFail($id)->update(['status' => 'processing']);

        $notifications = array(
            'message' => 'The order is under processing',
            'alert-type' => 'success'
        );
        return redirect()->route('view.confirmed.orders')->with($notifications);
    }
    public function ShipOrder($id) {
        Order::findOrFail($id)->update(['status' => 'shipped']);

        $notifications = array(
            'message' => 'The order is on the way',
            'alert-type' => 'success'
        );
        return redirect()->route('view.processing.orders')->with($notifications);
    }
    public function DeliverdOrder($id) {
        Order::findOrFail($id)->update(['status' => 'delivered']);

        $notifications = array(
            'message' => 'The order is deleverd',
            'alert-type' => 'success'
        );
        return redirect()->route('view.shipped.orders')->with($notifications);
    }
    public function CancelleddOrder($id) {
        Order::findOrFail($id)->update(['status' => 'cancelled']);

        $notifications = array(
            'message' => 'The order is deleverd',
            'alert-type' => 'success'
        );
        return redirect()->route('view.shipped.orders')->with($notifications);
    }

    public function DownloadInvoiceAdmin($order_id){
    	$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        $pdf = Pdf::loadView('admin.orders.invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    	// return view('user.orders.invoice',compact('order','orderItem','totalAfterTax','totalBeforTax','cartTax'));
    } 
}
