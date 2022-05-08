<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShippingController extends Controller
{
    public function ViewDivisions()
    {
        $divisions = Shipment::orderBy('id', 'DESC')->get();
        return view('admin.shipping.view_shipment_division', compact('divisions'));
    }


    public function AddDivision(Request $request)
    {
        $request->validate([
            'division_name' => 'required',
        ]);

        Shipment::insert([
            'shipment_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ViewUpdateDivision($id)
    {

        $divisions = Shipment::findOrFail($id);
        return view('admin.shipping.update_division', compact('divisions'));
    }



    public function UpdateDivision(Request $request, $id)
    {
        Shipment::findOrFail($id)->update([
            'shipment_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('view.divisions')->with($notification);
    } // end mehtod 


    public function DeleteDivision($id)
    {
        Shipment::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
