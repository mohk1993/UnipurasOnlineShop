<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shipment;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use function PHPSTORM_META\elementType;

class CartController extends Controller
{
    public function ViewCartPage()
    {
        if (Cart::total() > 0) {
            return view('user.wishlist.view_cart');
        } else {
            if(session()->get('language') == 'lithuanian'){
                $notification = array(
                    'message' => 'Ops!.... jūsų krepšelis tuščias. :)',
                    'alert-type' => 'info'
                );
            }else{
                $notification = array(
                    'message' => 'Ops!... yor cart is empty :)',
                    'alert-type' => 'info'
                );
            }
           
            return redirect()->back()->with($notification);
        }
    }


    public function GetCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),

        ));
    }

    public function AddProductToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $available_qty = $product->product_qty;
        $request_qty = $request->quantity;
        if ($available_qty > $request_qty) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'price' => $request->price,
                'code' => $request->code,
                'weight' => 1,
                'qty' => $request->quantity,
                'options' => [
                    'image' => $product->product_thambnail,
                ],
            ]);
            if(session()->get('language') == 'lithuanian'){
                return response()->json(['success' => 'Pridėta į krepšelį']);
            }
            return response()->json(['success' => 'Added to your cart']);
        } else {
            if(session()->get('language') == 'lithuanian'){
                return response()->json(['error' => 'Atsiprašome, kad šios sumos dabar nėra!']);
            }
            return response()->json(['error' => 'Sorry this amount is not available now!']);
        }
    }

    public function AddMiniCart()
    {

        $cartContent = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $cartContent,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),

        ));
    }

    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        if(session()->get('language') == 'lithuanian'){
            return response()->json(['error' => 'Produktas pašalintas iš krepšelio']);
        }else
        return response()->json(['success' => 'Product Removed from Cart']);
    }
    public function CartRemove($rowId)
    {
        Cart::remove($rowId);
        if(session()->get('language') == 'lithuanian'){
            return response()->json(['error' => 'Produktas pašalintas iš krepšelio']);
        }else
        return response()->json(['success' => 'Product Removed from Cart']);
    }

    public function CartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json('increment');
    }

    public function CartDecrement($rowId)
    {

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        return response()->json('Decrement');
    }

    // ------------ Checkout functions --------------------

    public function ViewCheckout()
    {
        if (Cart::total() > 0) {
            $carts = Cart::content();
            $cartQty = Cart::count();
            $totalAfterTax = Cart::total();
            $cartTax = Cart::tax();
            $totalBeforTax = Cart::subtotal();
            $divisions = Shipment::orderBy('shipment_name', 'ASC')->get();
            return view('user.checkout.view_checkout', compact('carts', 'cartQty', 'totalBeforTax', 'cartTax', 'totalAfterTax', 'divisions'));
        } else {
            if(session()->get('language') == 'lithuanian'){
                $notification = array(
                    'message' => 'Ops!.... jūsų krepšelis tuščias. :)',
                    'alert-type' => 'info'
                );
            }else{
                $notification = array(
                    'message' => 'Ops!... yor cart is empty :)',
                    'alert-type' => 'info'
                );
            }
            return redirect()->back()->with($notification);
        }
    }
}
