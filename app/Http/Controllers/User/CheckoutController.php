<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipmentDistric;
use App\Models\ShipmentState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id)
    {
        $ship = ShipmentDistric::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($ship);
    }

    public function DistrictGetAjax1($division_id)
    {
        $ship = ShipmentDistric::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($ship);
    }

    public function StateGetAjax($district_id)
    {
        $ship = ShipmentState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return json_encode($ship);
    }

    public function CheckoutStore(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['notes'] = $request->notes;
        $totalAfterTax = Cart::total();
        $cartTax = Cart::tax();
        $totalBeforTax = Cart::subtotal();


        if ($request->payment_method == 'stripe') {
            return view('user.checkout.view_payment', compact('data','totalAfterTax','cartTax','totalBeforTax'));
        } elseif ($request->payment_method == 'card') {
            return 'card';
        } else {
            return view('user.checkout.view_cash_payment', compact('data','totalAfterTax','cartTax','totalBeforTax'));
        }
    }
}
