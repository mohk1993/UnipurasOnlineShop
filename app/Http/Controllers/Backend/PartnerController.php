<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PartnerController extends Controller
{
    // Queiry the data from database to the UI
    public function ViewPartners()
    {
        $partners = Partner::latest()->get();
        return view('admin.partners.partners_view', compact('partners'));
    }
    // View the add partner page
    public function ViewAddPartner()
    {
        return view('admin.partners.add_partner_view');
    }
    // Insert new partner entry to DB
    public function AddPartner(Request $request)
    {
        $request->validate([
            'partner_name_en' => 'required',
            'partner_name_lith' => 'required',
            'partner_image' => 'required',
        ], [
            'partner_name_en.required' => 'Please enter company name in English',
            'partner_name_lith.required' => 'Please enter company name in Lithuanian',
            'partner_image.required' => 'Please select image',

        ]);

        $image = $request->file('partner_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1024, 715)->save('upload/partner-images/' . $name_gen);
        $save_url = 'upload/partner-images/' . $name_gen;

        Partner::insert([
            'partner_name_en' => $request->partner_name_en,
            'partner_name_lith' => $request->partner_name_lith,
            'partner_slug_en' => strtolower(str_replace(' ', '-', $request->partner_name_en)),
            'partner_slug_lith' => str_replace(' ', '-', $request->partner_name_lith),
            'partner_image' => $save_url,
        ]);

        $notifications = array(
            'message' => 'Partner was inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }
// ================= View the partner update page  ===================================
    public function ViewUpdatePartner($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.update_partner', compact('partner'));
    }
// =============== Update Partner Info =================================
    public function UpdatePartner(Request $request)
    {
        $request->validate([
            'partner_name_en' => 'required',
            'partner_name_lith' => 'required',
        ], [
            'partner_name_en.required' => 'Please enter company name in English',
            'partner_name_lith.required' => 'Please enter company name in Lithuanian',
        ]);

        $partner_id = $request->id;
        $current_image = $request->current_image;
        if ($request->file('partner_image')) {
            unlink($current_image);
            $image = $request->file('partner_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1024, 715)->save('upload/partner-images/' . $name_gen);
            $save_url = 'upload/partner-images/' . $name_gen;

            Partner::findOrFail($partner_id)->update([
                'partner_name_en' => $request->partner_name_en,
                'partner_name_lith' => $request->partner_name_lith,
                'partner_slug_en' => strtolower(str_replace(' ', '-', $request->partner_name_en)),
                'partner_slug_lith' => str_replace(' ', '-', $request->partner_name_lith),
                'partner_image' => $save_url,
            ]);

            $notifications = array(
                'message' => 'Partner was updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view.partners')->with($notifications);
        } else {
            Partner::findOrFail($partner_id)->update([
                'partner_name_en' => $request->partner_name_en,
                'partner_name_lith' => $request->partner_name_lith,
                'partner_slug_en' => strtolower(str_replace(' ', '-', $request->partner_name_en)),
                'partner_slug_lith' => str_replace(' ', '-', $request->partner_name_lith),
            ]);

            $notifications = array(
                'message' => 'Partner was updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view.partners')->with($notifications);
        }
    }
// ======================= Delete Partner Data ====================
    public function DeletePartner($id) {
        $partner = Partner::findOrFail($id);
        $image = $partner->partner_image;
        unlink($image);

        Partner::findOrFail($id)->delete();
        $notifications = array(
            'message' => 'Partner was deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }
}
