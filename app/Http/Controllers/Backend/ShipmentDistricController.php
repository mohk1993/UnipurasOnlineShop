<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\ShipmentDistric;
use App\Models\ShipmentState;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShipmentDistricController extends Controller
{
    public function ViewDistrict()
    {
        $divisions = Shipment::orderBy('id', 'DESC')->get();
        $districts = ShipmentDistric::with('division')->orderBy('id', 'DESC')->get();
        return view('admin.districts.districts_view', compact('districts', 'divisions'));
    }


    public function AddDistric(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

        ShipmentDistric::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ViewUpdateDistrict($id)
    {

        $division = Shipment::orderBy('shipment_name', 'ASC')->get();
        $district = ShipmentDistric::findOrFail($id);
        return view('admin.districts.update_district', compact('district', 'division'));
    }



    public function UpdateDistrict(Request $request, $id)
    {
        ShipmentDistric::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('view.districts')->with($notification);
    } // end mehtod 

    public function DeleteDistrict($id)
    {
        ShipmentDistric::findOrFail($id)->delete();
        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    // ------------- State ----------------------------

    public function ViewState()
    {
        $division = Shipment::orderBy('shipment_name', 'ASC')->get();
        $district = ShipmentDistric::orderBy('district_name', 'ASC')->get();
        $state = ShipmentState::with('division', 'district')->orderBy('id', 'DESC')->get();
        return view('admin.states.states_view', compact('district', 'division', 'state'));
    }


    public function AddState(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ]);

        ShipmentState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ViewUpdateState($id)
    {

        $division = Shipment::orderBy('shipment_name', 'ASC')->get();
        $district = ShipmentDistric::orderBy('district_name', 'ASC')->get();
        $state = ShipmentState::findOrFail($id);
        return view('admin.states.update_state', compact('district', 'division','state'));
    }



    public function UpdateState(Request $request, $id)
    {
        ShipmentState::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'State Updated Successfully',
                'alert-type' => 'info'
            );

        return redirect()->route('view.states')->with($notification);
    } // end mehtod 

    public function DeleteState($id)
    {
        ShipmentState::findOrFail($id)->delete();
    	$notification = array(
			'message' => 'State Deleted Successfully',
			'alert-type' => 'info'
		);
        return redirect()->back()->with($notification);
    }
}
